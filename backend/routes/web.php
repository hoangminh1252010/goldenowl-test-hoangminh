<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;

// Trang chủ - Dashboard
Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Tra cứu điểm thi
Route::get('/tra-cuu-diem', [ScoreController::class, 'index'])->name('scores.search');
Route::post('/tra-cuu-diem', [ScoreController::class, 'search'])->name('scores.search.post');

// Báo cáo phân loại điểm
Route::get('/bao-cao-phan-loai', [ScoreController::class, 'report'])->name('scores.report');

// Thống kê biểu đồ
Route::get('/thong-ke-bieu-do', [ScoreController::class, 'statistics'])->name('scores.statistics');

// Top 10 khối A
Route::get('/top-10-khoi-a', [ScoreController::class, 'top10KhoiA'])->name('scores.top10-khoi-a');