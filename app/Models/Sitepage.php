<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sitepage extends Model
{
    use HasFactory;
    protected $guarded = [];
    const ACTIVE = 1, NOT_ACTIVE = 0;
    public function status(): string
    {
        return $this->status ? 'مفعل' : 'غير مفعل';
    }
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }
}
