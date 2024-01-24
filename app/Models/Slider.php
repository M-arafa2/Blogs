<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function status(): string
    {
        return $this->status ? 'مفعل' : 'غير مفعل';
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}
