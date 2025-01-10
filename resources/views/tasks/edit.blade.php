@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Tarefa</h1>

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

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $task->description) }}</textarea>
        </div>

        <p><small class="text-muted">Criado em: {{ $task->created_at->format('d/m/Y H:i') }}</small></p> <!-- Data de criação -->
        <p><small class="text-muted">Atualizado em: {{ $task->updated_at->format('d/m/Y H:i') }}</small></p> <!-- Data de atualização -->

        <button type="submit" class="btn btn-success">Atualizar Tarefa</button>
    </form>
</div>
@endsection
