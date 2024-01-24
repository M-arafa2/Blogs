<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Traits\JodaResource;
class CityController extends Controller
{
    use JodaResource;
    public $rules=[
        'country_id'=>'required',
        'name'=>'required'
    ];
    public function query($query)
    {
        return $query->with('country')->latest()->paginate(10);
    }
}
