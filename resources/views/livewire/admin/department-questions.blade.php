<section class="">
    <nav aria-label="breadcrumb ">
        <ol class="breadcrumb bg-light p-3">
            <li class="breadcrumb-item"><a href="#">الواجهة</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.departments.index') }}">الاقسام</a></li>
            <li class="breadcrumb-item" aria-current="page">
                {{ $dep?->name }}
            </li>
            <li href="" class="breadcrumb-item" aria-current="page">
                أضف سؤال
            </li>
        </ol>
    </nav>
    <div class="section_content content_view">
        {{-- <form action="{{ route('admin.department-questions.store',$departmentId) }}" method="POST" class="row g-3"> --}}
        <div class="row g-3">
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">سؤالك</label>
                <input type="text" wire:model.defer='label' id="" class="form-control">
                @error('label')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col-12 col-md-4 col-lg-3">
                <label for="">نوع الاجابة</label>
                <select wire:model='type' class="form-control" id="">
                    <option value="">اختر النوع</option>
                    <option value="text">كتابة</option>
                    <option value="select">اختيارات</option>
                </select>
                @error('type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if($type == 'select')
            <div class="col-12 col-md-12 col-lg-3">
                @if($data)
                @foreach($data as $key => $input)
                <div class="form-group d-flex mt-2">
                    <input type="text" wire:model.defer='data.{{ $key }}' class="form-control" id="">
                    <button type="button" wire:click='delete({{ $key }})' class="btn btn-danger">X</button>
                </div>
                @endforeach
                @endif
                <button class="btn btn-info btn-sm mt-3" type="button" wire:click='addNewData'>
                    اضافة اختيار جديد
                </button>
            </div>
            @endif

            <div class="col-12 col-md-12">
                <button wire:click="submit" type="button" class="btn btn-sm btn-primary px-4">حفظ</button>
            </div>
        </div>

    </div>
    <div class="section_content content_view">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>السؤال</th>
                        <th class="text-nowrap">تاريخ الانشاء</th>
                        <th>نوع السؤال</th>
                        <th>الاجابات</th>
                        <th>العمليات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departmentQuestions as $question)

                    <tr>
                        <th>{{ $loop->iteration }}</th>

                        <td>{{ $question->label }}</td>


                        <td class="text-nowrap">{{ $question->created_at->format('Y-m-d')}}</td>
                        <td>{{ $question->type == 'text' ? 'كتابي' : 'اختيارات' }}</td>
                        <td>
                            @forelse($question->data as $line)
                            <span class="badge bg-primary"> {{ $line }}</span>
                            @empty
                            --
                            @endforelse
                        </td>
                        <td class="d-flex gap-1">
                            {{-- <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{ $question->id }}">
                            <i class="fa-solid fa-pen"></i>
                            </button> --}}
                            <button type="button" class="btn btn-info btn-sm" wire:click='edit({{ $question }})'> <i class="fa-solid fa-pen"></i></button>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete{{ $question->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                            {{-- @include('admin.department-question.edit-modal',['department'=>$question]) --}}
                            @include('admin.department-question.delete-modal',['department'=>$question])
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $departmentQuestions->links() }}
        </div>
    </div>
</section>
