<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Form;
use App\Models\FormDownload;
use App\Models\FormView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{

    public function index()
    {
        $forms = Form::withCount(['views', 'downloads'])->paginate(12);

        $customPagination = $forms->render('front.custom_pagination');

        return view('front.forms.index', compact('forms', 'customPagination'));
    }

    public function show(Form $form)
    {
        $related_forms = Form::where('department_id', $form->department_id)->where('id', '!=', $form->id)->take(8)->get();
        if ($form->showForm()) {
            return view('front.forms.show', compact('form', 'related_forms'));
        }
        FormView::createViewLog($form);
        return view('front.forms.show', compact('form', 'related_forms'));
    }

    public function download(Form $form)
    {

        $path = asset($form->file);

        if ($form->downloadForm()) {
            return response()->json('success');
        }
        FormDownload::createDownloadLog($form);
        return response()->json('success');
    }
}
