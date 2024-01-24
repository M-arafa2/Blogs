<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\SupportInput;
use App\Traits\JodaResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class DepartmentQuestionController extends Controller
{
    use JodaResource;
    public $model = SupportInput::class;

    public $rules = [
        'label' => 'required',
        'department_id' => 'required',
        'type' => 'required',
        'data' => 'nullable'
    ];
    public $json = [
        'data'
    ];
    public function index()
    {
        $departmentId = Route::current()->parameter('department');
        $dep = Department::find($departmentId);
        $departmentQuestions = $dep?->questions()->paginate(10);
        return view('admin.department-question.index', compact('departmentId', 'dep', 'departmentQuestions'));
    }

    public function destroy(Department $department, SupportInput $question)
    {
        $question->delete();
        return $this->destroyed();
    }

    protected function stored()
    {
        $departmentId = Route::current()->parameter('department');
        return redirect(route("$this->route.index", $departmentId))->with('success', trans('app.added'));

    }



    protected function updated()
    {
        $departmentId = Route::current()->parameter('department');
        return redirect(route("$this->route.index", $departmentId))->with('success', trans('تم التعديل'));

    }



    protected function destroyed()
    {
        $departmentId = Route::current()->parameter('department');
        return redirect(route("$this->route.index", $departmentId))->with('success', trans('تم حذف السؤال بنجاح'));

    }
}
