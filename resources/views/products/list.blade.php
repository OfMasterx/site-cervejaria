@extends('base')

@section('titulo', 'Lista de Produtos')
@section('conteudo')
<div class="container">
    <h1 class="mt-4">Lista de Produtos</h1>

    <div class="mb-4">
        <form action="{{ route('products.search') }}" method="get" class="d-flex align-items-center gap-2">
            <select name="column" id="column" class="form-select" style="width: 200px;">
                <option value="name">Nome</option>
                <option value="description">Descrição</option>
            </select>

            <div class="input-group">
                <input type="text" name="value" id="value" class="form-control" placeholder="Buscar">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>

            <a href="{{ route('products.create') }}" class="btn btn-success">Novo</a>
        </form>
    </div>

    <div class="cards-grid">
        @foreach($products as $product)
            <x-product-card :product="$product" />
        @endforeach
    </div>

    @if($products->isEmpty())
        <div class="text-center py-5">
            <p>Nenhum produto encontrado.</p>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Criar primeiro produto</a>
        </div>
    @endif
</div>
@endsection
