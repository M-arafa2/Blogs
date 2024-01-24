<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $casts = [
        'created_at' => 'datetime',
    ];
    protected $guarded = [];
   
    public function getCreatedAtAttribute($value)
{
    // return Carbon::parse($value)->format('g:i A');
    return Carbon::parse($value)->format('Y-m-d g:i A');

}
}
