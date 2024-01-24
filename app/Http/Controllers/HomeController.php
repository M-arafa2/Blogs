<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Sitepage;
use App\Models\LoginCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    // public function index(Request $request)
    // {
    //     $products = Product::active()
    //         ->when(request()->keyword != null, function ($query) {
    //             $query->where('name', 'like', '%' . \request()->keyword . '%');
    //         })->when($request->department, function ($query) use ($request) {
    //             return $query->where('department_id', $request->department);
    //         })->paginate(10);

    //     $best_sellers = Product::active()
    //         ->when(request()->keyword != null, function ($query) {
    //             $query->where('name', 'like', '%' . \request()->keyword . '%');
    //         })->when($request->department, function ($query) use ($request) {
    //             return $query->where('department_id', $request->department);
    //         })->whereHas('cartProducts')->withCount('cartProducts')
    //         ->orderBy('cart_products_count', 'desc')->take(6)->get();

    //     $vendors = User::where('type', 'vendor')->where('status', 1)->get();
    //     // @forelse(App\Models\Product::where('acceptance', 'accepted')->where('status', 1)->latest()->take(3)->get() as $product)

    //     $sliders = Slider::active()->get();
    //     $pages = Sitepage::all();
    //     // dd( $pages);
    //     // return view('admin.pages.index', compact('pages'));
    //     return view('front.home', compact('products', 'vendors', 'sliders', 'best_sellers','pages'));
    // }

    public function index(Request $request)
{
    $userType = auth()->check() ? auth()->user()->type : null;
    // if (auth()->check()) {
    //     // هنا نحن متأكدين من وجود مستخدم مسجل في الجلسة

    //     if (LoginCode::where('phone',auth()->user()->phone)->where('attempted', 0)->exists()) {
    //         return redirect()->route('loginCode');
    //     }

    // } else {
    //     // إذا لم يكن هناك مستخدم مسجل، يمكنك تنفيذ إجراء آخر
    //     $userType = null; // أو أي قيمة أخرى مناسبة في حالة عدم وجود مستخدم مسجل
    // }

    // احصل على جميع المنتجات المقبولة والنشطة
    $productsQuery = Product::active()->accepted()->latest();

    // إذا كان المستخدم من نوع "vendor"، قم بتحديد البحث للمنتجات التي يمتلكها
    if ($userType === 'vendor') {
        $productsQuery->where('user_id', auth()->user()->id);
    }

    // إذا تم تحديد قسم معين، قم بتصفية النتائج بناءً على القسم المحدد
    if ($request->department) {
        $productsQuery->where('department_id', $request->department);
    }

    // قم بتنفيذ الاستعلام واسترجاع البيانات المطلوبة بصفحة واحدة
    $products = $productsQuery->paginate(10);

    // قم بالباقي من الكود كما هو

    $best_sellers = Product::active()
        ->when(request()->keyword != null, function ($query) {
            $query->where('name', 'like', '%' . \request()->keyword . '%');
        })
        ->when($request->department, function ($query) use ($request) {
            return $query->where('department_id', $request->department);
        })
        ->whereHas('cartProducts')
        ->withCount('cartProducts')
        ->orderBy('cart_products_count', 'desc')
        ->take(6)
        ->get();

    $vendors = User::where('type', 'vendor')->where('status', 1)->get();
    $sliders = Slider::active()->get();
    $pages = Sitepage::all();

    return view('front.home', compact('products', 'vendors', 'sliders', 'best_sellers', 'pages'));
}

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('front.products.show', compact('product'));
    }
    public function cities()
    {
        return City::all();
    }
    public function show_page(Sitepage $page)
    {
        // dd($page);
        return view('front.pages', compact('page'));
    }

    public function markAsRead(Request $request, $notificationId)
    {
        $user = Auth::user();
        $notification = $user->notifications()->find($notificationId);

        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'تم وضع علامة القراءة على الإشعار بنجاح']);
        }

        return response()->json(['message' => 'فشل في تحديث حالة الإشعار']);
    }
}
