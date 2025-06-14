<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Throwable;

class MachineMasterController extends Controller {
    public function machineIndex(Request $request) {
        return view('admin.masters.machine_master.index', [
            'page' => 'Master Machine List',
        ]);
    }


    public function machineCreate(Request $request) {
        return view('admin.masters.machine_master.create', [
            'page' => 'Master Machine Create',
        ]);
    }

    public function machineSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }
}
