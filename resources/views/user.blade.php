@extends('layouts.app')

@section('content')
@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
@endif
<div class="container rounded bg-white mt-5 mb-5">
<form method="post" action="{{ route('edit') }}" id="edit" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-3">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" height="150px" src="/storage/{{ $user->img_src }}"><span class="font-weight-bold">{{ $user->name }}</span>
                <div class="mt-5">
                    <label for="formFile" class="form-label">{{__('Schimbă poza')}}</label>
                    <input class="form-control" type="file" id="formFile" name="file" style="">
                </div>
            </div>
        </div>
        <div class="col-md-5 border-end">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">{{__('Profil')}}</h4>
                </div>
                <div class="row mt-3">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="col-md-12"><label class="labels">{{__('Nume')}}</label>
                        <input type="text" name="name" class="form-control" placeholder="" value="{{ $user->name }}"></div>
                        <div class="col-md-12"><label class="labels">{{__('Email')}}</label>
                        <input type="text" name="email" class="form-control" placeholder="" value="{{ $user->email }}"></div>
                        <div class="col-md-12"><label class="labels">{{__('Număr de telefon')}}</label>
                        <input type="text" name="phone" class="form-control" placeholder="" value="{{ $user->phone }}"></div>
                        <div class="col-md-12"><label class="labels">{{__('Adresa')}}</label>
                        <input type="text" name="adress" class="form-control" placeholder="" value="{{ $user->adress }}"></div>
                </div>
                <div class="mt-5 text-center"><button class="btn btn-primary profile-button" form="edit" type="submit">{{__('Salvează')}}</button></div>
            </div>
        </div>
</form>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience">
                    <h4 class="text-right">{{__('Adaugă curs')}}</h4>
                </div><br>
                <form method="post" action="{{ route('add') }}" id="add" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="col-md-12">
                        <label class="labels">{{__('Titlu')}}</label>
                        <input type="text" class="form-control" name="title">
                    </div> <br>
                    <div class="mb-3">
                        <label for="description" class="form-label">{{__('Descriere')}}</label>
                        <textarea class="form-control" name="description" id="description" rows="5"></textarea>
                    </div>
                    <div class="mt-5">
                        <label for="course_img" class="">{{__('Alege poza')}}</label>
                        <input class="form-control" type="file" id="course_img" name="course_img" style="">
                        <label for="course_doc" class="">{{__('Alege fișier-ul')}}</label>
                        <input class="form-control" type="file" id="course_doc" name="course_doc" style="">
                    </div>
                    <div class="mt-5">
                        
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" form="add" type="submit">{{__('Adaugă curs')}}</button></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
