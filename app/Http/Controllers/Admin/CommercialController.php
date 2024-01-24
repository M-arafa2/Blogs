<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\JodaResource;
use Illuminate\Http\Request;

class CommercialController extends Controller
{
    use JodaResource;
    protected $rules = [
        'name' => 'required|string',
        'file' => 'required|string',
        'user_id' => 'required|integer',
        'end_at' => 'required|date',
        'status' => 'required|string',
        'refused_msg' => 'nullable|string',
    ];

    public function query($query){
        return $query->paginate(10);
    }
}
