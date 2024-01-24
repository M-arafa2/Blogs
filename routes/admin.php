<?php

use App\Models\OrderTerm;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\SupportChat;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TicketController;
use App\Http\Controllers\Admin\VendorController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\LicenseController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\SitepageController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderTermController;
use App\Http\Controllers\Admin\CommercialController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\OccupationController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\SubDepartmentController;
use App\Http\Controllers\Admin\DepartmentQuestionController;

Route::get('supports', SupportChat::class)->name('supports');
Route::view('login', 'admin.login')->middleware('admin_guest')->name('login');
Route::post('login', [AuthController::class, 'login'])->middleware('admin_guest')->name('login.post');
Route::group(['middleware' => 'admin'], function () {
    /* Route::get('/', function () {
    return view('admin.home');
    })->name('home');  */

    Route::get('/', [DashboardController::class, 'index'])->name('home');

    Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [SettingsController::class, 'update'])->name('settings.update');

    // use JodaResource
    Route::resource('departments/{department}/questions', DepartmentQuestionController::class, ['names' => 'department-questions']);
    Route::resource('departments', DepartmentController::class);
    Route::resource('tickets', TicketController::class);
    Route::get('/replaysTicket/{id}', [TicketController::class, 'replaysTicket'])->name('replaysTicket');

    Route::post('tickets/storeComment', [TicketController::class, 'storeComment'])->name('tickets.storeComment');

    Route::resource('sub-departments', SubDepartmentController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('sitepages', SitepageController::class)->except('show');
    Route::resource('countries', CountryController::class);
    Route::resource('cities', CityController::class);

    Route::resource('users', UserController::class);
    Route::get('/user/change_status/{id}', [UserController::class, 'change_status'])->name('user.change_status');
    Route::get('user/showInvoice/{cart}', [UserController::class, 'showInvoice'])->name('user.showInvoice');

    Route::resource('vendors', VendorController::class);
    Route::get('/vendor/change_status/{id}', [VendorController::class, 'change_status'])->name('vendor.change_status');
    Route::get('vendor/showInvoice/{cart_product}', [VendorController::class, 'showInvoice'])->name('vendor.showInvoice');
    // Route::get('user/{type}', [UserController::class, 'users'])->name('users.type');

    Route::resource('products', ProductController::class);
    Route::get('/product/change_status/{id}', [ProductController::class, 'change_status'])->name('product.change_status');
    Route::post('products/accept/{id}', [ProductController::class, 'accept'])->name('products.accept');
    Route::post('products/reject/{id}', [ProductController::class, 'reject'])->name('products.reject');

    Route::resource('notifications', NotificationController::class)->except('show');
    Route::post('notifications/deleteAll', [NotificationController::class, 'deleteAll'])->name('notifications.deleteAll');
    Route::get('notifications/createNotificationUser', [NotificationController::class, 'createNotificationUser'])->name('notifications.createNotificationUser');
    Route::get('notifications/createNotificationVendor', [NotificationController::class, 'createNotificationVendor'])->name('notifications.createNotificationVendor');
    Route::resource('commercials', CommercialController::class);
    Route::resource('licenses', LicenseController::class);
    Route::resource('occupations', OccupationController::class);

    // Route::get('sections/list' , [App\Http\Controllers\Admin\DepartmentController::class , 'list'])->name('admin.departments');
    // Route::get('sections/profile/{id}' , [App\Http\Controllers\Admin\DepartmentController::class , 'department_profile'])->name('admin.department.profile');
    // Route::post('sections/save/{id}' , [App\Http\Controllers\Admin\DepartmentController::class , 'department_save'])->name('admin.department.save');
    // Route::post('sections/delete' , [App\Http\Controllers\Admin\DepartmentController::class , 'department_delete'])->name('admin.department.delete');

    Route::get('questions/list', [App\Http\Controllers\Admin\QuestionController::class, 'list'])->name('questions');
    Route::get('question/profile/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'question_profile'])->name('question.profile');
    Route::post('question/save', [App\Http\Controllers\Admin\QuestionController::class, 'question_save'])->name('question.save');
    Route::post('question/delete/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'question_delete'])->name('question.delete');
    Route::post('question/edit/{id}', [App\Http\Controllers\Admin\QuestionController::class, 'question_edit'])->name('question.edit');

    Route::resource('orders', OrderController::class);
    Route::post('orders/accept/{id}', [OrderController::class, 'accept'])->name('orders.accept');
    Route::post('orders/reject/{id}', [OrderController::class, 'reject'])->name('orders.reject');

    Route::resource('order-terms', OrderTermController::class);

    Route::resource('carts', CartController::class);

    Route::resource('contact-us', ContactUsController::class);
    //Blogs
    Route::resource('blogs', BlogController::class)->only('index', 'store', 'update', 'destroy');
});
