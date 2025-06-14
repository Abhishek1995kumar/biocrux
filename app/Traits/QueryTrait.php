<?php

namespace App\Traits;

use Throwable;
use App\Models\Role;
use App\Models\User;
use App\Models\Botler;
use App\Models\SubBotler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AssigneMachineToBotler;
use App\Models\AssigneMachineToSubBotler;

trait QueryTrait {
    // Start Admin side query
        public function getMachineAssignSubBotlerList(Request $request) {
            try {
                $query = DB::table('machine_assign_sub_bottler as masb')
                    ->select('masb.*', 'sb.name as sub_botler_name', 'm.name as machine_name', 'b.name as bottler_name')
                    ->leftJoin('sub_bottler as sb', 'sb.id', '=', 'masb.sub_bottler_id')
                    ->leftJoin('machine as m', 'm.id', '=', 'masb.machine_id')
                    ->leftJoin('botler as b', 'b.id', '=', 'masb.bottler_id');
                
                if ($request->has('search') && !empty($request->search)) {
                    $query->where(function($q) use ($request) {
                        $q->where('sb.name', 'like', '%' . $request->search . '%')
                          ->orWhere('m.name', 'like', '%' . $request->search . '%')
                          ->orWhere('b.name', 'like', '%' . $request->search . '%');
                    });
                }
                
                if ($request->has('status') && !empty($request->status)) {
                    $query->where('masb.status', $request->status);
                }
                
                return $query->orderBy('masb.id', 'desc')->get();
            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function getBotlerDetailsTrait($data) {
            try {
                return Botler::where('id', json_decode($data))->first();

            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function allBotlerDetailsTrait() {
            try {
                return Botler::where('deleted_at', NULL)->orderByDesc('id')->get();

            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function botlerUserTrait($data) {
            try {
                return User::where('deleted_at', NULL)
                        ->with(['bottlerusers'])
                        ->where('bottler_id', json_decode($data))
                        ->orderByDesc('id')
                        ->get();

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function subBotlerUserTrait($data) {
            try {
                return User::where('deleted_at', NULL)
                        ->with(['bottlerusers'])
                        ->where('bottler_id', json_decode($data))
                        ->orderByDesc('id')
                        ->get();

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function subBotlerTrait($data) {
            try {
                return SubBotler::where('deleted_at', NULL)
                                ->where('bottler_id', $data)
                                ->with(['botler', 'subBotlerUsers'])
                                ->orderByDesc('id')
                                ->get();
                                
            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function assignedMachineToBotlerTrait($data) {
            try {
                return AssigneMachineToBotler::with(['botler:bottler_name', 'machine:machine_name'])
                        ->where('bottler_id', json_decode($data))
                        ->orderByDesc('id')
                        ->get();

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function assignedMachineToSubBotlerTrait($id) {
            try {
                $query = AssigneMachineToSubBotler::with([
                    'subBotler:id,sub_bottler_name',
                    'machine:id,machine_name,machine_number,address,city,state,installed'
                ])->where('bottler_id', $id);

                $assignedList = $query->orderByDesc('id')->get();
                return $assignedList;

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function machineNotAssignedToSubBotlerTrait() {
            try {
                return AssigneMachineToBotler::with([
                    'machine:id,machine_name,machine_number'
                ])->where('assigned', 0)->where('assign_to_sub_machine', 0)->get();

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function rolesTrait() {
            try {
                return Role::where('slug', '!=', 'gopl')->get();

            } catch(Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    // End Admin side query


    // All Table Headers Query
        public function botlerUserHeaderTrait() {
            try {
                return $botlerUserHeader = [
                    'Botler Name','Company Name','Email','Added On','Status','Action',
                ];
            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function subBotlerHeaderTrait() {
            try {
                return $subBotlerHeader = [
                    'Company Logo','Botler Name','Company Name','Company URL','Color','Added On','Status','Action',
                ];
            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        public function botlerAssignMachineHeaderTrait() {
            try {
                return $botlerAssignMachineHeader = [
                    'Company Logo','Botler Name','Company Name','Company URL','Color','Added On','Status','Action',
                ];
            } catch (Throwable $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }
    // All Table Headers Query End
}
