@extends('layouts.front')

@section('content')
    <div class="container ">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の新規作成
            </h1>

            <form method="post" action="{{ action('PostsController@store') }}">
                @csrf

                <fieldset class="mb-4 mx-auto">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                      <div class="form-group row">
                          <label for="name">{{ Auth::user()->name }}</label>
                            <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                    　</div>
                    　<div class="form-group row">
                        　<label for="title">タイトル</label>
                              <input name="title" class="form-control" value="{{ old('title') }}" type="text">
                       </div>
                       <div class="form-group row">
                           <label for="body">本文</label>
                               <textarea id="body" name="body" class="form-control" rows="4" >{{ old('body') }}</textarea>
                        </div>
                        <div class="mt-5">
                        <a class="btn btn-secondary" href="{{ route('top') }}">
                            キャンセル
                        </a>

                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection