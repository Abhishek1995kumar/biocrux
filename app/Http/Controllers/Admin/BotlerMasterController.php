<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Role;
use App\Models\User;
use App\Models\Botler;
use App\Models\Machine;
use App\Models\SubBotler;
use App\Traits\QueryTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Traits\CommonFunctionTrait;
use App\Http\Controllers\Controller;
use App\Models\AssigneMachineBotler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\AssigneMachineToBotler;
use App\Models\AssigneMachineToSubBotler;

class BotlerMasterController extends Controller {
    use CommonFunctionTrait, QueryTrait;
    // Botler Management
        public function botlerIndex(Request $request) {
            $botlerHeader = [
                'Company Logo','Botler Name','Company','Company URL','Color','Added On','Status','Action',
            ];
            $botlerList = $this->allBotlerDetailsTrait();

            $machines = Machine::where('deleted_at', NULL)->where('status', 0)->orderByDesc('id')->get();

            $assineMachineHeader = [
                'Botler Name','Machine Name','Machine Number','Address','City','State','Installed','Action',
            ];

            $assignMachineList = AssigneMachineToBotler::with(['botler:id,bottler_name', 'machine:id,machine_name,machine_number,address,city,state,installed'])
                                    ->orderByDesc('id')
                                    ->get();

            return view('admin.users.bottler.index', [
                'page' => 'Botler List',
                'machines' => $machines,
                'botlerHeader' => $botlerHeader,
                'botlerList' => $botlerList,
                'assineMachineHeader' => $assineMachineHeader,
                'assignMachineList' => $assignMachineList,
            ]);
        }

        public function botlerAssign(Request $request, $id) {
            try {
                // bottler_detail_type -- ka mtlb hai ki sub_bolter/machine kya select kiya hai user ne
                $botler = Botler::find($id);
                if (!$botler) {
                    return response()->json(['success' => false, 'message' => 'Botler not found'], 404);
                }
                $botler->bottler_detail_type = $request->bottler_detail_type;
                $botler->save();

                return response()->json(['success' => true, 'message' => 'Assignment successful.']);
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error updating machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function botlerSave(Request $request) {
            try {
                $botler = new Botler();
                $botler->bottler_name = ucwords(strtolower($request->bottler_name));
                $botler->company_name = ucwords(strtolower($request->company_name));
                $botler->company_url = strtolower($request->company_url.'-dashboard') ?? null;
                $botler->status = json_decode($request->status);
                $botler->color_code = $request->color_code;
                $uploadPath = public_path('uploads');
                $companyLogoPath = $this->uploadFileTraits($request, 'company_logo', $uploadPath);
                $machineLogoPath = $this->uploadFileTraits($request, 'machine_logo', $uploadPath);
                $bottleLogoPath = $this->uploadFileTraits($request, 'bottle_logo', $uploadPath);
                if ($companyLogoPath) {
                    $botler->company_logo = $companyLogoPath;
                }
                if ($machineLogoPath) {
                    $botler->machine_logo = $machineLogoPath;
                }
                if ($bottleLogoPath) {
                    $botler->bottle_logo = $bottleLogoPath;
                }
                $botler->created_by = Auth::user()->id;
                $botler->created_at = now();
                $botler->updated_at = null;
                $botler->deleted_at = null;
                $botler->save();

                return redirect()->route('admin.user.botler.list')->with('success', 'Botler created successfully');

            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Error updating botler: ' . $e->getMessage());
            }
        }

        public function botlerUpdate(Request $request){
            try{
                $botler = Botler::find(json_decode($request->id));
                if (!$botler) {
                    return redirect()->back()->with('error', 'Botler not found');
                }
                $botler->bottler_name = ucwords(strtolower($request->bottler_name)) ?? $botler->bottler_name;
                $botler->company_name = ucwords(strtolower($request->company_name)) ?? $botler->company_name;
                $botler->company_url = strtolower($request->company_url.'-dashboard') ?? $botler->company_url;
                $botler->status = json_decode($request->status) ?? $botler->status;
                $botler->color_code = $request->color_code ?? $botler->color_code;
                if ($request->hasFile('company_logo')) {
                    $filename = time().'_'.uniqid().'.'.$request->company_logo->getClientOriginalExtension();
                    $request->company_logo->move(public_path('uploads'), $filename);
                    $botler->company_logo = 'uploads/' . $filename;
                }
                if ($request->hasFile('machine_logo')) {
                    $filename = time().'_machine_'.uniqid().'.'.$request->machine_logo->getClientOriginalExtension();
                    $request->machine_logo->move(public_path('uploads'), $filename);
                    $botler->machine_logo = 'uploads/' . $filename;
                }
                if ($request->hasFile('bottle_logo')) {
                    $filename = time().'_bottle_'.uniqid().'.'.$request->bottle_logo->getClientOriginalExtension();
                    $request->bottle_logo->move(public_path('uploads'), $filename);
                    $botler->bottle_logo = 'uploads/' . $filename;
                }
                $botler->save();
                return redirect()->route('admin.user.botler.list')->with('success', 'Botler updated successfully');
            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Error updating botler: ' . $e->getMessage());
            }
        }

        public function botlerDelete(Request $request) {
            $botler = Botler::where('id', json_decode($request->id))->first();
            if (!$botler) {
                return response()->json(['success' => false, 'message' => 'Botler not found']);
            }
            $botler->delete();
            return response()->json(['success' => true, 'message' => 'Botler deleted successfully']);
        }
    // Botler Management


    // Botler Detail and Sub Botler/User/Assigne Machine Management
        public function botlerDetail(Request $request, $id) {
            $botlerDetail = $this->getBotlerDetailsTrait($id);
            if (!$botlerDetail) {
                return redirect()->back()->with('error', 'Botler not found');
            }
            $botlerUserHeader = $this->botlerUserHeaderTrait();
            $subBotlerHeader = $this->subBotlerHeaderTrait();
            $botlerAssignMachineHeader = $this->botlerAssignMachineHeaderTrait();

            $roles = $this->rolesTrait();
            $subBotlerList = $this->subBotlerTrait($id);
            $botlerUserList = $this->botlerUserTrait($id);
            $botlerMachines = $this->assignedMachineToSubBotlerTrait($id);
            $machineNotAssignedToSB = $this->machineNotAssignedToSubBotlerTrait($id);
            $botlerAssignMachineList = $this->assignedMachineToBotlerTrait($id);
            return view('admin.users.bottler.detail', [
                'page' => 'Botler Detail',
                'botlerDetail' => $botlerDetail,
                'botlerUserHeader' => $botlerUserHeader,
                'botlerUserList' => $botlerUserList,
                'subBotlerHeader' => $subBotlerHeader, 
                'subBotlerList' => $subBotlerList,
                'botlerAssignMachineHeader' => $botlerAssignMachineHeader,
                'botlerAssignMachineList' => $botlerAssignMachineList,
                'roles' => $roles,
                'botlerMachines' => $botlerMachines,
                'machineNotAssignedToSB' => $machineNotAssignedToSB,
            ]);
        }

        public function botlerUserIndex(Request $request, $id) {
            try {
                $botlerUserHeader = $this->botlerUserHeaderTrait();
                $botlerUserList = $this->botlerUserTrait($id);
                return view('admin.users.bottler.partials.botler_users', [
                    'botlerUserHeader' => $botlerUserHeader,
                    'botlerUserList' => $botlerUserList,
                ]);

            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Error fetching botler user list: ' . $e->getMessage());
            }
        }

        public function subBotlerIndex(Request $request, $id) {
            $subBotlerHeader = $this->subBotlerHeaderTrait();
            $subBotlerList = $this->subBotlerTrait($id);
            return view('admin.users.bottler.partials.sub_botlers', [
                'subBotlerHeader' => $subBotlerHeader, 
                'subBotlerList' => $subBotlerList,
            ]);
        }

        public function botlerAssignMachineIndex(Request $request, $id) {
            try {
                $botlerAssignMachineHeader = $this->botlerAssignMachineHeaderTrait();
                $botlerAssignMachineList = $this->assignedMachineToBotlerTrait($id);
                return view('admin.users.bottler.partials.assign_machine', [
                    'botlerAssignMachineHeader' => $botlerAssignMachineHeader,
                    'botlerAssignMachineList' => $botlerAssignMachineList,
                ]);

            } catch (Throwable $e) {
                return redirect()->back()->with('error', 'Error fetching botler user list: ' . $e->getMessage());
            }
        }

        public function userBotlerDetail(Request $request) {
            try {
                $userId = $request->input('id');
                if (!$userId) {
                    return response()->json(['success' => false, 'message' => 'User ID is required'], 400);
                }

                $user = User::with(['bottler'])
                        ->where('id', $userId)
                        ->whereNull('deleted_at')
                        ->first();

                if (!$user) {
                    return response()->json(['success' => false, 'message' => 'User not found'], 404);
                }

                return response()->json([
                    'success' => true,
                    'data' => $user
                ]);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error fetching user details: ' . $e->getMessage()
                ], 500);
            }
        }
    // Botler Detail and Sub Botler/User/Assigne Machine Management


    // Botler User Management
        public function userBotlerSave(Request $request) {
            try {
                // $request->validate([
                //     'bottler_id' => 'required',
                //     'sub_botler_id' => 'nullable',
                //     'name' => 'required|string|max:255',
                //     'email' => 'required|email|unique:users,email',
                //     'password' => 'required|string|min:8|confirmed',
                //     'role' => 'required|string',
                //     'status' => 'required|boolean',
                //     'contact_no' => 'nullable|string|max:15',
                //     'personal_no' => 'nullable|string|max:15',
                //     'address' => 'nullable|string|max:255',
                //     'user_about' => 'nullable|string|max:500',
                // ]);

                $mobileNumber = User::where('contact_no', $request->contact_no)->first();
                if ($mobileNumber) {
                    return response()->json(['error' => 'Mobile number already exists']);
                }
                $email = User::where('email', $request->email)->first();
                if ($email) {
                    return response()->json(['error' => 'Email already exists']);
                }
                $user = new User();
                $user->bottler_id = json_decode($request->bottler_id);
                $user->sub_bottler_id = json_decode($request->sub_bottler_id) ?? null;
                $user->name = ucwords(strtolower($request->name));
                $user->username = ucwords(strtolower($request->name));
                $user->email = str_replace(" ",'', strtolower($request->email));
                $user->password = Hash::make($request->password);
                $user->default_password = $request->password;
                $user->role = $request->role;
                $user->status = json_decode($request->status);
                $user->phone = preg_replace('/[^0-9]/', '', $request->contact_no);
                $user->contact_no = preg_replace('/[^0-9]/', '', $request->contact_no);
                $user->personal_no = preg_replace('/[^0-9]/', '', $request->personal_no);
                $user->address = ucwords(strtolower($request->address));
                $user->user_about = ucwords(strtolower($request->user_about));
                $user->login_status = 0;
                $user->created_by = Auth::user()->id;
                $user->created_at = now();
                $user->updated_at = null;
                $user->deleted_at = null;
                $user->save();

                return redirect()->route('admin.user.botler.detail', json_decode($request->bottler_id))->with('success', 'User created successfully');

            } catch (Throwable $e) {
                return response()->json(['error' => 'Error updating botler: ' . $e->getMessage()]);
            }
        }

        public function userBotlerUpdate(Request $request) {
            try {
                $user = User::where('id', json_decode($request->id))->first();
                if(!$user) {
                    return redirect()->back()->with('error', 'User not found');
                }
                $user->bottler_id = json_decode($request->bottler_id) ?? $user->bottler_id;
                $user->sub_bottler_id = json_decode($request->sub_bottler_id) ?? $user->sub_bottler_id;
                $user->name = ucwords(strtolower($request->name)) ?? $user->name;
                $user->username = ucwords(strtolower($request->name)) ?? $user->username;
                $user->email = str_replace(" ",'', strtolower($request->email)) ?? $user->email;
                $user->password = Hash::make($request->password) ?? $user->password;
                $user->default_password = $request->password ?? $user->default_password;
                $user->role = $request->role ?? $user->role;
                $user->status = json_decode($request->status) ?? $user->status;
                $user->phone = preg_replace('/[^0-9]/', '', $request->contact_no) ?? $user->phone;
                $user->contact_no = preg_replace('/[^0-9]/', '', $request->contact_no) ?? $user->contact_no;;
                $user->personal_no = preg_replace('/[^0-9]/', '', $request->personal_no) ?? $user->personal_no;;
                $user->address = ucwords(strtolower($request->address)) ?? $user->address;
                $user->user_about = ucwords(strtolower($request->user_about)) ?? $user->user_about;
                $user->login_status = 0;
                $user->updated_by = Auth::user()->id;
                $user->updated_at = now();
                $user->deleted_at = null;
                $user->save();

                return redirect()->route('admin.user.botler.detail', json_decode($request->bottler_id))->with('success', 'User created successfully');

            } catch (Throwable $e) {
                return response()->json(['error' => 'Error updating botler: ' . $e->getMessage()]);
            }
        }

        public function userBotlerDelete(Request $request) {
            try {
                $userBotler = User::where('id', json_decode($request->id))->first();
                if (!$userBotler) {
                    return response()->json(['success' => false, 'message' => 'User Botler not found']);
                }
                if($userBotler) {
                    $userBotler->deleted_at = now();
                    $userBotler->status = 0;
                    $userBotler->deleted_by = Auth::user()->id;
                    $userBotler->save();
                    return response()->json(['success' => true, 'message' => 'User Botler deleted successfully']);
                }
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error assigning machine: ' . $e->getMessage()
                ], 500);
            }
        }
    // Botler User Management


    // Sub Botler Management
        public function subBotlerSave(Request $request) {
            try {
                $subBotler = new SubBotler();
                $subBotler->bottler_id = json_decode($request->bottler_id);
                $subBotler->sub_bottler_name = ucwords(strtolower($request->sub_bottler_name));
                $subBotler->company_name = ucwords(strtolower($request->company_name));
                $subBotler->company_url = strtolower(str_replace(' ', '-', $request->company_name) . '-dashboard');
                $subBotler->status = json_decode($request->status);
                $subBotler->color_code = $request->color_code;
                $subBotler->group_id = json_decode($request->group_id) ?? null;
                $uploadPath = public_path('uploads');
                $companyLogoPath = $this->uploadFileTraits($request, 'company_logo', $uploadPath);
                $machineLogoPath = $this->uploadFileTraits($request, 'machine_logo', $uploadPath);
                $bottleLogoPath = $this->uploadFileTraits($request, 'bottle_logo', $uploadPath);
                if ($companyLogoPath) {
                    $subBotler->company_logo = $companyLogoPath;
                }
                if ($machineLogoPath) {
                    $subBotler->machine_logo = $machineLogoPath;
                }
                if ($bottleLogoPath) {
                    $subBotler->bottle_logo = $bottleLogoPath;
                }
                $subBotler->created_by = Auth::user()->id;
                $subBotler->created_at = now();
                $subBotler->updated_at = null;
                $subBotler->deleted_at = null;
                $subBotler->save();

                return redirect()->route('admin.user.botler.detail', json_decode($request->bottler_id))->with('success', 'Sub botler created successfully');

            } catch (Throwable $e) {
                return response()->json(['error' => 'Error updating botler: ' . $e->getMessage()]);
            }
        }

        public function subBotlerUpdate(Request $request) {
            try {
                $subBotler = SubBotler::where('id', json_decode($request->id))->first();
                if(!$subBotler) {
                    return redirect()->back()->with('error', 'Sub Botler not found');
                }
                $subBotler->bottler_id = json_decode($request->bottler_id) ?? $subBotler->bottler_id;
                $subBotler->sub_bottler_name = ucwords(strtolower($request->sub_bottler_name)) ?? $subBotler->sub_bottler_name;
                $subBotler->company_name = ucwords(strtolower($request->company_name)) ?? $subBotler->company_name;
                $subBotler->company_url = strtolower(str_replace(' ', '-', $request->company_name) . '-dashboard') ?? $subBotler->company_url;
                $subBotler->status = json_decode($request->status) ?? $subBotler->status;
                $subBotler->color_code = $request->color_code ?? $subBotler->color_code;
                $subBotler->group_id = json_decode($request->group_id) ?? $subBotler->group_id;
                
                $uploadPath = public_path('uploads');
                $subBotler->company_logo = $this->updateUploadFileTrait($request, 'company_logo', $uploadPath, $subBotler->company_logo) ?? $subBotler->company_logo;
                $subBotler->machine_logo = $this->updateUploadFileTrait($request, 'machine_logo', $uploadPath, $subBotler->machine_logo) ?? $subBotler->machine_logo;
                $subBotler->bottle_logo = $this->updateUploadFileTrait($request, 'bottle_logo', $uploadPath, $subBotler->bottle_logo) ?? $subBotler->bottle_logo;

                $subBotler->updated_by = Auth::user()->id;
                $subBotler->updated_at = now();
                $subBotler->deleted_at = null;
                $subBotler->save();
                return redirect()->route('admin.user.botler.detail', json_decode($request->bottler_id))->with('success', 'User created successfully');

            } catch (Throwable $e) {
                return response()->json(['error' => 'Error updating botler: ' . $e->getMessage()]);
            }
        }

        public function subBotlerDelete(Request $request) {
            try {
                $subBotler = SubBotler::where('id', json_decode($request->id))->first();
                if (!$subBotler) {
                    return response()->json(['success' => false, 'message' => 'Sub Botler not found']);
                }
                if($subBotler) {
                    $subBotler->deleted_at = now();
                    $subBotler->status = 0;
                    $subBotler->deleted_by = Auth::user()->id;
                    $subBotler->save();
                    return response()->json(['success' => true, 'message' => 'Sub Botler deleted successfully']);
                }
            } catch (Throwable $e) {
                return response()->json(['success' => false, 'message' => 'Error deleting sub botler: ' . $e->getMessage()]);
            }
        }
    // Sub Botler Management


    // Assigne Machine To Botler Management
        public function getMachineDetails($id) {
            try {
                $assignedMachine = AssigneMachineToBotler::where('id', $id)->first();
                $currentMachine = Machine::where('id', $assignedMachine->machine_id)->first();

                $availableMachines = Machine::where('deleted_at', NULL)
                    ->where(function ($query) use ($currentMachine) {
                        $query->where('status', 1)
                            ->orWhere('id', $currentMachine->id); // include current assigned
                    })
                    ->orderByDesc('id')
                    ->get();

                return response()->json([
                    'assigned_machine_id' => $assignedMachine->machine_id,
                    'machine_options' => $availableMachines,
                ]);
            } catch(Throwable $e) {

            }
        }

        // public function getEditMachineOptions($id) {
            //     $assignData = AssigneMachineToBotler::find($id);
            //     $assignedMachineId = $assignData->machine_id;

            //     // Get all unassigned machines + currently assigned machine (in case status is 0)
            //     $machines = Machine::where(function ($query) use ($assignedMachineId) {
            //             $query->where('status', 1)
            //                 ->orWhere('id', $assignedMachineId); // include current assigned machine
            //         })
            //         ->whereNull('deleted_at')
            //         ->orderByDesc('id')
            //         ->get();

            //     $optionsHtml = '<option disabled value="">Select Machine</option>';
            //     foreach ($machines as $machine) {
            //         $selected = $machine->id == $assignedMachineId ? 'selected' : '';
            //         $optionsHtml .= '<option value="' . $machine->id . '" ' . $selected . '>'
            //                         . $machine->machine_name . ' - ' . $machine->machine_number . '</option>';
            //     }

            //     return response()->json([
            //         'success' => true,
            //         'options_html' => $optionsHtml,
            //         'assigned_machine_id' => $assignedMachineId,
            //     ]);
        // }

        public function botlerAssignMachineToBotlerSave(Request $request) {
            try {
                $validated = $request->validate([
                    'bottler_id' => 'required|integer',
                    'machine_id' => 'required|integer',
                ]);

                $botlerAssignMachine = new AssigneMachineToBotler();
                $botlerAssignMachine->bottler_id = json_decode($validated['bottler_id']);
                $botlerAssignMachine->machine_id = json_decode($validated['machine_id']);
                $botlerAssignMachine->created_by = Auth::user()->id;
                $botlerAssignMachine->assigned_by = Auth::user()->id;
                $botlerAssignMachine->assigned = 0;
                $botlerAssignMachine->created_at = now();
                $botlerAssignMachine->updated_at = null;
                $botlerAssignMachine->save();
                $machine = Machine::find($validated['machine_id']);
                if ($machine) {
                    $machine->status = 1;
                    $machine->assigned_to_botler = 1;
                    $machine->updated_at = now();
                    $machine->save();
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Machine successfully assigned to bottler.'
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error assigning machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function botlerAssignMachineToBotlerUpdate(Request $request) {
            try {
                $botlerAssignMachine = AssigneMachineToBotler::where('id', json_decode($request->id))->first();
                if(!$botlerAssignMachine) {
                    return redirect()->back()->with('error', 'Assigned Machine not found');
                }
                $botlerAssignMachine->bottler_id = json_decode($request->bottler_id) ?? $botlerAssignMachine->bottler_id;
                $botlerAssignMachine->machine_id = json_decode($request->machine_id) ?? $botlerAssignMachine->machine_id;
                $botlerAssignMachine->updated_by = Auth::user()->id;
                $botlerAssignMachine->updated_at = now();
                $botlerAssignMachine->deleted_at = null;
                $botlerAssignMachine->save();
                $machine = Machine::where('id', json_decode($request->machine_id))->first();
                if ($machine) {
                    $machine->status = 0;
                    $machine->updated_at = now();
                    $machine->save();
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Machine successfully assigned to bottler.'
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error assigning machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function deleteAssignedBotlerMachine(Request $request, $id) {
            try {
                $botlerAssignMachine = AssigneMachineToBotler::where('id', json_decode($id))->first();
                if (!$botlerAssignMachine) {
                    return response()->json(['success' => false, 'message' => 'Assigned Machine not found']);
                }
                if($botlerAssignMachine) {
                    $machine = Machine::where('id', $botlerAssignMachine->machine_id)->first();
                    $machine->status = 0;
                    $machine->installed = 0;
                    $machine->assigned_to_botler = 0;
                    $machine->save();
                    $botlerAssignMachine->forceDelete();
                    return response()->json(['success' => true, 'message' => 'Assigned Machine deleted successfully']);
                }
            } catch (Throwable $e) {
                return response()->json(['success' => false, 'message' => 'Error deleting sub botler: ' . $e->getMessage()]);
            }
        }
    // Assigne Machine To Botler Management


    // Assigne Machine To Sub Botler Management
        public function getSubMachineDetails($id) {
            try {
                $assignedMachine = AssigneMachineToSubBotler::where('id', $id)->first();
                $currentMachine = Machine::where('id', $assignedMachine->machine_id)->first();

                $availableMachines = Machine::where('deleted_at', NULL)
                    ->where(function ($query) use ($currentMachine) {
                        $query->where('status', 1)
                            ->orWhere('id', $currentMachine->id); // include current assigned
                    })
                    ->orderByDesc('id')
                    ->get();

                return response()->json([
                    'assigned_machine_id' => $assignedMachine->machine_id,
                    'machine_options' => $availableMachines,
                ]);
            } catch(Throwable $e) {

            }
        }

        public function botlerAssignMachineToSubBotlerSave(Request $request) {
            try {
                $validated = $request->validate([
                    'bottler_id' => 'required',
                    'machine_id' => 'required',
                    'sub_bottler_id' => 'required',
                ]);
                $machineId = (int) trim(json_decode($validated['machine_id']));
                $bottlerId = (int) trim(json_decode($validated['bottler_id']));
                // dd($machineId, $bottlerId);
                
                $exists = AssigneMachineToSubBotler::where('machine_id', $machineId)->exists();
                if ($exists) {
                    return response()->json([
                        'success' => false,
                        'message' => 'This machine is already assigned to a sub-bottler.'
                    ], 409);
                }
                
                $botlerAssignMachine = new AssigneMachineToSubBotler();
                $botlerAssignMachine->bottler_id = json_decode($validated['bottler_id']);
                $botlerAssignMachine->machine_id = json_decode($validated['machine_id']);
                $botlerAssignMachine->sub_bottler_id = json_decode($validated['sub_bottler_id']);
                $botlerAssignMachine->created_by = Auth::user()->id;
                $botlerAssignMachine->assigned_by = Auth::user()->id;
                $botlerAssignMachine->created_at = now();
                $botlerAssignMachine->updated_at = null;
                $botlerAssignMachine->save();
                // $query = AssigneMachineToBotler::where('bottler_id', json_decode($validated['bottler_id']))
                //     ->where('machine_id', json_decode($validated['machine_id']));

                $assignBotler = AssigneMachineToBotler::where('bottler_id', $bottlerId)
                                ->where('machine_id', $machineId)
                                ->first();

                // dd($query->toSql(), $query->getBindings(), $query->first(), $assignBotler);
                if ($assignBotler) {
                    $assignBotler->assign_to_sub_machine = 1;
                    $assignBotler->assigned = 1;
                    $assignBotler->updated_at = now();
                    $assignBotler->save();
                }
                
                return response()->json([
                    'success' => true,
                    'message' => 'Machine successfully assigned to bottler.'
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error assigning machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function botlerAssignMachineToSubBotlerUpdate(Request $request) {
            try {
                $botlerAssignMachine = AssigneMachineToSubBotler::where('id', json_decode($request->id))->first();
                if(!$botlerAssignMachine) {
                    return redirect()->back()->with('error', 'Assigned Machine not found');
                }
                $botlerAssignMachine->bottler_id = json_decode($request->bottler_id) ?? $botlerAssignMachine->bottler_id;
                $botlerAssignMachine->machine_id = json_decode($request->machine_id) ?? $botlerAssignMachine->machine_id;
                $botlerAssignMachine->updated_by = Auth::user()->id;
                $botlerAssignMachine->updated_at = now();
                $botlerAssignMachine->deleted_at = null;
                $botlerAssignMachine->save();
                $machine = Machine::where('id', json_decode($request->machine_id))->first();
                if ($machine) {
                    $machine->status = 0;
                    $machine->updated_at = now();
                    $machine->save();
                }

                return response()->json([
                    'success' => true,
                    'message' => 'Machine successfully assigned to bottler.'
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error assigning machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function deleteAssignedSubBotlerMachine(Request $request, $id) {
            try {
                $botlerAssignMachine = AssigneMachineToSubBotler::where('id', json_decode($id))->first();
                if (!$botlerAssignMachine) {
                    return response()->json(['success' => false, 'message' => 'Assigned Machine not found']);
                }

                if($botlerAssignMachine) {
                    $machine = AssigneMachineToBotler::where('machine_id', $botlerAssignMachine->machine_id)
                                ->where('bottler_id', $botlerAssignMachine->bottler_id)            
                                ->first();
                    $machine->assigned = 0;
                    $machine->assign_to_sub_machine = 0;
                    // dd($botlerAssignMachine->bottler_id, $botlerAssignMachine->machine_id, $machine);
                    $machine->save();
                    $botlerAssignMachine->forceDelete();
                    return response()->json(['success' => true, 'message' => 'Assigned Sub Botler Machine Deleted Successfully']);
                }
            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'success' => false,
                    'message' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error deleting machine: ' . $e->getMessage()
                ], 500);
            }
        }

        public function assignedMachineToSubBotlerList(Request $request) {
            try {
                // $details = DB::raw("SELECT masb.*, bm.bottler_name, mm.machine_name, mm.machine_number FROM `machine_assign_sub_bottler` masb
                //                 join bottler_masters bm on bm.id = masb.bottler_id
                //                 JOIN machine_masters mm on mm.id = masb.machine_id;
                //             ");
                $query = AssigneMachineToSubBotler::with([
                    'subBotler:id,sub_bottler_name',
                    'machine:id,machine_name,machine_number,address,city,state,installed'
                ]);
                if ($request->has('bottler_id')) {
                    $query->where('bottler_id', $request->bottler_id);
                }

                if ($request->has('sub_bottler_id')) {
                    $query->where('sub_bottler_id', $request->sub_bottler_id);
                }

                $assignedList = $query->orderByDesc('id')->get();

                return response()->json([
                    'success' => true,
                    'data' => $assignedList
                ]);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error fetching assigned machines: ' . $e->getMessage()
                ], 500);
            }
        }
    // Assigne Machine To Sub Botler Management


    // Sub Botler User Creation Start
        public function subBotlerUserList(Request $request, $id) {
            try {
                $users = DB::select("SELECT u.*, sb.sub_bottler_name, sb.id AS sub_botler_id,
                            sb.company_name AS sub_company_name, 
                            bm.id AS botler_id,
                            bm.bottler_name, 
                            bm.company_name AS bottler_company_name FROM users u
                            JOIN sub_bottler_master sb ON sb.id = u.sub_bottler_id
                            JOIN bottler_masters bm ON bm.id = u.bottler_id
                            WHERE u.sub_bottler_id = ?
                          ", [json_decode($id)]);

                $roles = $this->rolesTrait();
                $botlerUserHeader = $this->botlerUserHeaderTrait();

                return view('admin.users.bottler.sub-botler-user', [
                    'users' => $users,
                    'roles' => $roles,
                    'botlerUserHeader' => $botlerUserHeader,
                ]);
            } catch (\Throwable $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error fetching sub botler users: ' . $e->getMessage()
                ], 500);
            }
        }

        public function createSubBotlerUser(Request $request) {
            try {
                $request->validate([
                    'bottler_id' => 'required|integer',
                    'sub_bottler_id' => 'required|integer',
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:5',
                    'role' => 'required|string',
                    'status' => 'required|boolean',
                    'contact_no' => 'nullable|string|max:15',
                    'personal_no' => 'nullable|string|max:15',
                    'address' => 'nullable|string|max:255',
                    'user_about' => 'nullable|string|max:500',
                ]);

                // Check for duplicate mobile number
                $mobileNumber = User::where('contact_no', $request->contact_no)->first();
                if ($mobileNumber) {
                    return response()->json(['error' => 'Mobile number already exists']);
                }

                $email = User::where('email', $request->email)->first();
                if ($email) {
                    return response()->json(['error' => 'Email already exists']);
                }

                $user = new User();
                $user->bottler_id = json_decode($request->bottler_id);
                $user->sub_bottler_id = json_decode($request->sub_bottler_id);
                $user->name = ucwords(strtolower($request->name));
                $user->username = ucwords(strtolower($request->name));
                $user->email = str_replace(" ", '', strtolower($request->email));
                $user->password = Hash::make($request->password);
                $user->default_password = $request->password;
                $user->role = $request->role;
                $user->status = json_decode($request->status);
                $user->phone = preg_replace('/[^0-9]/', '', $request->contact_no);
                $user->contact_no = preg_replace('/[^0-9]/', '', $request->contact_no);
                $user->personal_no = preg_replace('/[^0-9]/', '', $request->personal_no);
                $user->address = ucwords(strtolower($request->address));
                $user->user_about = ucwords(strtolower($request->user_about));
                $user->login_status = 0;
                $user->created_by = Auth::user()->id;
                $user->created_at = now();
                $user->updated_at = null;
                $user->deleted_at = null;
                $user->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Sub Botler User created successfully.'
                ]);

            } catch (\Illuminate\Validation\ValidationException $e) {
                return response()->json([
                    'error' => $e->validator->errors()->first()
                ], 422);
            } catch (\Throwable $e) {
                return response()->json([
                    'error' => 'Error creating sub botler user: ' . $e->getMessage()
                ], 500);
            }
        }

    // Sub Botler User Creation End
}
