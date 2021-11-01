@extends('layouts.app')

@section('title' , __('Create article'))

@section('content')


           <div class="container">
     <div class="p-3 mb-4 bg-info text-dark bg-opacity-10 rounded-3">
       <div class="container-fluid py-5">
         <h5 class="pb-4 border-bottom">{{ __('Create article') }} :</h5>
           <form action="{{ route('articles.store')}}" method="POST" enctype="multipart/form-data">
                    @include('articles._form' , ['submitText' => __('Save')])
             </form>
         </div>
      </div>
      <div class="bg-info p-2 text-dark bg-opacity-25 rounded-3">
          <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4">
           <div class="col">
            <i class="fas fa-braille" style="font-size: 23px;"></i>
                <small> </small>
                <small></small>
              </div>

          </div>
      </div>
    </div>
@endsection
