@extends('layouts.app')

@section('content')
<div class="container py-5">
  <h1 class="display-3 text-black mb-3">{{__('Cursuri')}}</h1>
</div>
@if(!count($courses))
<div class="container py-1">
  <h1 class="display-6 text-black mb-3">{{__('Nu există cursuri disponibile la moment')}}</h1>
</div>
@endif
<div class="container-fluid">
  <div class="px-lg-5">
   <div class="row">
      @foreach($courses as $course)
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><img src="/storage/{{ $course->img_src }}" alt="" class="img-fluid card-img-top mw-100 mh-100">
          <div class="p-4">
            <h5> <a href="{{ route('course', ['id' => $course->id]) }}" class="text-dark">{{ $course->title }}</a></h5>
            @if($course->user->id == Auth::user()->id)
            <form method="post" action="{{ route('delete', ['id' => $course->id]) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <button class="btn btn-danger profile-button btn-sm float-top float-end" type="submit">{{__('Șterge')}}</button>
            </form>
            @endif
            <p class="small text-muted mb-0">{{ $course->description }}</p>
            <div class="d-flex align-items-center justify-content-between rounded-pill bg-light px-3 py-2 mt-4">
              <p class="small mb-0"><i class="fa fa-picture-o mr-2"></i><span class="font-weight-bold">by {{ $course->user->name }}</span></p>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection