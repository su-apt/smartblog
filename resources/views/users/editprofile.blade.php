@extends('layouts.app')

@section('title' , __('Profile'))


@section('content')

@if (session()->has('message'))

<div class="alert alert-warning alert-dismissible fade show" role="alert">
  {{ session()->get('message') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
      <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-2">

           <div class="col">

     <div class="card rounded-5 shadow-lg bg-info text-dark bg-opacity-10">
       <div class="container-fluid py-5">
         <h5 class="pb-4 border-bottom">تحديث الملف الشخصي</h5>
           <form action="{{ route('DataUpdate' , $useredit->username)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                     @csrf
                    <div class="form-group">
                        <label for="name">الاسم</label>
                        <input type="text" name="name" class="form-control"  value="{{ $useredit->name }}">
                    </div>
                    <div class="form-group">
                        <label for="username">اسم المستخدم</label>
                        <input type="text" name="username" class="form-control"  value="{{ $useredit->username }}">
                    </div>
                    <div class="form-group">
                        <label for="email">البريد الالكتروني</label>
                        <input type="email" name="email" class="form-control"  value="{{ $useredit->email }}">
                    </div>

                    <div class="py-3 pb-4 border-bottom">
                        <button type="submit" class="btn btn-primary mr-3">
                            submit
                        </button>
                   </div>

             </form>
         </div>
      </div>
      </div>
 </div>


@endsection
