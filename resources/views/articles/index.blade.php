@extends('layouts.induk')

@section('content')
<h1>Senarai Artikel</h1>

<x-alert :type="$type" :message="$message" />

<a href="{{ route('articles.create') }}" class="btn btn-primary mt-2">Tambah Artikel</a>

<hr>

<table class="table table-bordered">
    <colgroup>
        <col class="col-1">
        <col class="col-1">
        <col class="col-1">
        <col class="col-5">
        <col class="col-2">
        <col class="col-2">
    </colgroup>
    <thead>
        <tr align="center">
            <th>NO</th>
            <th>ARTICLE ID</th>
            <th>USER ID</th>
            <th>TITLE</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($senaraiArticles as $article)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $article->id }}</td>
            <td>{{ $article->user_id }}</td>
            <td>{{ $article->tajuk }}</td>
            <td>{{ $article->status }}</td>
            <td>
                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">
                    View
                </a>

                @can('update', $article)
                <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-info">
                    Edit
                </a>
                @endcan

                @can('delete', $article)
                <form method="POST" action="{{ route('articles.destroy', $article->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
                @endcan
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="4">
                <div class="alert alert-info">
                    Tiada rekod
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $senaraiArticles->links() }}
@endsection
