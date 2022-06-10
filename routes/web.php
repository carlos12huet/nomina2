<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(App\Http\Controllers\RegimeController::class)->group(function()
    {
        Route::get('/regime/import','import')->name('regime.import')->middleware('auth');
        Route::post('/regime/saveimport','saveimport')->name('regime.saveimport')->middleware('auth');
    }
);
Route::controller(App\Http\Controllers\TaxController::class)->group(
    function(){
        Route::get('/tax/import','import')->name('tax.import')->middleware('auth');
        Route::post('/tax/saveimport','saveimport')->name('tax.saveimport')->middleware('auth');
    }
);
Route::controller(App\Http\Controllers\WorkdayController::class)->group(
    function(){
        Route::get('/workday/import','import')->name('workday.import')->middleware('auth');
        Route::post('/workday/saveimport','saveimport')->name('workday.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\TcontractController::class)->group(
    function(){
        Route::get('/tcontract/import','import')->name('tcontract.import')->middleware('auth');
        Route::post('/tcontract/saveimport','saveimport')->name('tcontract.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\PeriodController::class)->group(
    function(){
        Route::get('/period/import','import')->name('period.import')->middleware('auth');
        Route::post('/period/saveimport','saveimport')->name('period.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\SubdetailController::class)->group(
    function(){
        Route::get('/subdetail/import','import')->name('subdetail.import')->middleware('auth');
        Route::post('/subdetail/saveimport','saveimport')->name('subdetail.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\IsrdetailController::class)->group(
    function(){
        Route::get('/isrdetail/import','import')->name('isrdetail.import')->middleware('auth');
        Route::post('/isrdetail/saveimport','saveimport')->name('isrdetail.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\SihaeController::class)->group(
    function(){
        Route::get('/sihae/import','import')->name('sihae.import')->middleware('auth');
        Route::post('/sihae/saveimport','saveimport')->name('sihae.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\SatdeductionController::class)->group(
    function(){
        Route::get('/satdeduction/import','import')->name('satdeduction.import')->middleware('auth');
        Route::post('/satdeduction/saveimport','saveimport')->name('satdeduction.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\SatperceptionController::class)->group(
    function(){
        Route::get('/satperception/import','import')->name('satperception.import')->middleware('auth');
        Route::post('/satperception/saveimport','saveimport')->name('satperception.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\PerceptionController::class)->group(
    function(){
        Route::get('/perception/import','import')->name('perception.import')->middleware('auth');
        Route::post('/perception/saveimport','saveimport')->name('perception.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\DeductionController::class)->group(
    function(){
        Route::get('/deduction/import','import')->name('deduction.import')->middleware('auth');
        Route::post('/deduction/saveimport','saveimport')->name('deduction.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\TabdetailController::class)->group(
    function(){
        Route::get('/tabdetail/import','import')->name('tabdetail.import')->middleware('auth');
        Route::post('/tabdetail/saveimport','saveimport')->name('tabdetail.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\DepartmentController::class)->group(
    function(){
        Route::get('/department/import','import')->name('department.import')->middleware('auth');
        Route::post('/department/saveimport','saveimport')->name('department.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\PositionController::class)->group(
    function(){
        Route::get('/position/import','import')->name('position.import')->middleware('auth');
        Route::post('/position/saveimport','saveimport')->name('position.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\ProjectController::class)->group(
    function(){
        Route::get('/project/import','import')->name('project.import')->middleware('auth');
        Route::post('/project/saveimport','saveimport')->name('project.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\MunicipalityController::class)->group(
    function(){
        Route::get('/municipality/import','import')->name('municipality.import')->middleware('auth');
        Route::post('/municipality/saveimport','saveimport')->name('municipality.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\WorkerController::class)->group(
    function(){
        Route::get('/worker/import','import')->name('worker.import')->middleware('auth');
        Route::post('/worker/saveimport','saveimport')->name('worker.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\SettingController::class)->group(
    function(){
        Route::get('/setting/import','import')->name('setting.import')->middleware('auth');
        Route::post('/setting/saveimport','saveimport')->name('setting.saveimport')->middleware('auth');
    }
);

Route::controller(App\Http\Controllers\PaydetailController::class)->group(
    function(){
        Route::get('/paydetail/export','export')->name('paydetail.export')->middleware('auth');
        Route::post('/paydetail/exportable','exportable')->name('paydetail.exportable')->middleware('auth');
    }
);
Route::controller(App\Http\Controllers\xController::class)->group(
    function(){
        Route::get('/X/import','import')->name('X.import')->middleware('auth');
        Route::post('/X/saveimport','saveimport')->name('X.saveimport')->middleware('auth');
    }
);

Route::resource('isr',App\Http\Controllers\IsrController::class)->middleware('auth');
Route::resource('tax',App\Http\Controllers\TaxController::class)->middleware('auth');
Route::resource('tab',App\Http\Controllers\TabController::class)->middleware('auth');
Route::resource('user',App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('role',App\Http\Controllers\RoleController::class)->middleware('auth');
Route::resource('sihae',App\Http\Controllers\SihaeController::class)->middleware('auth');
Route::resource('worker',App\Http\Controllers\WorkerController::class)->middleware('auth');
Route::resource('regime',App\Http\Controllers\RegimeController::class)->middleware('auth');
Route::resource('period',App\Http\Controllers\PeriodController::class)->middleware('auth');
Route::resource('workday',App\Http\Controllers\WorkdayController::class)->middleware('auth');
Route::resource('project',App\Http\Controllers\ProjectController::class)->middleware('auth');
Route::resource('setting',App\Http\Controllers\SettingController::class)->middleware('auth');
Route::resource('subsidy',App\Http\Controllers\SubsidyController::class)->middleware('auth');
Route::resource('payroll',App\Http\Controllers\PayrollController::class)->middleware('auth');
Route::resource('paydetail',App\Http\Controllers\PaydetailController::class)->middleware('auth');
Route::resource('contract',App\Http\Controllers\ContractController::class)->middleware('auth');
Route::resource('position',App\Http\Controllers\PositionController::class)->middleware('auth');
Route::resource('subdetail',App\Http\Controllers\SubdetailController::class)->middleware('auth');
Route::resource('tabdetail',App\Http\Controllers\TabdetailController::class)->middleware('auth');
Route::resource('isrdetail',App\Http\Controllers\IsrdetailController::class)->middleware('auth');
Route::resource('deduction',App\Http\Controllers\DeductionController::class)->middleware('auth');
Route::resource('perception',App\Http\Controllers\PerceptionController::class)->middleware('auth');
Route::resource('tcontract',App\Http\Controllers\TcontractController::class)->middleware('auth');
Route::resource('permission',App\Http\Controllers\PermissionController::class)->middleware('auth');
Route::resource('department',App\Http\Controllers\DepartmentController::class)->middleware('auth');

Route::resource('municipality',App\Http\Controllers\MunicipalityController::class)->middleware('auth');
Route::resource('satdeduction',App\Http\Controllers\SatdeductionController::class)->middleware('auth');
Route::resource('satperception',App\Http\Controllers\SatperceptionController::class)->middleware('auth');

