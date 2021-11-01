@extends('layouts.app')
    
@section('title' , __('Contact'))
    

@section('content')
    
@include('_partials._closed_alert')

@php
    $today = date('Y-m-d H-i-s')
@endphp
<h3>today is : {{$today}}</h3>
<h3>notic:{{$message}}</h3>

@if (date('D') == 'Tue')
<h5>notic : {!!$information!!}</h5>
@else
<h5>i'm ready to get your message</h5>
@endif

@auth
    <p> hello : {{$user->name}}

  @else 
  <h6>welcome in my blog guest</h6>
@endauth

@guest
    <p> welcome </p>
@endguest
@if($errors->any())

<ul>
  @foreach($errors->all() as $error)

  <li>
    <div class="alert alert-danger">
    <p>{{__("$error")}}</p>
    </div>
  </li>
  @endforeach
</ul>

@endif

<form class="" action="" method="post">

    @csrf
    <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">{{__('Name')}}</label>
      <input name="sender_name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@">
    </div>

{{--   <div class="mb-3">
      <label for="options"></label>
      <select name="options" id="options" class="form-control">
        @foreach ($options as $key => $option)

        <option value="{{$key}}">{{$option}}</option>
            
        @endforeach

      </select>
    </div>--}}

    <div class="mb-3">
      <label for="options"></label>

      <select name="options" id="options" class="form-control">
        @forelse ($options as $key => $option)

        <option value="{{$key}}">{{$option}}</option>
            @empty 
            <option value="null"> no data</option>
        @endforelse

      </select>
    </div>
{{--    <div class="mb-3">
      <label for="options"></label>
      @if(count($options))
      <select name="options" id="options" class="form-control">
        @foreach ($options as $key => $option)

        <option value="{{$key}}">{{$option}}</option>
            
        @endforeach

      </select>
      @endif
    </div> --}}

    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
      <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

    <div class="mb-3">
      <label for="submit"></label>
      <button class="btn btn-primary mb-3" type="submit" name="button">send</button>
    </div>

</form>


@endsection
