<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    // protected $fillable=['name','parent'];
    // public function scopeParents($q){
    //     return $q->whereNull('parent');
    // }
    // public function kids(){
    //     return $this->hasMany(Department::class,'parent');
    // }
    // public function main(){
    //     return $this->belongsTo(Department::class,'parent');
    // }

    protected $guarded = [];

    // public function status()
    // {
    //     return $this->status ? 'مفعل' : 'غير مفعل';
    // }
    public function created_at()
    {
        return $this->created_at->format('Y-m-d');
    }

    public function parent()
    {
        return $this->hasOne(Department::class, 'id', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function questions()
    {
        return $this->hasMany(SupportInput::class, 'department_id', 'id');
    }

    public function chat()
    {
        return $this->hasMany(SupportChat::class);
    }
}
