@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="m-4">I tuoi progetti</h2>
        <div class="add-project d-flex justify-content-end">
            <a href="{{ route('admin.projects.create') }}">Aggiungi progetto</a>
        </div>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Titolo</th>
                            <th scope="col">Data di creazione</th>
                            <th scope="col">Immagini</th>
                            <th scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projects as $project)
                            <tr>
                                <th scope="row">{{ $project->title }}</th>
                                <td>{{ $project->created_at }}</td>
                                <td>
                                    @if ($project->image)
                                        <img src="{{ asset('storage/' . $project->image) }}" alt=""
                                            class="index-img">
                                    @else
                                        Image not available
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-success" href="{{ route('admin.projects.show', $project->slug) }}">
                                        Details
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project->slug) }}">
                                        Edit</a>
                                    <form action="{{ route('admin.projects.destroy', $project->slug) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"
                                            href="{{ route('admin.projects.index') }}">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
