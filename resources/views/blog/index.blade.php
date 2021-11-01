@extends('layouts.app')


@section('title' , 'Home Page')


@section('content')

                <div class="container px-4 py-5" id="">
                    <h2 class="pb-2 border-bottom">{{ __('Home page') }}</h2>

                    <div class="row row-cols-1 row-cols-lg-1 align-items-stretch g-4 py-5">

                 @forelse ($articles as $article )
                    <div class="col d-flex justify-content-center">
                        <div class="card card-cover h-20 overflow-hidden text-white bg-dark rounded-5 shadow-lg mw-50"
                        style="background-image: url('{{ url('images/' ,$article->image_path) }}');">
                        <div class="card-header">
                        <small class="float-end">{{$article->user->username }}@</small>
                        <img src="{{ url('images/' ,$article->user->avatar_path) }}"
                        alt="Bootstrap" width="32" height="32" class="rounded-circle border border-white">
                        <div class="card-body">
                        <div class=" flex-column h-20 p-5 pb-3 text-white text-shadow-1">
                            <h2 class=" min-vw-50 pt-1 mt-1 mb-1 display-8 lh-1 fw-bold">{{ $article->title }}</h2>
                        </div>
                        </div>
                        <div class="card-footer" >
                                <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ substr($article->updated_at , 0 , 10) }}</small>
                                <a href="{{ route('articles.show', $article->slug)}}"
                                    class="btn btn-primary btn-sm" >{{ __('Keep reading') }}</a>
                                </div>

                        </div>
                        </div>
                        </div>
                    </div>
                    @empty
                    <p>you don't have any articles yet</p>
                    @endforelse
                    </div>
                </div>
@endsection
