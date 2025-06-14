<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Plant;
use App\Models\Role;
use App\Models\Rolepermission;
use App\Models\Contractor;
use App\Models\Registeredwith;
use App\Models\Shg;
use App\Models\State;
use App\Models\User;
use App\Models\Useraddress;
use App\Models\Userdocument;
use App\Models\Userlegal;
use App\Models\Userpermission;
use App\Models\Userpersonal;
use App\Models\Userscrapyard;
use App\Models\Userskill;
use App\Models\Workarea;
use App\Models\Zone;
use App\Services\Base32EncoderService;
use App\Services\CurrencyFormatterService;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use Illuminate\Support\Str;
use App\Services\NumberToWordsService;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use ZipArchive;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

class AdminController extends Controller {
    protected $base32EncoderService;
    protected $notificationService;

    public function __construct(Base32EncoderService $base32EncoderService, NotificationService $notificationService) {
        $this->base32EncoderService = $base32EncoderService;
        $this->notificationService = $notificationService;
    }

    public function indexAdmin()
    {
        return view('admin.dashboard');
    }

    // profile
    public function showProfile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('admin.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $uploadpath = 'media/images/users';
        $image_path = $this->updateUploadFile($request, 'profileImage', $uploadpath, $request->profileImage);
        $profile->profileImage = $image_path;
        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->email = $request->email;
        $profile->update();

        $this->storeLog('Update', 'updateProfile', $profile);
        // Session()->flash('alert-success', "Profile Updated Successfully");
        return redirect('/admin/profile');
    }

    public function deactiveAccount()
    {
        $profile = User::find(Auth::user()->id);
        $profile->status = 0;
        $profile->update();
        $this->storeLog('Update', 'deactiveAccount', $profile);
        // Session()->flash('alert-success', "Account Deactivated Successfully");
        return redirect('/logout');
    }

    public function checkProfileEmail(Request $request)
    {
        $data = User::where('email', $request->email)->first();
        if ($data) {
            return response()->json([
                'status' => 201,
                'data' => $data,
                'message' => 'Email Already Exist',
            ]);
        }
    }

    public function checkProfilePass(Request $request)
    {
        $data = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->pass, $data->password)) {
            return response()->json([
                'status' => 200,
                'message' => 'Password Matched',
            ]);
        }
    }

    public function saveNewPhonenumber(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->phone = $request->phone;
        $profile->update();

        $this->storeLog('Update', 'saveNewPhonenumber', $profile);
        Auth::logout();
        return redirect('/admin/login');
    }

    public function checkOldPass(Request $request)
    {
        $data = User::where('id', Auth::user()->id)->first();
        if (Hash::check($request->oldPass, $data->password)) {
            return response()->json([
                'status' => 200,
                'message' => 'Password Matched',
            ]);
        }
    }

    public function updatePassword(Request $request)
    {
        $profile = User::find(Auth::user()->id);
        $profile->password = Hash::make($request->newpassword);
        $profile->save();
        $this->storeLog('Update', 'updatePassword', $profile);
        Auth::logout();
        return redirect('/admin/login');
    }

    // Role Controller

    public function indexRole() {
        $roles = Role::with('user')->whereNot('slug', 'gopl')->orderBy('id', 'Desc')->get();
        $userRoleCount = User::where('deleted_at', null)->select('role', DB::raw('count(*) as total'))->groupBy('role')->get();
        $users = User::where('deleted_at', null)->select('id', 'name', 'role')->orderBy('id', 'Desc')->get();
        return view('admin.role', compact('roles'));
    }

    public function showAddRole() {
        $permissions = Permission::all();
        $groupedPermissions = $permissions->groupBy('panel');
        // return $groupedPermissions;

        return view('admin.roleAdd', compact('groupedPermissions'));
    }

    public function viewRole($id)
    {
        $role = Role::where('slug', $id)->first();
        $users = User::where('role', $id)->where('deleted_at', null)->orderBy('id', 'Desc')->get();
        return view('admin.roleView', compact('role', 'users'));
    }

    public function addRole(Request $request)
    {
        // return $request->all();

        $role = new Role;
        $role->name = $request->name;
        $role->slug = Str::slug($request->name, '-');
        $role->attendanceFlag = $request->attendanceFlag;
        $role->panelFlag = $request->panelFlag;
        $role->approvalAuthorityFlag = $request->approvalAuthorityFlag;
        $role->save();

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $rolePermission = new Rolepermission;
                $rolePermission->roleSlug = Str::slug($request->name, '-');
                $rolePermission->permission = $permission;
                $rolePermission->save();
            }
        }
        Session()->flash('alert-success', "Role Added Succesfully");
        $this->storeLog('Add', 'addRole', $role);
        return redirect('/admin/role');
    }

    public function showUpdateRole($name)
    {
        $role = Role::where('slug', $name)->first();
        $permissions = Permission::all();
        $groupedPermissions = $permissions->groupBy('panel');
        $rolePermissions = Rolepermission::where('roleSlug', $name)->pluck('permission')->toArray();
        // return $rolePermissions;
        return view('admin.roleUpdate', compact('role', 'rolePermissions', 'groupedPermissions'));
    }

    public function updateRole(Request $request) {
        $role = Role::where('slug', $request->hiddenId)->first();
        $role->attendanceFlag = $request->attendanceFlag;
        $role->panelFlag = $request->panelFlag;
        $role->approvalAuthorityFlag = $request->approvalAuthorityFlag;
        $role->update();

        Rolepermission::where('roleSlug', $request->hiddenId)->delete();

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $rolePermission = new Rolepermission;
                $rolePermission->roleSlug = $role->slug;
                $rolePermission->permission = $permission;
                $rolePermission->save();
            }
        }

        Session()->flash('alert-success', "Role Updated Succesfully");
        $this->storeLog('Update', 'updateRole', $role);
        return redirect('/admin/role');
    }

    // Permissions Controller
    public function indexPermission() {
        $permissions = Permission::all();
        return view('admin.permission', compact('permissions'));
    }

    public function addPermission(Request $request) {
        $permission = new Permission;
        $permission->panel = $request->panel;
        $permission->displayName = $request->display;
        $permission->tab = $request->name;
        $slug = Str::slug($request->panel . '_' . $request->name);
        $permission->slug = $slug;
        $permission->save();
        return redirect()->back();
    }

    // Office User Controller

    public function indexUser() {
        $users = User::where('deleted_at', null)->whereIn('role', ['gopl', 'admin', 'super-admin'])->with('rolee')->withCount('permissions')->orderBy('id', 'Desc')->get();
        // return $users;
        return view('admin.user', compact('users'));
    }

    public function indexAddUser() {
        $roles = Role::where('deleted_at', null)->whereNot('slug', 'gopl')->orderBy('id', 'Desc')->get();
        return view('admin.userAdd', compact('roles'));
    }

    public function addUser(Request $request) {
        DB::beginTransaction();

        $user = new User;
        $uploadpath = 'media/images/users';
        $image_path = $this->uploadFile($request, 'image', $uploadpath);
        $user->profileImage = $image_path;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->passwordView = $request->password;
        $user->role = $request->role;
        $user->status = $request->status;
        $user->save();

        Session()->flash('alert-success', "User Added Succesfully");
        $this->storeLog('Add', 'addUser', $user);
        DB::commit();
    }

    public function showUserPermissions(Request $request)
    {
        $userId = Crypt::decrypt($request->userId);
        $user = User::where('id',  $userId)->with('rolee')->first();
        $userPermissions = Userpermission::where('userId', $userId)->pluck('permission')->toArray();
        $permissions = Permission::all();
        $groupedPermissions = $permissions->groupBy('panel');

        return view('admin.userPermission', compact('user', 'permissions', 'userPermissions', 'groupedPermissions'));
    }

    public function assignUserPermissions(Request $request)
    {
        $user = User::find(Crypt::decrypt($request->userId));
        Userpermission::where('userId', $user->id)->delete();

        if ($request->permissions) {
            foreach ($request->permissions as $permission) {
                $userPermission = new Userpermission;
                $userPermission->userId = $user->id;
                $userPermission->permission = $permission;
                $userPermission->save();
            }
        }

        $this->storeLog('Update', 'assignUserPermissions', $user);
        Session()->flash('alert-success', $user->fullName . " Permissions Updated Successfully");
        if ($request->type == 'worker') {
            return redirect('/admin/worker');
        } else {
            return redirect('/admin/user');
        }
    }

    public function deleteUser(Request $request)
    {
        $model = User::find($request->hiddenId);
        $model->deleted_at = Date::now();
        $model->login_status = 0;
        $model->api_token = null;
        // add # on number and email
        $model->phone = '#' . $model->phone;
        $model->email = '#' . $model->email;
        $model->update();
        Session()->flash('alert-success', "User Deleted Successfully");
        $this->storeLog('Delete', 'deleteUser', $model);
        return redirect()->back();
    }
}
