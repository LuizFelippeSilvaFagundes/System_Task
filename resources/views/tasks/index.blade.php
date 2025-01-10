@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Minhas Tarefas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Criar Nova Tarefa</a>

    <div class="mt-4">
        @foreach($tasks as $task)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->title }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Editar</a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
