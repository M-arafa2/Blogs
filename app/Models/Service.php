<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function Status()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';
    }
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }
}
