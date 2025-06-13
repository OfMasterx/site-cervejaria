@extends('base')

@section('titulo', 'Lista de Eventos')
@section('conteudo')
<div class="container">
    <h1 class="mt-4">Lista de Eventos</h1>

    <div class="mb-4">
        <form action="{{ route('events.search') }}" method="get" class="d-flex align-items-center gap-2">
            <select name="column" id="column" class="form-select" style="width: 200px;">
                <option value="name">Nome</option>
                <option value="location">Localização</option>
            </select>

            <div class="input-group">
                <input type="text" name="value" id="value" class="form-control" placeholder="Buscar">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

            <a href="{{ route('events.create') }}" class="btn btn-success">Novo</a>
        </form>
    </div>

    <div class="cards-grid">
        @foreach($events as $event)
            <x-event-card :event="$event" />
        @endforeach
    </div>

    @if($events->isEmpty())
        <div class="text-center py-5">
            <p>Nenhum evento encontrado.</p>
            <a href="{{ route('events.create') }}" class="btn btn-primary">Criar primeiro evento</a>
        </div>
    @endif
</div>
@endsection
