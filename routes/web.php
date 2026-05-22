<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ClientDashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PaymentController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => redirect('/login'));

require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| AUTHENTICATED ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | MAIN DASHBOARD REDIRECT
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        return auth()->user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('client.dashboard');

    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | ADMIN ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role:admin'])->group(function () {

        /*
        |--------------------------------------------------------------------------
        | ADMIN DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        /*
        |--------------------------------------------------------------------------
        | SERVICES
        |--------------------------------------------------------------------------
        */

        Route::resource('services', ServiceController::class);

        // TOGGLE SERVICE AVAILABILITY
        Route::patch('/services/{service}/toggle', [ServiceController::class, 'toggle'])
            ->name('services.toggle');

        /*
        |--------------------------------------------------------------------------
        | PETS (ADMIN)
        |--------------------------------------------------------------------------
        */

        Route::prefix('admin')->group(function () {

            Route::get('/pets', [PetController::class, 'index'])
                ->name('admin.pets.index');

            Route::get('/pets/{pet}', [PetController::class, 'show'])
                ->name('admin.pets.show');

            Route::delete('/pets/{pet}', [PetController::class, 'destroy'])
                ->name('admin.pets.destroy');

        });

        /*
        |--------------------------------------------------------------------------
        | APPOINTMENTS (ADMIN)
        |--------------------------------------------------------------------------
        */

        Route::get('/admin/appointments', [AppointmentController::class, 'adminIndex'])
            ->name('admin.appointments.index');

        Route::patch('/admin/appointments/{appointment}', [AppointmentController::class, 'updateStatus'])
            ->name('admin.appointments.update');

        /*
        |--------------------------------------------------------------------------
        | PAYMENTS (ADMIN)
        |--------------------------------------------------------------------------
        */

        Route::get('/admin/payments', [PaymentController::class, 'adminIndex'])
            ->name('admin.payments.index');

    });

    /*
    |--------------------------------------------------------------------------
    | CLIENT ROUTES
    |--------------------------------------------------------------------------
    */

    Route::middleware(['role:client'])->group(function () {

        /*
        |--------------------------------------------------------------------------
        | CLIENT DASHBOARD
        |--------------------------------------------------------------------------
        */

        Route::get('/client/dashboard', [ClientDashboardController::class, 'index'])
            ->name('client.dashboard');

        /*
        |--------------------------------------------------------------------------
        | PETS (CLIENT CRUD)
        |--------------------------------------------------------------------------
        */

        Route::resource('pets', PetController::class);

        /*
        |--------------------------------------------------------------------------
        | APPOINTMENTS
        |--------------------------------------------------------------------------
        */

        Route::get('/appointments', [AppointmentController::class, 'index'])
            ->name('appointments.index');

        Route::get('/appointments/create', [AppointmentController::class, 'create'])
            ->name('appointments.create');

        Route::post('/appointments', [AppointmentController::class, 'store'])
            ->name('appointments.store');

        /*
        |--------------------------------------------------------------------------
        | PAYMENTS
        |--------------------------------------------------------------------------
        */

        Route::get('/payments/{appointment}', [PaymentController::class, 'show'])
            ->name('payments.show');

        Route::post('/payments/{payment}/pay', [PaymentController::class, 'pay'])
            ->name('payments.pay');

    });

});