<?php

use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\fileSystem\fileController;
use App\Http\Controllers\GoalsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SlidesController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\TeamController;
use App\Models\File;
use Illuminate\Support\Facades\Route;

###################### Website Content ###################################
Route::get('/', [DashboardController::class, 'home'])->name('home');
Route::prefix('/activities')->group(function () {
    Route::get('/', [DashboardController::class, 'activities'])->name('activities');
    Route::get('/news', [DashboardController::class, 'news'])->name('activities.news');
    Route::get('/insights', [DashboardController::class, 'insights'])->name('activities.insights');

    Route::get('/{id}', [DashboardController::class, 'activity'])->name('activity');
});
Route::get('/about', [DashboardController::class, 'about'])->name('about');
Route::get('others/{page}', [DashboardController::class, 'userShow'])->name('pages.userShow');
Route::get('/contact', [DashboardController::class, 'contact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.submit');

### payment functions ###
Route::prefix('payment')->group(function () {
    Route::get('/donation', [DashboardController::class, 'createTransaction'])->name('createTransaction');
    Route::post('/process', [PaymentController::class, 'processTransaction'])->name('processTransaction');
    Route::get('/success', [PaymentController::class, 'successTransaction'])->name('successTransaction');
    Route::get('/cancel', [PaymentController::class, 'cancelTransaction'])->name('cancelTransaction');
});

### redirected functions from the website ####
Route::resource('subsicribe', SubscriberController::class);
Route::get('/team', [DashboardController::class, 'team'])->name('team');

############################# Dashboard Just For Verification Emails ####################################
Route::prefix('dash')->middleware(['auth:admin,user', 'verified'])->group(function () {

    Route::get('filesystem', [fileController::class,'index'])->name('fileSystem');

    ### Dashboard Page ###
    Route::get('/', 'DashboardController@index')->name('dashboard');


    ### Admin Methods ###
    Route::resource('admin', AdminController::class);

    ### Trash Method For Admin Controller ###
    Route::prefix('admin/trash')->group(function () {
        Route::get('/read', 'AdminController@trash')->name('admin.trash');
        Route::get('/{id}', 'AdminController@restore')->name('admin.restore');
        Route::delete('/{id}', 'AdminController@forceDelete')->name('admin.forceDelete');
    });

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
    ### Trash Method For posts  ###
    Route::prefix('posts/trash')->group(function () {
        Route::get('/read', 'postController@trash')->name('posts.trash');
        Route::get('/{id}', 'postController@restore')->name('posts.restore');
        Route::delete('/{id}', 'PostController@forceDelete')->name('posts.forceDelete');
    });

    ### Pages Methods ###
    Route::resource('/page', PageController::class);
    Route::prefix('/staticpages')->group(function () {
        Route::get('/trash', [PageController::class, 'trash'])->name('pages.trash');
        Route::put('/{id}/restore', [PageController::class, 'restore'])->name('pages.restore');
        Route::delete('/{id}/force-delete', [PageController::class, 'forceDelete'])->name('pages.force-delete');
    });
    Route::prefix('pages')->group(function () {
        Route::get('/{page}/posts/edit', 'PageController@editPagePosts')->name('page-posts.edit');
        Route::put('/{page}/posts', 'PageController@updatePagePosts')->name('page-posts.update');
        Route::resource('/activities', ActivitiesController::class);
        Route::put('/activities/{activity}/slide', [ActivitiesController::class, 'slidable'])->name('activities.slide.add');
        Route::resource('/slides', SlidesController::class);
        Route::resource('/goals', GoalsController::class);
        Route::resource('/contacts', ContactController::class);
        Route::get('/trash', 'TeamController@trash')->name('team.trash');
        Route::get('/home/manage', 'DashboardController@homePage')->name('pages.home');
    });

    ### Permissions and Roles ###
    Route::resource('Roles', RoleController::class);
    Route::resource('permission', PermissionsController::class);
    Route::get('role/{role}/permissions/edit', 'RoleController@editRolePermissions')->name('role-permissions.edit');
    Route::put('role/{role}/permissions', 'RoleController@updateRolePermissions')->name('role-permissions.update');

    ### Email Messages In Dashboard
    Route::get('contact-messages', [ContactController::class, 'showEmails'])->name('messages.show');

    ### Change Password ###
    Route::prefix('admin/password')->group(function () {
        Route::get('change', 'auth\authController@changePassword')->name('password.change');
        Route::post('update', 'auth\authController@updatePassword')->name('password.update');
    });
});


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
