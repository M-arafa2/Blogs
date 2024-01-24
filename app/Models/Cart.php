<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const STATUS = [
        'pending' => 'جديد',
        'processing' => 'جاري المعالجة',
        'compeleted' => 'منتهي',
        'declined' => 'ملغي'
    ];
    public const CLASSES = [
        'pending' => 'warning',
        'processing' => 'primary',
        'compeleted' => 'success',
        'declined' => 'danger'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cartProducts()
    {
        return $this->hasMany(CartProduct::class, 'cart_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart_products', 'cart_id', 'product_id')
            ->withPivot('quantity', 'price', 'total', 'insurance_amount', 'commission','delivery_date1','delivery_date2')
            ->withTimestamps();
    }
}
