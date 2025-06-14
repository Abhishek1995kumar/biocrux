<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderMasterController extends Controller {
    public function sliderIndex(Request $request) {
        return view('admin.masters.slider.index', [
            'page' => 'Master Machine List',
        ]);
    }


    public function sliderCreate(Request $request) {
        return view('admin.masters.slider.create', [
            'page' => 'Master Machine Create',
        ]);
    }


    public function sliderSave(Request $request) {
        try{

        } catch(Throwable $e) {

        }
    }
}
