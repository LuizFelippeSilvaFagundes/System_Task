@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Criar Nova Tarefa</h2>

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Criar Tarefa</button>
    </form>
</div>
@endsection
