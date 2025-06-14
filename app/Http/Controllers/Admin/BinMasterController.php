<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BinMasterController extends Controller {
    public function binIndex(Request $request) {
        return view('admin.masters.bin_master.index', [
            'page' => 'Master Machine List',
        ]);
    }


    public function binCreate(Request $request) {
        return view('admin.masters.bin_master.create', [
            'page' => 'Master Machine Create',
        ]);
    }

    public function binSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }
}
