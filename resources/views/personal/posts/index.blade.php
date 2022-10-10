  @extends('personal.main.index')
  @section('content')
      <div>
          <a href="{{ route('personal.post.create') }}">Добавить</a>


          @foreach ($posts as $post)
              {{ $post->id }}
              {{ $post->title }}
              < <a href="{{ route('personal.post.show', $post->id) }}">Посмотреть</a>
                  <a href="{{ route('personal.post.edit', $post->id) }}">Изменить</a>

                  <form action="{{ route('personal.post.destroy', $post->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit">Удалить</button>
                  </form>
          @endforeach
      </div>
  @endsection
