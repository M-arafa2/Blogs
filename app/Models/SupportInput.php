<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportInput extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'data' => 'array'
    ];
    protected $table = 'support_inputs';

    public function department()
    {
        return $this->belongsTo(Department::class);
    }



}
