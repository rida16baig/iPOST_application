@extends('layout')
@section('title', 'POSTS')
@section('content')

    @if (Session::has('success'))
        {{ Session::get('success') }}
    @endif

    <div class="container mt-5">
        <form action="{{ route('post.update', ['id' => $id->id]) }}" method="post">
            @csrf
            @method('put')      
            <div class="form-group">
                <label for="title"><b>Title</b></label>
                <input type="text" class=" form-control m-2" name="title" value="{{ old('title',$id->title) }}" id="title"
                    name="title">
                @error('title')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="excerpt"><b>Excerpt</b></label>
                <input type="text" class=" form-control m-2" id="excerpt" name="excerpt" value="{{ old('excerpt',$id->excerpt) }}"
                    name="excerpt">
                @error('excerpt')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="body"><b>Message</b></label>
                <textarea name="body" id="body" class=" form-control m-2" name="body" cols="30" rows="10">{{ old('body',$id->body) }}</textarea>
                @error('body')
                    <div>
                        <p class="text-danger">{{ $message }}</p>
                    </div>
                @enderror
            </div>
            <input type="submit" value="Update Post" class="btn btn-primary p-2">
        </form>
    </div>
@endsection
