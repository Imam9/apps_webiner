@extends('layouts.main')

@section('content')
<div class="container my-5">
    @if (Auth::user())
    <h1 class="text-center">Selamat Datang, {{ Auth::user()->name }}</h1>
    @else
    <h1 class="text-center">Login Dulu</h1>
    @endif

    <div class="container my-5">
        <div class="row">
            <div class="col">
                <h2>Post</h2>
            </div>
            <div class="col-auto">
                <a href="{{ route('post.create') }}" class="btn btn-primary">Buat Post</a>
            </div>
        </div>
        
        <div class="row my-5">

            @forelse ($post as $item)
            
            <div class="col-12 col-md-4 col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">{{ $item->post_name }}</h4>
                        <p>{{ $item->description }}</p>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="{{ route('post.edit', $item->id) }}" class="btn btn-warning me-2">Edit</a>

                    <form action="{{ route('post.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>

            @empty
            
            <h4>Tidak Ada Post</h4>

            @endforelse
        </div>
    </div>
    
</div>
@endsection
