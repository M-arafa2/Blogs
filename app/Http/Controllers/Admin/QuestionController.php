<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Ticket;
use App\Models\TicketComment;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function list()
    {
        $questions = Question::paginate(10);
        $tickets = Ticket::get();

        return view('admin.questions.index')->with('questions', $questions);
    }


    public function question_save(Request $request)
{
    $validationMessages = [
        'name.required' => 'حقل السؤال مطلوب.',
        'result.required' => 'حقل النتيجة مطلوب.',
    ];

    $request->validate([
        'name' => 'required',
        'result' => 'required',
    ], $validationMessages);

    $question = new Question();
    $question->name = $request->name;
    $question->result = $request->result;
    $question->save();

    if ($question) {
        return redirect()->back()->with('success', trans('added'));
    } else {
        return redirect()->back()->with('error', 'There is an error in your data');
    }
}

    public function question_edit(Request $request , $id)
    {
        $validationMessages = [
            'name.required' => 'حقل السؤال مطلوب.',
            'result.required' => 'حقل النتيجة مطلوب.',
        ];
    
        $request->validate([
            'name' => 'required',
            'result' => 'required',
        ], $validationMessages);
        $question =Question::find($id);

        $question->name =  $request->name;
        $question->result =  $request->result;

        $question->save();

          if($question) {
              return redirect()->back()->with('success', trans('تم التعديل'));
           } else  {
               return redirect()->back()->with('error', 'There is an error in your data');
          }


    }
    public function question_delete($id)
    {
        $question =Question::find($id);

        $question->delete();

        if($question) {
            return redirect()->back()->with('success', trans('تم الحذف بنجاح'));
         } else  {
             return redirect()->back()->with('error', 'There is an error in your data');
        }

    }
}
