<section class="section box-section coordinator-section py-4">
    <div class="container-md mt-4">
        @if(auth()->user()->type == 'vendor')
        <h6 class="lg-title mb-0 fw-600 mb-5">المعاملات المالية</h6>

        <div class="bg-grey py-3 mb-4">
            <div class="row text-center row-gap-24">
                <div class="col-12 col-md-4">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="كامل الرصيد الموجود في حسابك الآن، يتضمن الأرباح والرصيد المعلّق أيضاً." data-bs-custom-class="wallet-tooltip">
                        <p class="title mb-0">الرصيد الكلي</p>
                        <h5 class="content mb-0">
                            <span>${{ number_format($totals['total'],2) }}</span>
                        </h5>
                    </div>
                </div>

                <div class="col-12 col-md-4">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="يتضمن ميزانية مشاريعك قيد التنفيذ و أي مبلغ  طلبت سحبه ولا زال قيد التحويل، بالإضافة لأرباحك في 14 يوما الأخيرة." data-bs-custom-class="wallet-tooltip">
                        <p class="title mb-0">الرصيد المعلق</p>
                        <h5 class="content mb-0">
                            <span>${{ number_format($totals['pending'],2) }}</span>
                        </h5>
                    </div>
                </div>

                {{-- <div class="col-12 col-md-6">
                    <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="الرصيد الذي يمكنك استخدامه لفتح مشاريع جديدة في فرح." data-bs-custom-class="wallet-tooltip">
                        <p class="title mb-0">الرصيد المتاح</p>
                        <h5 class="content mb-0">
                            <span>${{ number_format(\App\Models\Balance::where('user_id', auth()->user()->id)->where('status', 'available')->sum('amount'),2) }}</span>
                </h5>
            </div>
        </div> --}}

        <div class="col-12 col-md-4">
            <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title=" المبلغ المتبقي من الأرباح التي حققتها في فرح ويمكنك سحبها الآن." data-bs-custom-class="wallet-tooltip">
                <p class="title mb-0">الرصيد القابل للسحب</p>
                <h5 class="content mb-0">
                    <span>${{ number_format($totals['compeleted'],2) }}</span>
                </h5>
            </div>
        </div>
    </div>
    </div>
    @endif
    <div class="d-flex align-items-center justify-content-between">
        <h6 class="lg-title mb-0 fw-600">المعاملات المالية</h6>
        <div class="row g-3">
            <div class="col-12">
                <div class="inputs-holder">
                    <div class="row">
                        <div class="col-6">
                            <div class="from">
                                <span class="value">من</span>
                                <input type="date" id="" wire:model='start_date' class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="to">
                                <span class="value">الي</span>
                                <input type="date" id="" wire:model='end_date' class="form-control">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- Financial Transactions Modal -->
    </div>
    <div class="bg-grey py-3 mt-4">

        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>رقم الطلب</th>
                        <th>سعر الطلب</th>

                        @if(auth()->user()->type =='vendor')
                        <th>نسبة المنصة</th>
                        @else
                        <th>الضريبة</th>
                        <th>التأمين</th>
                        @endif
                        <th>التوصيل</th>
                        <th>الاجمالي</th>
                        <th>الحالة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($carts as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->total }}</td>
                        @if(auth()->user()->type =='vendor')
                        <td>{{ $item->products->sum('pivot.commission') }}</td>
                        @else
                        <td>{{ $item->tax }}</td>
                        <td>{{ $item->products->sum('pivot.insurance_amount') }}</td>
                        @endif
                        <td>{{ $item->delivery_fee }}</td>
                        <td>{{ auth()->user()->type =='vendor' ? $item->total - $item->products->sum('pivot.commission') : $item->total + $item->tax  }}</td>

                        <td><span class="badge bg-{{ App\Models\Cart::CLASSES[$item->status] }}">{{ App\Models\Cart::STATUS[$item->status] }}</span></td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <p class="text-center mb-0">لا يوجد أي معاملات مالية.</p>
                        </td>
                    </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
    </div>
</section>
