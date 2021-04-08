<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Office\OfficeController;
use App\Http\Controllers\Allotment\ActivityController;
use App\Http\Controllers\Allotment\AllotmentClassController;
use App\Http\Controllers\Allotment\BalanceController;
use App\Http\Controllers\Allotment\PAPController;
use App\Http\Controllers\Allotment\UACSCodeController;
use App\Http\Controllers\Allotment\RaodController;
use App\Http\Controllers\Allotment\MOOEController;
use App\Http\Controllers\Allotment\PersonalServicesController;
use App\Http\Controllers\Allotment\CapitalOutlayController;
use App\Http\Controllers\Allotment\FundTransferController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('users', [AuthController::class, 'getusers']);
Route::delete('deluser/{id}', [AuthController::class, 'deluser']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::apiResource('offices', OfficeController::class)->only(['index','store','update','destroy']);
Route::apiResource('activity', ActivityController::class)->only(['index','store','update','destroy']);
//Route::apiResource('allotmentclass', AllotmentClassController::class)->only(['index','store','update','destroy']);
//Route::apiResource('balance', BalanceController::class)->only(['index','store','update','destroy']);
//Route::apiResource('pap', PAPController::class)->only(['index','store','update','destroy']);
Route::apiResource('uacscode', UACSCodeController::class)->only(['index','store','update','destroy']);
Route::apiResource('raod', RaodController::class)->only(['index','store','update','destroy']);
Route::apiResource('mooe', MOOEController::class)->only(['index','store','update','destroy','show']);
Route::apiResource('ps', PersonalServicesController::class)->only(['index','store','update','destroy','show']);
Route::apiResource('co', CapitalOutlayController::class)->only(['index','store','update','destroy','show']);
Route::apiResource('transfer', FundTransferController::class)->only(['index','store','update','destroy','show']);

//Route::get('fundtransfer/{class}/{id}', [FundTransferController::class, 'transfer']);

Route::get('pstransfer/{id}', [PersonalServicesController::class, 'pstransfer']);
Route::get('mooetransfer/{id}', [MOOEController::class, 'mooetransfer']);
Route::get('cotransfer/{id}', [CapitalOutlayController::class, 'cotransfer']);