<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
class CountryController extends Controller
{
    use JodaResource;
    public $rules=[
        'name'=>'required'
    ];
    public function query($query)
    {
        return $query->latest()->paginate(10);
    }
}
