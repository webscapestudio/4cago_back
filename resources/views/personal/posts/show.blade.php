@extends('personal.main.index')
@section('content')
    <div>
        <h1>{{ $post->title }}</h1>
        <a href="{{ route('personal.post.edit', $post->id) }}" class="text-success">Изменить</a>

        <form action="{{ route('personal.post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="border-0 bg-trnsparent">Удалить</button>
        </form>

        <a href="{{ route('personal.post.create') }}">Добавить</a>

        {{ $post->id }}
        {{ $post->title }}
    </div>
@endsection
