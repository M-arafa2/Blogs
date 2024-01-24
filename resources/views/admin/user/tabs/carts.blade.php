<div class="tab-pane active show fade" id="nav-carts">
    <div class="table-responsive mt-4">
        <table class="table table-n-border sm table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">المبلغ</th>
                    <th scope="col">الضريبة</th>
                    <th scope="col">الاجمالي</th>
                    <th scope="col">عرض الفاتورة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user->carts as $cart)
                    <tr>
                        <td>{{ $cart->amount }}</td>
                        <td>{{ $cart->tax }}</td>
                        <td>{{ $cart->total }}</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="{{ route('admin.user.showInvoice', $cart->id) }}">
                            عرض الفاتورة</a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
