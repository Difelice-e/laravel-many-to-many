@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Modifica Post: {{$post->title}}</h1>

    <form action="{{ route('admin.posts.update',$post) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- TITOLO ARTICOLO  --}}
        <div class="form-group">
          <label for="title">Titolo</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title',$post->title)}}" aria-describedby="emailHelp">
          @error('title')
          <div class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        {{-- CONTENUTO ARTICOLO  --}}
        <div class="form-group">
            <label for="content">Contenuto dell'articolo</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="3">{{old('content',$post->content)}}</textarea>
            @error('content')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- DATA PUBBLICAZIONE ARTICOLO  --}}
        <div class="form-group">
            <label for="date">Data di pubblicazione</label>
            <input type="date" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{old('published_at') ?: Str::substr($post->published_at, 0, 10)}}" aria-describedby="emailHelp">
            @error('published_at')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        {{-- CATEGORIA ARTICOLO  --}}
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
              <option value="">-- nessuna ---</option>
              @foreach($categories as $category)
              <option {{old('category_id',optional($post->category)->id) == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
            @error('category_id')
              <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>
    <form action="{{route('admin.posts.destroy',$post)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Are you sure?')">Elimina</button>
    </form>
</div>

@endsection