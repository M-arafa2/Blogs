<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\JodaResource;
use Illuminate\Http\Request;

class OrderTermController extends Controller
{
    use JodaResource;
    
    public $rules = [
        'title' => 'required',
        'sort' => 'required|integer',
    ];

    public function query($query)
    {
        return $query->orderBy('sort')->paginate(10);
    }
}
