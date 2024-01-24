<?php

use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Models\Question;
use App\Service\Taqnyat;
use App\Models\LoginCode;
use App\Models\VendorMessage;
use App\Http\Controllers\Client;
use App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\SupportChatController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Vendor\ConversationController;
use App\Http\Controllers\ProductController as ControllersProductController;

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

Route::post('login/sms', [LoginController::class, 'sendOtp'])->name('loginsms');
Route::post('rigester/verify/sms', [RegisterController::class, 'phoneVerfiy'])->name('phoneVerfiy');

// Route::middleware('auth')->group(function () {
    Route::get('loginCode', function () {
        // if (!LoginCode::where('phone', $user->phone)->where('attempted', 0)->exists()) {
        //     return redirect()->route('front.home');
        // }
        return view('auth.loginCode');
    })->name('loginCode');
    Route::post('verify_code', [LoginController::class, 'verifyOtp'])->name('verify_code');

// });

Auth::routes();
Route::get('/', function () {
    return redirect()->route('front.home');
});


Route::middleware(['auth', 'sms_verify'])->group(function () {

    Route::post('support/create', [SupportChatController::class, 'store'])->name('support.store');
    Route::get('support/chat/{id}', [SupportChatController::class, 'chat'])->name('support.chat');
    Route::get('support/list', [SupportChatController::class, 'list'])->name('support.list');
    Route::get('support/create', [SupportChatController::class, 'create'])->name('support.create');

    Route::view('orders/create', 'front.orders.create')->name('orders.create');

    Route::get('orders', function () {
        $orders = Order::where('status', 'accepted')->withCount('offers')->get();
        return view('front.orders.index', compact('orders'));
    })->name('orders');
    Route::get('/orders/callback', [PaymentController::class, 'callback'])->name('orders.callback');
    Route::get('orders/{order}', function (Order $order) {
        return view('front.orders.show', compact('order'));
    })->name('orders.show');


    Route::get('messages/{id}', function ($id) {
        $offerID = decrypt($id);
        $offer = Offer::findOrFail($offerID);
        return view('front.offers.show', compact('offer'));
    })->name('offer.show');

    Route::view('notifications', 'front.notifications.index')->name('notifications.index');
    Route::get('markAsRead/{id}', function ($id) {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
    })->name('markAsRead');

    Route::put('/mark-notification-as-read/{notification}', [HomeController::class, 'markAsRead']);

    Route::view('/balance', 'front.balance.index')->name('balance.index');

    // Route::view('/profile/edit', 'front.profile.edit')->name('profile.edit');

    Route::view('/myEvents', 'front.myEvents')->name('myEvents');

    Route::get('cities', [HomeController::class, 'cities']);
    Route::view('admin/tickets', 'admin/tickets/tickets')->name('tickets');
    Route::view('admin/showTickets', 'admin/tickets/showTickets')->name('showTickets');


    //vendor add product from front
    Route::prefix('vendor')->name('vendor.')->group(function () {
        Route::resource('products', ProductController::class);
    });

    //Route::post('/addProduct', [ProductController::class, 'storeProduct'])->name('vendor.storeProduct');
    //End vendor add product from front
    // Route::view('/profile', 'front.profile')->name('profile');
    Route::get('/vendor/profile', [Vendor\ProfileController::class, 'profile'])->name('vendor.profile');
    Route::get('/vendor/profile/edit', [Vendor\ProfileController::class, 'editprofile'])->name('vendor.editprofile');
    Route::patch('/vendor/profile/edit', [Vendor\ProfileController::class, 'update_profile'])->name('vendor.update_profile');

    Route::get('/user/profile', [Client\ProfileController::class, 'profile'])->name('user.profile');
    Route::post('account/delete', [Client\ProfileController::class, 'deleteAccount'])->name('profile.delete.account');
    Route::get('/user/profile/edit', [Client\ProfileController::class, 'editprofile'])->name('user.editprofile');
    Route::patch('/user/profile/edit', [Client\ProfileController::class, 'update_profile'])->name('user.update_profile');
    // Route::resource('user', Client\ProfileController::class);

    Route::post('orders/payment', [PaymentController::class, 'payment'])->name('orders.payment');
    Route::get('/vendor/conversations', [ConversationController::class, 'index'])->name('vendor.conversations');

    Route::get('/ordersVendor', function () {
        if (auth()->user()->type != 'vendor') {
            abort(403);
        }
        return view('front.ordersVendor');
    })->name('ordersVendor');
    Route::get('/ordersUser', function () {
        if (auth()->user()->type != 'user') {
            abort(403);
        }
        return view('front.ordersUser');
    })->name('ordersUser');

});

Route::get('vendors', function () {
    $vendors = User::whereType('vendor')->paginate(10);
    return view('front.vendor.index', compact('vendors'));
})->name('vendors.index');

Route::get('/vendors/{id}', function ($id) {
    $vendor = User::findOrFail($id);
    return view('front.vendor.show', compact('vendor'));
})->name('vendor.show');
Route::get('/vendors/messages/{id}', function ($id) {
    $id = Crypt::decryptString($id);
    $conv = VendorMessage::find($id);
    if (!$conv) {
        abort(404);
    }
    return view('front.vendor.conv', compact('conv'));
})->name('vendor.conv');

Route::post('/vendors/messages/goToMessage', [ProfileController::class, 'goToMessage'])->name('vendor.gotomessage');


Route::get('/products', [ControllersProductController::class, 'index'])->name('products.index');
Route::get('/products/best_seller', [ControllersProductController::class, 'best_seller'])->name('products.best_seller');


Route::get('/products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    return view('front.products.show', compact('product'));
})->name('product.show');

Route::view('/contact', 'front.contact')->name('contact');

Route::view('/shops', 'front.shops')->name('shops');
Route::view('/profileShop', 'front.profileShop')->name('profileShop');
Route::view('/categories', 'front.categories')->name('categories');
Route::view('/basket', 'front.basket')->name('basket')->middleware('auth');
Route::view('/onboard', 'front.onboard')->name('onboard');
Route::view('/coordinatorPage', 'front.coordinatorPage')->name('coordinatorPage');
Route::view('/allSales', 'front.allSales')->name('allSales')->middleware('auth');
Route::view('/productPage', 'front.productPage')->name('productPage')->middleware('auth');
Route::view('/talks', 'front.talks')->name('talks')->middleware('auth');
Route::view('/chat', 'front.chat')->name('chat')->middleware('auth');
Route::view('/orders', 'front.orders')->name('orders')->middleware('auth');
Route::view('/confirmationOrder', 'front.confirmationOrder')->name('confirmationOrder');
Route::view('/editProfile', 'front.editProfile')->name('editProfile')->middleware('auth');
Route::view('/producsVendor', 'front.producsVendor')->name('producsVendor')->middleware('auth');

//Route::view('/tickets', 'front.tickets')->name('tickets');
Route::get('tickets', [TicketController::class, 'index'])->name('tickets')->middleware('auth');
Route::view('/createTickets', 'front.createTickets')->name('createTickets');
//Route::view('/showTickets', 'front.showTickets')->name('showTickets');
Route::get('showTickets/{id}', [TicketController::class, 'show'])->name('showTickets')->middleware('auth');
Route::post('storeComment/{id}', [TicketController::class, 'storeComment'])->name('storeComment');
// Route::view('/addProduct', 'front.addProduct')->name('addProduct');
//Route::view('/faq', 'front.faq')->name('faq');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::post('/create/contact', [ContactUsController::class, 'store'])->name('storeContact');
// Route::view('admin/qa-ans', 'admin.qa-ans')->name('qa-ans');

// Route::get('test', function () {
//     dd($t);
// });

Route::view('/privacy', 'front.privacy')->name('privacy');

// Route::view('/replaysTicket', 'admin.tickets.replaysTicket')->name('replaysTicket');


Route::view('/coordinator-orders', 'admin.coordinator-orders')->name('coordinator-orders');

Route::get('pages/{page}', [HomeController::class, 'show_page'])->name('user.pages.show');

Route::get('/page/{id}', [FrontController::class, 'show'])->name('article');
Route::get('/pages', [FrontController::class, 'index'])->name('pages');

Route::get('/pages/{id}', [FrontController::class, 'show_pages'])->name('showPages');
