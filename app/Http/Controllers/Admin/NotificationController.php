<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use App\Notifications\UserNotification;
use App\Traits\JodaResource;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = DatabaseNotification::where('notifiable_type', 'App\Models\User')->where('type', '!=', 'App\Notifications\MessageNotification')->paginate(10);
        return view('admin.notification.index', compact('notifications'));
    }
    public function create()
    {
        return view('admin.notification.create');
    }

    public function store(Request $request)
    {
        if ($request->user_id) {
            $users = User::where('status', 1)->where('type', 'user')->get();
        } elseif ($request->vendor_id) {
            $users = User::where('status', 1)->where('type', 'vendor')->get();

            // dd($users);
        } else {
            // $users = User::where('is_active', 1)->get()->except(Auth::id());
            $users = User::where('status', 1)->get();
        }

        foreach ($users as $user) {
            $user->message = $request->notification;
            // add this to send a notification
            $user->notify(new UserNotification($user));
        }

        return redirect()->route('admin.notifications.index')->withSuccess('تم ارسال الاشعارات بنجاح');
    }
    public function deleteAll(Request $request)
    {
        $ids = $request->ids;

        if ($ids != null) {
            DatabaseNotification::whereIn('id', $ids)->delete();

            return redirect()->back()->withSuccess('تم حذف الاشعارات بنجاح');
        } else {
            return redirect()->back()->with('error', 'يجب تحديد صفوف أولاً');
        }
    }

    public function createNotificationUser()
    {
        $users = User::where('type', 'user')->get();
        return view('admin.notification.createnotificationuser', compact('users'));
    }
    public function createNotificationVendor()
    {
        $vendors = User::where('type', 'vendor')->get();
       
        return view('admin.notification.createnotificationvendor', compact('vendors'));
    }
}
