<?php


use App\Domain\ContentTypeBuilder\Http\Controllers\ComponentController;
use Illuminate\Support\Facades\Route;

Route::prefix('component')->group(function () {
    Route::post('',[ComponentController::class,'store']);
});
