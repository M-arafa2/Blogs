<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\SupportChat;
use App\Models\SupportInput;
use Illuminate\Http\Request;
use App\Models\SupportAnswer;

class SupportChatController extends Controller
{

    // public function list()
    // {
    //     $chats = auth()->user()->supportChats()->latest()->paginate(10);
    //     return view('front.support-list', compact('chats'));
    // }
    public function list()
{
    $vendor = auth()->user()->type === 'vendor' ? auth()->user() : null;

    $chats = auth()->user()->supportChats()->latest()->paginate(10);
    return view('front.support-list', compact('chats', 'vendor'));
}
    public function store(Request $request)
    {
//        $data = $request->validate(['message' => 'nullable', 'department_id' => 'required|exists:departments,id']);

        $chat = SupportChat::create([
            'user_id' =>auth()->id(),
            'department_id' => Department::pluck('id')->random() ,
            'order_date' =>now()->format('Y-m-d')
            ]);

        if (isset($request->questions)) {
            foreach ($request->questions as $key => $value) {
                SupportAnswer::create([
                    'department_id' => Department::pluck('id')->random() ,
                    'support_chat_id' => $chat->id,
                    'question' => SupportInput::find($key)?->label,
                    'answer' => $value,
                ]);
            }
        }

        return redirect()->route('support.chat', encrypt($chat->id))->with('success', 'تم فتح المحادثة وسيتم الرد في اقرب وقت ممكن');
    }

    public function chat($id)
    {
        $chatId = decrypt($id);
        $chat = SupportChat::with('messages')->findOrFail($chatId);
        $chat->messages()->whereNull('readed_at')->update(['readed_at'=>now()]);
        return view('front.support-chat', compact('chat'));
    }
}
