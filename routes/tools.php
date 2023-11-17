<?php

use App\Http\Controllers\Tools\ToolsController;

Route::get('/tools', [ToolsController::class, 'index']);

Route::post('/tools', [ToolsController::class, 'rate']);