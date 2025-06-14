<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSMachineController extends Controller {
    public function smsIndex(Request $request) {
        return view('admin.masters.machine_sms.index', [
            'page' => 'Master SMS Machine List',
        ]);
    }

    public function smsSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function smsShow(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function smsEdit(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }

    public function smsDelete(Request $request, $id) {
        try{

        } catch(Throwable $e) {

        }
    }
}
