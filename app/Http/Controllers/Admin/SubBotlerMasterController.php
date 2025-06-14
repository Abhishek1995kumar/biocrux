<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubBotlerMasterController extends Controller {
    public function botlerIndex(Request $request) {
        // dd("botler function");
        return view('admin.users.sub_bottler.index', [
            'page' => 'Master Machine List',
        ]);
    }

    public function subBotlerIndex(Request $request) {
        // dd("sub botler function");
        return view('admin.users.sub_bottler.sub-bolter-index', [
            'page' => 'Master Machine List',
        ]);
    }

    public function subBotlerUserIndex(Request $request) {
        // dd("sub botler function");
        return view('admin.users.sub_bottler.user-index', [
            'page' => 'Master Machine List',
        ]);
    }

    public function subBotlerAssignMachineIndex(Request $request) {
        // dd("sub botler function");
        return view('admin.users.sub_bottler.assign-machine', [
            'page' => 'Master Machine List',
        ]);
    }


    public function subBotlerCreate(Request $request) {
        return view('admin.users.sub_bottler.create', [
            'page' => 'Master Machine Create',
        ]);
    }

    public function subBotlerSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }
}
