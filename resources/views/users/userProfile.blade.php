@extends('layouts.app')

@section('title' , __('Profile user'))


@section('content')
<div class="row row-cols-1 row-cols-lg-2">

<div class="col">
     <div class="card rounded-5 shadow-lg bg-info text-dark bg-opacity-10">
       <div class="container-fluid py-2">
           @auth

           <div class="dropdown float-end">
  <button class="btn btn-secondary btn-circle rounded-circle bg-opacity-10" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
   <i class="fas fa-ellipsis-h fa-lg"></i>
  </button>
  <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
      @if (Auth::user()->username == $username)
              <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#UpdateAvatar">تغيير الصورة الرمزية</a></li>
              <li><a class="dropdown-item" href="{{ route('AccountUpdate' , $userdetales->username) }}" >تعديل البيانات الشخصيه</a></li>
      @endif

    <li><a class="dropdown-item" href="#">Something else here</a></li>
    <li><hr class="dropdown-divider"></li>
    <li><a class="dropdown-item" href="#">Separated link</a></li>
  </ul>
</div>
@endauth

        <div class="card-header">
            <h5 class="pb-4"> الملف الشخصي</h5>
        </div>
        <div class="card-body">
          <img src="{{url('images',$userdetales->avatar_path) }}"
           alt="Bootstrap" width="60" height="60" class="rounded border border-white">

           @if(Auth::check() && in_array(Auth::user()->id ,$getFollowing ))
               <span class="badge bg-secondary float-end">يتابعك</span>
          @endif


          <div class="d-flex flex-column h-20 py-3">
              <h5 class="float-end">{{$userdetales->name }} </h5>
            <h5 class="float-end"> {{"@"}}{{$userdetales->username }}</h5>
          @if (Auth::check() && Auth::user()->username != $username)

             @if(in_array(Auth::user()->id , $getFollowers ))
                <div class="gap-1 justify-content-md-end">
                    <form action="{{ route('FollowUnfollow' , $username) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="follow" value="unfollow" />
                    <button type="submit"
                    class="btn btn-success btn-sm me-md-2">Unfollow</button>
                    </form>
                </div>
                @else
                <div class="gap-1 justify-content-md-end">
                    <form action="{{ route('FollowUnfollow' , $username) }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="follow" value="follow" />
                    <button type="submit"
                    class="btn btn-primary btn-sm me-md-2">Follow</button>
                    </form>
                </div>
                @endif
          @endif
          </div>

          <div class="card-footer" >
              <div class="d-flex align-items-center">
            <h6 class="text-shadow-1 ps-4">Posts<p class="text-center">
                {{ $userdetales->articles()->get()->count() }}</p></h6>
            <h6 class="text-shadow-1  ps-4">Followers<p class="text-center">
                {{ $userdetales->followers()->get()->count() }}</p></h6>
            <h6 class="text-shadow-1  ps-4">Following<p class="text-center">
                {{ $userdetales->following()->get()->count() }}</p></h6>
              </div>
          </div>
          </div>
         </div>
      </div>
      </div>
 </div>
        @auth
 <div class="modal fade" id="UpdateAvatar" tabindex="-1" aria-labelledby="UpdateAvatar" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content rounded-6 shadow">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title">Update avatar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body py-0">
        <form action="{{ route('AvatarUpdate' , $userdetales->username)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <img id="blah" alt="your image"
            src="{{ url('images' , $userdetales->avatar_path) }}"
            width="60" height="60"
            class="rounded border border-white" />
            <input type="file" name="image" id="selectedFile"
             onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"
              style="display: none;" />
            <input type="button" value="Browse..."
            onclick="document.getElementById('selectedFile').click();" />
        <button  type="submit" class="btn btn-lg btn-primary w-100 mx-0 mb-2">Save changes</button>

        </form>
      </div>

    </div>
  </div>
 </div>
  @endauth
<div class="row">

    <div class="col">

        @include('articles._articles_section')

</div>

@endsection
