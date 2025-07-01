<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\QRBinController;
use App\Http\Controllers\Admin\BinMasterController;
use App\Http\Controllers\Admin\SMSMachineController;
use App\Http\Controllers\Admin\ValidMobileController;
use App\Http\Controllers\Admin\SliderMasterController;
use App\Http\Controllers\Admin\BotlerMasterController;
use App\Http\Controllers\Admin\GenerateExcelController;
use App\Http\Controllers\Admin\MachineMasterController;

// this routes are already prefixed with admin in RouteServiceProvider.php


Route::get('login', [AuthController::class, 'login']);
Route::post('auth', [AuthController::class, 'checkUser'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('forgetPassword', [AuthController::class, 'showforget']);
Route::post('forgetPassword', [AuthController::class, 'forgetpassword']);
Route::post('changePassword', [AuthController::class, 'changepassword']);

Route::post('delete', [AdminController::class, 'delete']);

Route::group(['middleware' => ['checkUserr']], function () {
    // Dashboard Route
        Route::group(['prefix' => 'dashboard'], function () {
            Route::get('/', [AdminController::class, 'indexAdmin'])->name('admin.dashboard');
        });
    // Dashboard Route


    // User Management Route
        Route::group(['prefix' => 'user'], function() {
            Route::group(['prefix' => 'user'], function () {
                Route::get('', [AdminController::class, 'indexUser']);
                Route::get('add', [AdminController::class, 'indexAddUser']);
                Route::post('add', [AdminController::class, 'addUser']);
                Route::post('addExcel', [AdminController::class, 'addUserExcel']);
                Route::get('update', [AdminController::class, 'indexUpdateUser']);
                Route::post('update', [AdminController::class, 'updateUser']);
                Route::get('manage/permissions', [AdminController::class, 'showUserPermissions']);
                Route::post('manage/assignPermission', [AdminController::class, 'assignUserPermissions']);
                Route::post('delete', [AdminController::class, 'deleteUser']);
            });

            Route::group(['prefix' => 'role'], function () {
                Route::get('/', [AdminController::class, 'indexRole']);
                Route::get('/showAdd', [AdminController::class, 'showAddRole']);
                Route::post('/add', [AdminController::class, 'addRole']);
                Route::get('/view/{id}', [AdminController::class, 'viewRole']);
                Route::get('/viewUpdate/{name}', [AdminController::class, 'showUpdateRole']);
                Route::post('/update', [AdminController::class, 'updateRole']);
                Route::post('/delete', [AdminController::class, 'deleteRole']);
            });

            Route::group(['prefix' => 'permission'], function () {
                Route::get('/', [AdminController::class, 'indexPermission']);
                Route::post('/add', [AdminController::class, 'addPermission']);
                Route::post('/update', [AdminController::class, 'updatePermission']);
                Route::post('/delete', [AdminController::class, 'deletePermission']);
            });

            Route::group(['prefix' => 'profile'], function () {
                Route::get('/', [AdminController::class, 'showProfile']);
                Route::post('editProfileDetails', [AdminController::class, 'updateProfile']);
                Route::get('deactiveAccount', [AdminController::class, 'deactiveAccount']);
                Route::post('checkEmail', [AdminController::class, 'checkProfileEmail']);
                Route::post('checkPhone', [AdminController::class, 'checkPhone']);
                Route::post('checkPass', [AdminController::class, 'checkProfilePass']);
                Route::post('saveNewPhonenumber', [AdminController::class, 'saveNewPhonenumber']);
                Route::post('checkOldPass', [AdminController::class, 'checkOldPass']);
                Route::post('updatePassword', [AdminController::class, 'updatePassword']);
            });

            Route::group(['prefix' => 'botler'], function() {
                Route::get('list', [BotlerMasterController::class, 'botlerIndex'])->name('admin.user.botler.list');
                Route::post('save', [BotlerMasterController::class, 'botlerSave'])->name('admin.user.botler.save');
                Route::post('update', [BotlerMasterController::class, 'botlerUpdate'])->name('admin.user.botler.update');
                Route::post('delete', [BotlerMasterController::class, 'botlerDelete'])->name('admin.user.botler.delete');
                Route::post('assign/{id}', [BotlerMasterController::class, 'botlerAssign'])->name('admin.user.botler.assign');

                Route::get('detail/{id}', [BotlerMasterController::class, 'botlerDetail'])->name('admin.user.botler.detail');
                Route::get('sub-botler/list/{id}', [BotlerMasterController::class, 'subBotlerIndex'])->name('admin.user.sub-botler.list');

                Route::get('user-details', [BotlerMasterController::class, 'userBotlerDetail'])->name('admin.user.botler.user-details');
                Route::post('user-botler/save', [BotlerMasterController::class, 'userBotlerSave'])->name('admin.user.botler.user.save');
                Route::post('user-botler/update', [BotlerMasterController::class, 'userBotlerUpdate'])->name('admin.user.botler.user.update');
                Route::post('user-botler/delete', [BotlerMasterController::class, 'userBotlerDelete'])->name('admin.user.botler.user.delete');

                Route::post('sub-botler/save', [BotlerMasterController::class, 'subBotlerSave'])->name('admin.user.sub-botler.save');
                Route::post('sub-botler/update', [BotlerMasterController::class, 'subBotlerUpdate'])->name('admin.user.sub-botler.update');
                Route::post('sub-botler/delete', [BotlerMasterController::class, 'subBotlerDelete'])->name('admin.user.sub-botler.delete');

                Route::get('user-list/{id}', [BotlerMasterController::class, 'subBotlerUserList'])->name('admin.user.sub-botler.user-list');
                Route::post('user-create', [BotlerMasterController::class, 'createSubBotlerUser'])->name('admin.user.sub-botler.user-create');
                Route::get('machine-list/{id}', [BotlerMasterController::class, 'subBotlerAssignMachineIndex'])->name('admin.user.sub-botler.machine-list');
                            
                Route::post('assign-machine', [BotlerMasterController::class, 'botlerAssignMachineToBotlerSave'])->name('admin.user.botler.assign-machine.save');
                Route::post('assign-machine/edit', [BotlerMasterController::class, 'botlerAssignMachineToBotlerUpdate'])->name('admin.user.botler.assign-machine.edit');
                Route::get('machine-options/{id}', [BotlerMasterController::class, 'getMachineDetails'])->name('admin.user.botler.assign-machine.machine-options');
                Route::post('delete/{id}', [BotlerMasterController::class, 'deleteAssignedBotlerMachine'])->name('admin.user.botler.assign-machine.delete');
                
                Route::get('sub/options/{id}', [BotlerMasterController::class, 'getSubMachineDetails'])->name('admin.user.botler.assign-sub-botler.machine-options');
                Route::post('sub/machine', [BotlerMasterController::class, 'botlerAssignMachineToSubBotlerSave'])->name('admin.user.botler.assign-sub-botler.save');
                Route::post('sub/machine/edit', [BotlerMasterController::class, 'botlerAssignMachineToSubBotlerUpdate'])->name('admin.user.botler.assign-sub-botler.edit');
                Route::post('sub-botler-machine/delete/{id}', [BotlerMasterController::class, 'deleteAssignedSubBotlerMachine'])->name('admin.user.botler.assign-sub-botler.delete');
                
                Route::post('generate-excel', [GenerateExcelController::class, 'generateExcel'])->name('admin.user.botler.download');
                // Route::get('botlers-user/{id}', [BotlerMasterController::class, 'botlerUserIndex'])->name('admin.user.botler.user-list');
                // Route::get('botlers-sub/{id}', [BotlerMasterController::class, 'subBotlerIndex'])->name('admin.user.sub-botler.list');

            });

        });
    // User Management Route 

    // Master Machine Route
        Route::group(['prefix' => 'master'], function() {
            Route::group(['prefix' => 'machine'], function() {
                Route::get('list', [MachineMasterController::class, 'machineIndex'])->name('admin.master.machine.list');
                Route::get('create', [MachineMasterController::class, 'machineCreate'])->name('admin.master.machine.create');
                Route::get('save', [MachineMasterController::class, 'machineSave'])->name('admin.master.machine.save');
            });

            Route::group(['prefix' => 'validate-mobile'], function() {
                Route::get('list', [ValidMobileController::class, 'mobileIndex'])->name('admin.master.validate-mobile.list');
                Route::post('save', [ValidMobileController::class, 'mobileSave'])->name('admin.master.validate-mobile.save');
                Route::get('view/{id}', [ValidMobileController::class, 'mobileShow'])->name('admin.master.validate-mobile.view');
                Route::get('edit/{id}', [ValidMobileController::class, 'mobileEdit'])->name('admin.master.validate-mobile.edit');
                Route::get('delete/{id}', [ValidMobileController::class, 'mobileDelete'])->name('admin.master.validate-mobile.delete');
            });

            Route::group(['prefix' => 'sms'], function() {
                Route::get('list', [SMSMachineController::class, 'smsIndex'])->name('admin.master.sms.list');
                Route::post('save', [SMSMachineController::class, 'smsSave'])->name('admin.master.sms.save');
                Route::get('view/{id}', [SMSMachineController::class, 'smsShow'])->name('admin.master.sms.view');
                Route::get('edit/{id}', [SMSMachineController::class, 'smsEdit'])->name('admin.master.sms.edit');
                Route::get('delete/{id}', [SMSMachineController::class, 'smsDelete'])->name('admin.master.sms.delete');
            });

            Route::group(['prefix' => 'qr-bin'], function() {
                Route::get('list', [QRBinController::class, 'qrBinIndex'])->name('admin.master.qr-bin.list');
                Route::post('save', [QRBinController::class, 'qrBinSave'])->name('admin.master.qr-bin.save');
                Route::get('view/{id}', [QRBinController::class, 'qrBinShow'])->name('admin.master.qr-bin.view');
                Route::get('edit/{id}', [QRBinController::class, 'qrBinEdit'])->name('admin.master.qr-bin.edit');
                Route::get('delete/{id}', [QRBinController::class, 'qrBinDelete'])->name('admin.master.qr-bin.delete');
            });
        });
    // Master Machine Route

    Route::group(['prefix' => 'slider'], function() {
        Route::get('list', [SliderMasterController::class, 'sliderIndex'])->name('admin.master.slider.list');
        Route::get('create', [SliderMasterController::class, 'sliderCreate'])->name('admin.master.slider.create');
        Route::get('save', [SliderMasterController::class, 'sliderSave'])->name('admin.master.slider.save');
    });

    Route::group(['prefix' => 'bin'], function() {
        Route::get('list', [BinMasterController::class, 'binIndex'])->name('admin.master.bin.list');
        Route::get('create', [BinMasterController::class, 'binCreate'])->name('admin.master.bin.create');
        Route::get('save', [BinMasterController::class, 'binSave'])->name('admin.master.bin.save');
    });


});
