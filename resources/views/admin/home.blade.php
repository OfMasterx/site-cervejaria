@extends('base')

@section('titulo', 'Admin - Home')
@section('conteudo')

<section class="hero-banner">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Bem-vindo ao Painel Administrativo</h1>
                <p class="lead mb-4">Gerencie seus produtos, eventos e toda a operação da cervejaria em um só lugar.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-lg">Adicionar Produto</a>
                    <a href="{{ route('events.create') }}" class="btn btn-outline-primary btn-lg">Criar Evento</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-image text-center">
                    <div class="placeholder-hero">
                        <i class="bi bi-cup-straw" style="font-size: 200px; color: #6c757d;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="events-section py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Eventos Recentes</h2>
            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">Ver Todos</a>
        </div>
        
        @if($events->isEmpty())
            <div class="text-center py-5 bg-light rounded">
                <p class="mb-3">Nenhum evento cadastrado ainda.</p>
                <a href="{{ route('events.create') }}" class="btn btn-primary">Criar Primeiro Evento</a>
            </div>
        @else
            <div class="events-grid">
                @foreach($events as $event)
                    <div class="event-card">
                        @if($event->image)
                            <img src="{{ asset('storage/' . $event->image) }}" class="event-image" alt="{{ $event->name }}">
                        @else
                            <div class="event-image-placeholder">
                                <i class="bi bi-calendar-event"></i>
                            </div>
                        @endif
                        <div class="event-content">
                            <h5 class="event-title">{{ $event->name }}</h5>
                            <p class="event-description">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                            <div class="event-meta">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3"></i> {{ $event->date->format('d/m/Y') }}
                                </small>
                                <small class="text-muted">
                                    <i class="bi bi-geo-alt"></i> {{ $event->location }}
                                </small>
                            </div>
                            <div class="event-actions">
                                <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('events.destroy', $event->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="products-section py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="h3 mb-0">Produtos Recentes</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Ver Todos</a>
        </div>
        
        @if($products->isEmpty())
            <div class="text-center py-5 bg-white rounded">
                <p class="mb-3">Nenhum produto cadastrado ainda.</p>
                <a href="{{ route('products.create') }}" class="btn btn-primary">Criar Primeiro Produto</a>
            </div>
        @else
            <div class="products-grid">
                @foreach($products as $product)
                    <div class="product-card">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
                        @else
                            <div class="product-image-placeholder">
                                <i class="bi bi-cup-straw"></i>
                            </div>
                        @endif
                        <div class="product-content">
                            <h5 class="product-title">{{ $product->name }}</h5>
                            <p class="product-style">{{ $product->style->name }}</p>
                            <p class="product-description">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                            <div class="product-footer">
                                <span class="product-price">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                                <div class="product-actions">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza?')">Deletar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

@endsection