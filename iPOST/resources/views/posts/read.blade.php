@extends('layout')
@section('title', 'Read')
@section('content')
    @if (Session::has('success'))
        <p class="text-center" {{ Session::get('success') }} !</p>
    @endif
    <h3 class="text-center mt-3"><u>Your All Posts</u></h3>
    <div class="container mt-5">
        <table class="table table-info table-bordered table-hover bg-dark container">
            <thead>
                <tr class="m-2 text-center">
                    <th>ID</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Message</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @php
                $c = 1;
                @endphp
                
                @foreach ($data as $row)
                    <tr class="m-2 text-center">
                        <td class="text-center">{{ $c }}</td>
                        <td class="text-center">{{ $row->title }}</td>
                        <td class="text-center">{{ $row->excerpt }}</td>
                        <td class="text-center">{{ $row->body }}</td>
                        <td class="text-center"><a href="{{ route('post.edit', ['id' => $row->id]) }}" class="btn btn-primary">EDIT</a></td>
                        <td>
                            <form method="post" action="{{ route('post.delete', ['id' => $row->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE" class="btn btn-danger">
                            </form>
                        </td>
                    </tr>
                    @php
                    $c++;
                    @endphp
                @endforeach           
            </tbody>
        </table>
        <div>
            <p>{{ $data->links() }}</p>
        </div>
        <div>
            Total users : {{ $data->total() }}
            Current Page : {{ $data->currentPage() }}
        </div>
    </div>
@endsection
