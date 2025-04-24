<?php
use Illuminate\Support\Facades\Route;
use Ocean\Tracking\Controllers\OceanTrackingController;

Route::post('api/ocean-tracking', [OceanTrackingController::class, 'update']);