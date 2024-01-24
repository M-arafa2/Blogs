<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportAnswer extends Model
{
    use HasFactory;
    protected $table = 'support_input';
    protected $guarded = [];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
