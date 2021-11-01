@extends('layouts.app')

@section('title' , $article->title)


@section('content')

    <div class="container col-xxl-8 px-4 py-5">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <div class="col-10 col-sm-8 col-lg-6">
        <img src="{{url('images/',$article->image_path) }}" class="d-block mx-lg-auto img-fluid rounded-5 shadow-lg" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-6">
        <h1 class="display-5 fw-bold lh-1 mb-3">{{ $article->title }}</h1>
        <p class="lead">{{ $article->content }}</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
              <div class="col">
                <img src="{{url('images' , $article->user->avatar_path) }}" alt="Bootstrap"
                width="32" height="32" class="rounded-circle border border-white">
                <small>{{ __('Author') }} :  </small>
                <small> {{ $article->user->name }}</small>
              </div>
           <div class="col">
           <i class="far fa-calendar-alt"></i>
                <small>{{ __('Creadet date') }}  :  </small>
                <small>{{ substr($article->updated_at , 0 , 10) }}</small>
              </div>

          </div>
        </div>
      </div>

    </div>
          <div class="bg-info p-2 text-dark bg-opacity-25 rounded-3">
              @if (Auth::check())
            <form action="{{ route('comment' , $article->id) }}" method="POST" class="row g-3">
                @csrf
            <div class="col-auto">
                <label for="comment" class="visually-hidden">{{ __('Comment') }}</label>
                <textarea name="content" type="text" class="form-control" id="comment" placeholder="your comment"></textarea>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">{{ __('Send') }}</button>
            </div>
            </form>
      </div>
          @else
          <div class="bg-info pt-2 text-dark bg-opacity-25 rounded-3">
            <div class="row g-3">
            <div class="col-auto">
            <small class="d-block text-end mt-3">
            <a href="{{ route('login') }}">{{ __('Login to comment') }}</a>
            </small>

            </div>
      </div>
  </div>
         @endif
<div class="my-3 p-3 bg-info bg-opacity-25 rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">{{ __('Comments') }}</h6>
    @forelse ($article->comments as $comment )
        <div class="d-flex text-muted pt-3">
      <img class="bd-placeholder-img flex-shrink-0 me-2 rounded"
       width="32" height="32"
       src="{{ url('images' , $comment->user->avatar_path) }}"
       role="img"
       focusable="false">
       <title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect>
      </img>

      <p class="pb-3 mb-0 small lh-sm border-bottom">
        <strong class="d-block text-gray-dark">{{'@' }}{{$comment->user->username}}</strong>
        {{ $comment->content }}
      </p>
    </div>
    @empty
    <p> {{ __('This article has no comments yet') }}</p>
    @endforelse


  </div>
@endsection
