<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('checkphone', [AppController::class, 'checkPhone']);
Route::post('login', [AppController::class, 'login']);
Route::get('checktoken', [AppController::class, 'checkToken']);
Route::post('logout', [AppController::class, 'logout']);

// Notifications
Route::group(
    [
        'prefix' => 'notification',
    ],
    function () {
        Route::get('getNotifications', [Controller::class, 'getNotifications']);
        Route::post('markNotificationAsRead', [Controller::class, 'markNotificationAsRead']);
        Route::post('markAllNotificationsAsRead', [Controller::class, 'markAllNotificationsAsRead']);
        Route::post('deleteNotification', [Controller::class, 'deleteNotification']);
        Route::post('deleteAllNotifications', [Controller::class, 'deleteAllNotifications']);
    }
);

Route::post('uploadmedia', [AppController::class, 'uploadMedia']);

Route::middleware('CheckAppSession')->group(function () {
    Route::get('dashboard', [AppController::class, 'dashboard']);

    Route::group(
        [
            'prefix' => 'profile',
        ],
        function () {
            Route::get('', [AppController::class, 'indexProfile']);
            Route::get('worker', [AppController::class, 'indexWorkerProfile']);
            Route::post('update', [AppController::class, 'updateProfile']);
        }
    );

    Route::group(
        [
            'prefix' => 'attendance',
        ],
        function () {
            Route::post('markAttendance', [AdminController::class, 'markAttendance']);
            Route::get('', [AppController::class, 'indexAttendance']);
            Route::post('checkOut', [AppController::class, 'checkOut']);
            Route::get('add', [AppController::class, 'indexAddAttendance']);
            Route::post('add', [AppController::class, 'addDetailAttendanceWorker']);
            Route::get('update', [AppController::class, 'indexUpdateAttendance']);
            Route::post('update', [AppController::class, 'updateAttendance']);
        }
    );

    Route::get('getplantdetails', [AppController::class, 'getPlantDetails']);
    Route::get('getvendors', [AppController::class, 'getVendors']);
    Route::get('getvendortypes', [AppController::class, 'getVendorTypes']);
    Route::get('getvendorbytype', [Controller::class, 'getVendorsByType']);
    Route::get('getrawmaterials', [AppController::class, 'getRawMaterials']);
    Route::get('getfinishedgoods', [AppController::class, 'getFinishedGoods']);
    Route::get('getvehicletypes', [AppController::class, 'getVehicleTypes']);
    Route::get('getpreprocessings', [AppController::class, 'getPreProcessing']);
    Route::get('getfilters', [AppController::class, 'getFilter']);

    Route::get('getequipments', [AppController::class, 'getEquipments']);
    Route::post('updateequipmentstatus', [AppController::class, 'updateEquipmentStatus']);

    // consumables
    Route::group([
        'prefix' => 'consumable',
    ], function () {
        Route::get('', [AppController::class, 'getConsumables']);
        Route::get('detail', [AppController::class, 'indexConsumable']);
        Route::post('update', [AppController::class, 'updateConsumable']);
    });

    // materials
    Route::group([
        'prefix' => 'material',
    ], function () {
        Route::get('', [AppController::class, 'getMaterials']);
        Route::get('detail', [AppController::class, 'indexMaterial']);
        Route::post('updateprice', [AppController::class, 'updateMaterialPrice']);
    });

    // Purchase
    Route::group(
        [
            'prefix' => 'purchase',
        ],
        function () {
            Route::get('getstructure', [AppController::class, 'getPurchaseStructure']);
            Route::get('getorders', [AppController::class, 'getPurchaseOrders']);
            Route::get('getorderdetail', [AppController::class, 'getPurchaseOrderDetail']);
            Route::get('add', [AppController::class, 'indexAddPurchase']);
            Route::post('add', [AppController::class, 'addPurchase']);
            Route::get('getrejectedorders', [AppController::class, 'getRejectedOrders']);
            Route::post('createdebitnote', [AppController::class, 'createPurchaseRejectedDebit']);
            Route::post('update', [AppController::class, 'updatePurchase']);
            Route::get('search', [AppController::class, 'searchPurchase']);
        }
    );

    // Sorting
    Route::group(
        [
            'prefix' => 'sorting',
        ],
        function () {
            Route::get('', [AppController::class, 'indexSorting']);
            Route::get('add', [AppController::class, 'indexAddSorting']);
            Route::post('add', [AppController::class, 'addSorting']);
            Route::get('view', [AppController::class, 'viewSorting']);
            Route::post('update', [AppController::class, 'updateSorting']);
            Route::get('search', [AppController::class, 'searchSorting']);
        }
    );

    // Processing
    Route::group(
        [
            'prefix' => 'processing',
        ],
        function () {
            Route::get('', [AppController::class, 'indexProcessing']);
            Route::get('add', [AppController::class, 'indexAddProcessing']);
            Route::post('add', [AppController::class, 'addProcessing']);
            Route::get('view', [AppController::class, 'viewProcessing']);
            Route::post('update', [AppController::class, 'updateProcessing']);
            Route::get('search', [AppController::class, 'searchProcessing']);
        }
    );

    // Sale
    Route::group(
        [
            'prefix' => 'sale',
        ],
        function () {
            Route::get('getorders', [AppController::class, 'getSaleOrders']);
            Route::get('getorderdetail', [AppController::class, 'getSaleOrderDetail']);
            Route::get('add', [AppController::class, 'indexAddSale']);
            Route::post('add', [AppController::class, 'addSale']);
            Route::post('update', [AppController::class, 'updateSale']);
            Route::get('search', [AppController::class, 'searchSale']);
            Route::post('returnratediff', [AppController::class, 'returnratediff']);
        }
    );

    // Expenditure
    Route::group(
        [
            'prefix' => 'expenditure',
        ],
        function () {
            Route::get('', [AppController::class, 'indexExpenditureLog']);
            Route::post('add', [AppController::class, 'addExpenditureLog']);
            Route::get('detail', [AppController::class, 'indexExpenditureDetail']);
        }
    );

    // Rejection
    Route::group(
        [
            'prefix' => 'rejection',
        ],
        function () {
            Route::get('', [AppController::class, 'indexRejection']);
            Route::post('add', [AppController::class, 'addRejection']);
        }
    );
});
