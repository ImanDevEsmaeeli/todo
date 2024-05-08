<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\TaskController;
    use App\Http\Controllers\auth\SignupController;
    use App\Http\Controllers\auth\LoginController;
    use App\Http\Controllers\auth\LogoutController;
    use App\Http\Middleware\GuestMiddleware;
    use App\Http\Controllers\ChangeStatusController;

    Route::group(['prefix' => 'user'], function () {

        Route::group(['middleware' => GuestMiddleware::class], function () {
            Route::get('signup', [SignupController::class, 'view'])->name('signup.view');
            Route::post('signup', [SignupController::class, 'signup'])->name('signup');
            Route::get('login', [LoginController::class, 'view'])->name('login.view');
            Route::post('login', [LoginController::class, 'login'])->name('login');

        });

        Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');
        Route::put('changeStatus/{task}',ChangeStatusController::class)->name('change-status');

        Route::resource('task', TaskController::class);
    });
