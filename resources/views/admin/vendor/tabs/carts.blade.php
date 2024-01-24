<div class="tab-pane active show fade" id="nav-carts">
    <div class="table-responsive mt-4">
        <table class="table table-n-border sm table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">الكمية</th>
                    <th scope="col">السعر</th>
                    <th scope="col">الاجمالي</th>
                    <th scope="col">التأمين</th>
                    <th scope="col">الفاتورة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendor->vendorCarts as $product)
                
                    <tr>
                        <td>{{ $product->product?->name }}</td>
                         <td>{{ $product->quantity }}</td>
                        <td> {{ $product->price }}</td>
                        <td> {{ $product->total }}</td>
                        <td> {{ $product->insurance_amount }}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.vendor.showInvoice', $product->id) }}">
                            عرض الفاتورة</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
