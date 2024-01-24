<?php

namespace App\Http\Controllers\Admin;

use App\Traits\JodaResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    use JodaResource;

    public function query($query)
    {
        return $query->where(function ($q) {
            $vendorId = request()->has('vendor') ? (int) request()->get('vendor') : null;
            $status = request()->has('status') ? request()->get('status') : null;
            $insurance = request()->has('insurance') ? request()->get('insurance') : null;
            if ($vendorId) {
                $q->where('user_id', $vendorId);
            }
            if ($status) {
                $q->where('status', $status);
            }
            if ($insurance) {
                $q->where('insurance_amount', '>', 0);
            }
        })->paginate(10);
    }
}
