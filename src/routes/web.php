<?php

use Illuminate\Support\Facades\Route;
use Lfbellante\Vies\Http\Controllers\ViesController;

Route::get('vies/{vatId}', [ViesController::class, 'checkVat'])->name('vies.checkVat');