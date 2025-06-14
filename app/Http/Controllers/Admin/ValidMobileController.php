<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidMobileController extends Controller {
    public function mobileIndex(Request $request) {
        // dd("botler function");
        return view('admin.masters.valid_mobile.index', [
            'page' => 'Master Machine List',
        ]);
    }

    public function mobileSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function mobileShow(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function mobileEdit(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function mobileDelete(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }
}
