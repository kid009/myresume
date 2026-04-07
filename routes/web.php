<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::get('/', [PortfolioController::class, 'index'])->name('home');

// ใส่ไว้ใน routes/web.php
Route::get('lang/{locale}', function ($locale) {
    // เช็กว่าภาษาที่ส่งมา มีในระบบเราหรือไม่ (ป้องกันคนพิมพ์ URL มั่ว)
    if (in_array($locale, ['th', 'en'])) {
        Session::put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');
