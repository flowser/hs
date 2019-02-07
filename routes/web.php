<?php

use App\Http\Controllers\Backend\Standard\TownController;
use App\Http\Controllers\Backend\Webpage\AboutController;
use App\Http\Controllers\Backend\Standard\CountyController;
use App\Http\Controllers\Backend\Webpage\ServiceController;
use App\Http\Controllers\Backend\Standard\CountryController;
use App\Http\Controllers\Backend\Organisation\Superadmin\RoleController;
use App\Http\Controllers\Backend\Organisation\Superadmin\UserController;
use App\Http\Controllers\Backend\Organisation\Superadmin\PermissionController;
use App\Http\Controllers\Backend\Organisation\Superadmin\OrganisationController;

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
        Route::post('add-role', [RoleController::class, 'store'])->name('role.store');

        Route::group(['prefix' => 'role'], function () {
            Route::get('/edit/{role}', [RoleController::class, 'edit'])->name('role.edit');
            Route::patch('/update/{role}', [RoleController::class, 'update'])->name('role.update');
            Route::get('/delete/{role}', [RoleController::class, 'destroy'])->name('role.destroy');
        });
    });
    /*
     * Country Management
     */
        Route::get('country/get', [CountryController::class, 'index'])->name('country.index');
        Route::post('country', [CountryController::class, 'store'])->name('country.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('country/show/{country}', [CountryController::class, 'show'])->name('country.show');
        Route::get('country/edit/{country}', [CountryController::class, 'edit'])->name('country.edit');
        Route::patch('country/update/{country}', [CountryController::class, 'update'])->name('country.update');
        Route::get('country/delete/{country}/', [CountryController::class, 'destroy'])->name('country.destroy');


        Route::get('county/get', [CountyController::class, 'index'])->name('county.index');
        Route::post('county', [CountyController::class, 'store'])->name('county.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('county/get/list/{county}', [CountyController::class, 'CountyList'])->name('county.list-index');//fetch county list bsedon country id
        Route::get('county/show/{county}', [CountyController::class, 'show'])->name('county.show');
        Route::get('county/edit/{county}', [CountyController::class, 'edit'])->name('county.edit');
        Route::patch('county/update/{county}', [CountyController::class, 'update'])->name('county.update');
        Route::get('county/delete/{county}/', [CountyController::class, 'destroy'])->name('county.destroy');

//Town
        Route::get('town/get', [TownController::class, 'index'])->name('town.index');
        Route::get('town/get/list/{town}', [TownController::class, 'TownList'])->name('town.list-index');
        Route::post('town', [TownController::class, 'store'])->name('town.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('town/show/{town}', [TownController::class, 'show'])->name('town.show');
        Route::get('town/edit/{town}', [TownController::class, 'edit'])->name('town.edit');
        Route::patch('town/update/{town}', [TownController::class, 'update'])->name('town.update');
        Route::get('town/delete/{town}/', [TownController::class, 'destroy'])->name('town.destroy');


        // organisation
        Route::get('organisation/get', [OrganisationController::class, 'index'])->name('organisation.index');
        Route::get('organisation/get/list', [OrganisationController::class, 'OrganisationList'])->name('organisation.list-index');
        Route::post('organisation', [OrganisationController::class, 'store'])->name('organisation.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('organisation/show/{country}', [OrganisationController::class, 'show'])->name('organisation.show');
        Route::get('organisation/edit/{country}', [OrganisationController::class, 'edit'])->name('organisation.edit');
        Route::patch('organisation/update/{country}', [OrganisationController::class, 'update'])->name('organisation.update');
        Route::get('organisation/delete/{country}/', [OrganisationController::class, 'destroy'])->name('organisation.destroy');


        // about
        Route::get('about/get', [AboutController::class, 'index'])->name('about.index');
        Route::get('abouts/get', [AboutController::class, 'organisations'])->name('about.organisations');
        Route::get('about/get/list', [AboutController::class, 'aboutList'])->name('about.list-index');
        Route::post('about', [AboutController::class, 'store'])->name('about.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('about/show/{country}', [AboutController::class, 'show'])->name('about.show');
        Route::get('about/edit/{country}', [AboutController::class, 'edit'])->name('about.edit');
        Route::patch('about/update/{country}', [AboutController::class, 'update'])->name('about.update');
        Route::get('about/delete/{country}/', [AboutController::class, 'destroy'])->name('about.destroy');

        // service
        Route::get('service/get', [ServiceController::class, 'index'])->name('service.index');
        Route::get('service/get/list', [ServiceController::class, 'aboutList'])->name('service.list-index');
        Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    //     /*
    //      * Specifics
    //      */
        Route::get('service/show/{country}', [ServiceController::class, 'show'])->name('service.show');
        Route::get('service/edit/{country}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::patch('service/update/{country}', [ServiceController::class, 'update'])->name('service.update');
        Route::get('service/delete/{country}/', [ServiceController::class, 'destroy'])->name('service.destroy');



// });

