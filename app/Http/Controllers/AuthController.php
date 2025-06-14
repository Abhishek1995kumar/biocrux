<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\User;
use App\Models\Plant;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;
use App\Traits\CommonFunctionTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    use ValidationTrait, CommonFunctionTrait;
    public function showforget(Request $request) {
        return view('forgetpassword');
    }

    public function forgetpassword(Request $request) {
        $user = User::where('phone', $request->phone)->count();

        if ($user == 0) {
            return response()->json([
                'status' => 201,
                'message' => 'No User with this number',
            ]);
        }
        // Session()->flash('alert-success', "Otp Sent!!");
        // return redirect()->back();

        return response()->json([
            'status' => 200,

        ]);
    }

    public function changepassword(Request $request) {
        $user = User::where('phone', $request->phone)->first();
        $user->password = Hash::make($request->pass);
        $user->update();
        return response()->json([
            'status' => 200,
            'message' => 'Password Changed Successfully',
        ]);
    }

    public function login() {
        if (Auth::check()) {
            return redirect('admin/dashboard');
        } else {
            return view('admin.auth.login');
            Session()->flash('alert-success', "Please Login in First");
        }
        return view('admin.auth.login');
    }

    public function checkUser(Request $request) {
        try {
            $validator = $this->loginValidationTrait($request->all());
            if ($validator->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ]);
            }
            return $this->loginTrait($request);      

        } catch(Throwable $e) {
            return redirect('/admin/login')->with(['error' => $e->getMessage()]);
        }
    }

    public function logout() {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            $user->login_status = 0;
            $user->api_token = null;
            $user->update();
            $this->storeLog('Logout', 'logout', 'Logout');
            Auth::logout();
            return redirect('/admin/login');

        } catch(Throwable $e) {
            return redirect('/admin/dashboard')->with(['error' => $e->getMessage()]);
        }
    }
}
