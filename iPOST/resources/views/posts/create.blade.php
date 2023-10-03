@extends('layout')
@section('title', 'POSTS')
@section('content')

    @if (Session::has('success'))
        {{ Session::get('success') }}
    @endif

    <div class="container mt-5">
        <h3 class="text-center"><u>Let's create something unique!</u></h3>
        <form action="{{ route('post.store') }}" method="post">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class=" form-control m-2" name="title" value="{{ old('title') }}" id="title"
                    name="title">
                @error('title')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="excerpt"><b>Excerpt</b></label>
                <input type="text" class=" form-control m-2" id="excerpt" name="excerpt" value="{{ old('excerpt') }}"
                    name="excerpt">
                @error('excerpt')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body"><b>Message</b></label>
                <textarea name="body" id="body" class=" form-control m-2" name="body" cols="30" rows="10">{{ old('body') }}</textarea>
                @error('body')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <input type="submit" value="Create Post" class="btn btn-primary p-2">
        </form>
    </div>
@endsection
