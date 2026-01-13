<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FaultReportController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\InternalRepairController;
use App\Http\Controllers\ExternalRepairController;

use App\Models\InternalRepair;
use App\Models\ExternalRepair;
use App\Http\Controllers\AcceptanceController;


Route::get('/', function () {
    return view('welcome');
});

// AUTH
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

// STAFF dashboard
Route::get('/dashboard/staff', function () {
    return view('dashboard.staff');
})->middleware(['auth', 'role:staff']);

// TECHNICIAN dashboard
Route::get('/dashboard/technician', function () {
    $recentRepairs = InternalRepair::orderBy('repair_date', 'desc')
        ->take(5)
        ->get();

    return view('dashboard.technician', compact('recentRepairs'));
})->middleware(['auth', 'role:technician']);

// DIRECTOR dashboard
Route::get('/dashboard/director', function () {
    return view('dashboard.director');
})->middleware(['auth', 'role:director'])
  ->name('dashboard.director');

// STAFF routes
Route::middleware(['auth', 'role:staff'])->group(function () {
    Route::get('/fault-reports', [FaultReportController::class, 'index'])->name('fault_reports.index');
    Route::get('/fault-reports/create/{device_id?}', [FaultReportController::class, 'create'])->name('fault_reports.create');
    Route::post('/fault-reports', [FaultReportController::class, 'store'])->name('fault_reports.store');
});

// TECHNICIAN routes
Route::middleware(['auth', 'role:technician'])->group(function () {
    Route::get('/fault-reports-all', [FaultReportController::class, 'allReports'])->name('fault_reports.all');
    Route::get('/fault-reports/{id}', [FaultReportController::class, 'show'])->name('fault_reports.show');

    // inspection
    Route::get('/inspection', [FaultReportController::class, 'inspectionList'])->name('inspection.list');
    Route::get('/inspection/{id}', [FaultReportController::class, 'inspectionDetail'])->name('inspection.detail');

    // technician check
    Route::get('/technician/check', [FaultReportController::class, 'technicianCheck'])->name('technician.check');

    // evaluate
    Route::post('/fault-reports/{id}/evaluate', [FaultReportController::class, 'evaluate'])->name('fault_reports.evaluate');

    // repairs home (2 cards)
    Route::get('/technician/repairs', function () {
        return view('technician.repairs');
    });

    // INTERNAL repairs
    Route::get('/technician/repairs/internal', [InternalRepairController::class, 'create']);
    Route::post('/technician/repairs/internal', [InternalRepairController::class, 'store']);

    // EXTERNAL repairs (Bảo dưỡng thiết bị y tế)
    Route::get('/technician/repairs/external', [ExternalRepairController::class, 'create']);
    Route::post('/technician/repairs/external', [ExternalRepairController::class, 'store']);
    //nghiệm thu thiết bị
    Route::get('/technician/acceptance', [AcceptanceController::class, 'create']);
    Route::post('/technician/acceptance', [AcceptanceController::class, 'store']);

});

/**
 * LIST PAGES (technician + director)
 * Đặt ngoài group technician để director truy cập được
 */
Route::get('/technician/repairs/external/list', [ExternalRepairController::class, 'index'])
    ->middleware(['auth', 'role:technician|director'])
    ->name('external.quotes.index');

// INTERNAL LIST (technician + director)
Route::get('/technician/repairs/internal/list', function () {
    $repairs = InternalRepair::orderBy('repair_date', 'desc')->get();
    return view('technician.repairs_internal_list', compact('repairs'));
})->middleware(['auth', 'role:technician|director'])
  ->name('internal.repairs.index');

// DEVICES (cả staff và technician xem)
Route::get('/devices', [DeviceController::class, 'index'])->name('devices.index');

// Chỉ TECHNICIAN thêm / xóa thiết bị
Route::middleware(['auth', 'role:technician'])->group(function () {
    Route::get('/devices/create', [DeviceController::class, 'create'])->name('devices.create');
    Route::post('/devices', [DeviceController::class, 'store'])->name('devices.store');
    Route::delete('/devices/{id}', [DeviceController::class, 'destroy'])->name('devices.destroy');
});

// DIRECTOR repairs list sửa chữa nội bộ
Route::get('/director/repairs', function () {
    $repairs = InternalRepair::orderBy('repair_date', 'desc')->get();
    return view('director.repairs_list', compact('repairs'));
})->middleware(['auth', 'role:director']);
// DIRECTOR - Danh sách xin báo giá (sửa chữa bên ngoài)
Route::get('/director/repairs/external', [ExternalRepairController::class, 'index'])
    ->middleware(['auth', 'role:director'])
    ->name('director.external.quotes.index');
//route xem danh sách xin báo giá 
Route::get('/technician/acceptance/list', [AcceptanceController::class, 'index'])
    ->middleware(['auth', 'role:technician|director']);
// DIRECTOR - Danh sách nghiệm thu
Route::get('/director/acceptance', [AcceptanceController::class, 'index'])
    ->middleware(['auth', 'role:director'])
    ->name('director.acceptance.index');