@extends('front.layouts.front')

@section('content')
<section class="section talks-section ">
  <div class="container-md ">
    <h1>ألاسئلة الشائعة</h1>
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-9">
        <div class="accordion accordion-flush faq" id="accordionFlushExample">
            @if(count($questions) > 0)
            @foreach($questions as $k=>$question)
          <div class="accordion-item">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne{{$k}}" aria-expanded="false">
                {{$question->name}}
              </button>
            </h2>
            <div id="flush-collapseOne{{$k}}" class="accordion-collapse collapse">
              <div class="accordion-body">
                {{$question->result}}
              </div>
            </div>
          </div>
          @endforeach
          @else
        <p>لا يوجد اسئلة شائعه</p>
          @endif

        </div>
      </div>
    </div>
  </div>
</section>
@endsection
