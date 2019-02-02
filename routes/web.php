<?php

use App\Http\Controllers\Backend\Organisation\Superadmin\RoleController;
use App\Http\Controllers\Backend\Organisation\Superadmin\UserController;
use App\Http\Controllers\Backend\Organisation\Superadmin\PermissionController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// *
//  * All route names are prefixed with 'admin.auth'.
//  */
// Route::group([
//     // 'prefix'     => 'auth',
//     // 'as'         => 'auth.',
//     // 'namespace'  => 'Auth',
//     // 'middleware' => 'role:'.config('access.users.admin_role'),
// ], function () {

//     Route::group(['namespace' => 'Organisation'], function () {
//         /*
//        * Organisation Status'
//        */
//         Route::get('organisation/deactivated', [OrganisationstatusController::class, 'getdeactivated'])->name('organisation.deactivated');
//         Route::get('organisation/deleted', [OrganisationstatusController::class, 'getDeleted'])->name('organisation.deleted');
//         Route::get('organisation/mark/{id}', [OrganisationstatusController::class, 'mark'])->name('organisation.mark');
//         // Access
//         /*
//         * Organisation CRUD
//         */
//         Route::get('organisation', [OrganisationController::class, 'index'])->name('organisation.index');
//         Route::get('organisation/create', [OrganisationController::class, 'create'])->name('organisation.create');
//         Route::post('organisation', [OrganisationController::class, 'store'])->name('organisation.store');

//         /*
//          * Specific Organisation
//          */
//         Route::group(['prefix' => 'organisation/{organisation}'], function () {
//             // Deleted
//             Route::get('delete', [OrganisationstatusController::class, 'delete'])->name('organisation.delete-permanently');
//             Route::get('restore', [OrganisationstatusController::class, 'restore'])->name('organisation.restore');
// //            Route::get('/', [OrganisationController::class, 'show'])->name('organisation.show');
//             Route::get('edit', [OrganisationController::class, 'edit'])->name('organisation.edit');
//             Route::patch('/', [OrganisationController::class, 'update'])->name('organisation.update');
//             Route::get('/takedown', [OrganisationController::class, 'takedown'])->name('organisation.takedown');
//         });
//     });

    /*
     * User Management
     */
    // Route::group(['namespace' => 'User'], function () {

    //     /*
    //      * User Status'
    //      */
    //     Route::get('user/deactivated', [UserStatusController::class, 'getDeactivated'])->name('user.deactivated');
    //     Route::get('user/deleted', [UserStatusController::class, 'getDeleted'])->name('user.deleted');

    //     /*
    //      * User CRUD
    //      */
        Route::get('user/get', [UserController::class, 'index'])->name('user.index');
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::post('user', [UserController::class, 'store'])->name('user.store');

    //     /*
    //      * Specific User
    //      */
    //     Route::get('/', [UserController::class, 'show'])->name('user.show');
    //     Route::group(['prefix' => 'user/{user}'], function () {
    //         // User
            Route::get('user/show/{user}', [UserController::class, 'show'])->name('user.show');
            Route::get('user/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
            Route::patch('user/update/{user}', [UserController::class, 'update'])->name('user.update');
            Route::get('user/delete/{user}/', [UserController::class, 'destroy'])->name('user.destroy');

    //         // Account
    //         Route::get('account/confirm/resend', [UserConfirmationController::class, 'sendConfirmationEmail'])->name('user.account.confirm.resend');

    //         // Status
    //         Route::get('mark/{status}', [UserStatusController::class, 'mark'])->name('user.mark')->where(['status' => '[0,1]']);

    //         // Social
    //         Route::get('social/{social}/unlink', [UserSocialController::class, 'unlink'])->name('user.social.unlink');

    //         // Confirmation
    //         Route::get('confirm', [UserConfirmationController::class, 'confirm'])->name('user.confirm');
    //         Route::get('unconfirm', [UserConfirmationController::class, 'unconfirm'])->name('user.unconfirm');

    //         // Password
    //         Route::get('password/change', [UserPasswordController::class, 'edit'])->name('user.change-password');
    //         Route::patch('password/change', [UserPasswordController::class, 'update'])->name('user.change-password.post');

    //         // Access
    //         Route::get('login-as', [UserAccessController::class, 'loginAs'])->name('user.login-as');

    //         // Session
    //         Route::get('clear-session', [UserSessionController::class, 'clearSession'])->name('user.clear-session');

    //         // Deleted
    //         Route::get('delete', [UserStatusController::class, 'delete'])->name('user.delete-permanently');
    //         Route::get('restore', [UserStatusController::class, 'restore'])->name('user.restore');
    //     });
    // });    

    /*
     * Permission Management
     */
    Route::group(['namespace' => 'Permission'], function () {
        Route::get('permission-list', [PermissionController::class, 'index'])->name('permission.index');
        // Route::get('permission/create', [RoleController::class, 'create'])->name('permission.create');
        Route::post('add-permission', [PermissionController::class, 'store'])->name('permission.store');

        Route::group(['prefix' => 'permission'], function () {
            Route::get('/edit/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
            Route::patch('/update/{permission}', [PermissionController::class, 'update'])->name('permission.update');
            Route::get('/delete/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');
        });
    });
    /*
     * Role Management
     */
    Route::group(['namespace' => 'Role'], function () {
        Route::get('role-list', [RoleController::class, 'index'])->name('role.index');
        // Route::get('role/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('add-role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role'], function () {
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/update/{role}', [RoleController::class, 'update'])->name('role.update');
            Route::get('/delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });
// });

Route::get('init', 'TableController@init')->name('init');
Route::get('data', 'TableController@data')->name('data');
Route::get('exportExcel', 'TableController@exportExcel')->name('exportExcel');