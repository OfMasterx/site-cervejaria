@extends('base')

@section('titulo', 'Home')
@section('conteudo')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Bem-vindo à Cervejaria</h2>
    <div class="cards-grid">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Produtos</h5>
                <p class="card-text">Gerencie o catálogo de cervejas</p>
                <a href="{{ route('products.index')}}" class="btn btn-primary">Ver Produtos</a>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Eventos</h5>
                <p class="card-text">Administre eventos da cervejaria</p>
                <a href="{{ route('events.index')}}" class="btn btn-primary">Ver Eventos</a>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Gerencie base de clientes</p>
                <a href="{{ route('clients.index')}}" class="btn btn-primary">Ver Clientes</a>
            </div>
        </div>
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Estilos</h5>
                <p class="card-text">Categorias de cervejas</p>
                <a href="{{ route('styles.index')}}" class="btn btn-primary">Ver Estilos</a>
            </div>
        </div>
    </div>
</div>
@endsection
