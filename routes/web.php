<?php

use App\Http\Controllers\AccordianController;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HoverContentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

############################## News Page ##################################
// Route::get('/', [NewsController::class, 'index'])->name('news.parent');

// Route::get('/conatct', function () {
//     return view('pages.contact');
// })->name('news.conatct');
// Route::prefix('news')->group(function () {
//     Route::get('local', 'newsController@local')->name('thread.local');
//     Route::get('sport', 'newsController@sport')->name('thread.sport');
//     Route::get('international', 'newsController@international')->name('thread.international');
//     Route::get('details/{id}', 'newsController@details')->name('thread.details');
// });


######################orgnaization content###################################

// Route::get('/',function(){
//     return view('layouts.org');
// });
Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('/activities', [DashboardController::class, 'activities'])->name('activities');
Route::get('/team', [DashboardController::class, 'team'])->name('team');
Route::post('/payment', 'PaymentController@store')->name('payment.store');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
// Route::get('/payment-method', [DashboardController::class, 'payment'])->name('payment');

// Route::post('/pay/stripe', [PaymentController::class, 'payWithStripe'])->name('pay.stripe');
// Route::post('/pay/paypal', [PaymentController::class, 'payWithPayPal'])->name('pay.paypal');
// Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');

// Route::get('/payment', [PaymentController::class, 'createTransaction'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
// Route::get('/payment/success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
// Route::get('/payment/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('payment.paypal.success');

Route::get('create-transaction', [PaymentController::class, 'createTransaction'])->name('createTransaction');
Route::post('process-transaction', [PaymentController::class, 'processTransaction'])->name('processTransaction');
Route::get('success-transaction', [PaymentController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
Route::resource('subsicribe', SubscriberController::class);
Route::get('second', function () {
    return view('layouts.2org');
});
Route::get('tests', function () {
    return view('layouts.2org');
});
// Define a single route for all pages
// Route::get('/{page}', [DashboardController::class, 'show'])
//     ->where('page', 'home|about|activities|team') // Restrict the page parameter to allowed values
//     ->name('page.show');
// Route::get('/', [DashboardController::class, 'show'])->defaults('page', 'home')->name('home');
############################# Dashboard Just For Verification Emails ####################################
Route::get('/test', function () {
    return view('layouts.2org');
});
Route::prefix('dash')->middleware(['auth:admin,user', 'verified'])->group(function () {

    ### Dashboard Page ###
    Route::get('/', 'DashboardController@index')->name('dashboard');

    ### Team  Methods ###
    Route::resource('team', TeamController::class);
    ### Trash Method For team Controller ###
    Route::prefix('team/trash')->group(function () {
        Route::get('/read', 'TeamController@trash')->name('team.trash');
        Route::get('/{id}', 'TeamController@restore')->name('team.restore');
        Route::delete('/{id}', 'TeamController@forceDelete')->name('team.forceDelete');
    });
    ### Posts  Methods ###
    Route::resource('posts', PostController::class);
    Route::put('actPostAdd/{post}', [PostController::class, 'updateActivitiesPost'])->name('activities.post.add');
    Route::put('actPostDelete/{post}', [PostController::class, 'DeleteActivitiesPost'])->name('activities.post.remove');
    ### Pages Methods ###
    Route::resource('/pages', PageController::class);
    // Route::get('/{page}', [PageController::class, 'userShow'])->name('pages.userShow');
    Route::prefix('pages')->group(function () {
        Route::get('/{page}/posts/edit', 'PageController@editPagePosts')->name('page-posts.edit');
        Route::put('/{page}/posts', 'PageController@updatePagePosts')->name('page-posts.update');
        Route::get('/trash', 'TeamController@trash')->name('pages.trash');
        Route::get('/home/manage', 'DashboardController@homePage')->name('pages.home');
        // Route::get('/contact/manage', [ContactController::class, 'index'])->name('pages.contact');
    });
    Route::resource('/contacts', ContactController::class);
    Route::resource('/activities', ActivitiesController::class);
    Route::resource('/hovers', HoverContentController::class);
    Route::resource('/slides', SlidesController::class);
    Route::resource('/accordians', AccordianController::class);
    // pages/{{ $page->id }}/posts
    // /dash/pages/{{ $page->id }}/posts
    ### Trash Method For Admin Controller ###
    Route::prefix('posts/trash')->group(function () {
        Route::get('/read', 'postController@trash')->name('posts.trash');
        Route::get('/{id}', 'postController@restore')->name('posts.restore');
        Route::delete('/{id}', 'PostController@forceDelete')->name('posts.forceDelete');
    });


    ### Admin Methods ###
    Route::resource('admin', AdminController::class);

    ### Trash Method For Admin Controller ###
    Route::prefix('admin/trash')->group(function () {
        Route::get('/read', 'AdminController@trash')->name('admin.trash');
        Route::get('/{id}', 'AdminController@restore')->name('admin.restore');
        Route::delete('/{id}', 'AdminController@forceDelete')->name('admin.forceDelete');
    });

    ### Change Password ###
    Route::prefix('admin/password')->group(function () {

        Route::get('change', 'auth\authController@changePassword')->name('password.change');
        Route::post('update', 'auth\authController@updatePassword')->name('password.update');
    });

    ### Permissions and Roles ###
    Route::resource('Roles', RoleController::class);
    Route::resource('permission', PermissionsController::class);
    Route::get('role/{role}/permissions/edit', 'RoleController@editRolePermissions')->name('role-permissions.edit');
    Route::put('role/{role}/permissions', 'RoleController@updateRolePermissions')->name('role-permissions.update');
});
Route::get('/{page}', [PageController::class, 'userShow'])->name('pages.userShow');
############################################ Email Verification ###########################

Route::prefix('dash')->middleware(['auth:admin,user'])->group(function () {
    Route::get('logout', 'auth\authController@logout')->name('auth.logout');
    Route::get('email-verification', 'auth\authController@showVerification')->name('verification.notice');
    Route::get('email-verification/send', 'auth\authController@sendEmailVerification')->name('verification.send');
    Route::get('email-verification/{id}/{hash}', 'auth\authController@verify')->name('verification.verify');
});

#################################### Auth Page For Dashboard ##########################################

Route::prefix('auth')->middleware(['guest:admin,user'])->group(function () {

    Route::get('{guard}/login', 'auth\authController@showLogin')->name('auth.show-login');
    Route::post('login', 'auth\authController@login')->name('auth.login');
    Route::get('forget', 'auth\authController@forgetPassword')->name('password.forget');
    Route::post('forget', 'auth\authController@sendResetEmail')->name('password.email');
    Route::get('forget/{token}', 'auth\authController@resetPassword')->name('password.reset');
    Route::post('recover', 'auth\authController@recoverPassword')->name('password.recover');
});
// Pa$$w0rd!


// Route::get('test', function () {
//     return view('layouts.page-test');
// });
#################### Maintainance Mood ############################

// Route::get('down', function () {
//     Artisan::call('down');
// });
