@extends('base')

@section('titulo', 'Bem-vindo')
@section('conteudo')

<section class="hero-banner">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Bem-vindo à Nossa Cervejaria</h1>
                <p class="lead mb-4">Descubra o sabor autêntico da cerveja artesanal. Produzida com paixão, servida com orgulho.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="#produtos" class="btn btn-primary btn-lg">Conheça Nossos Produtos</a>
                    <a href="#eventos" class="btn btn-outline-primary btn-lg">Próximos Eventos</a>
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

<section id="eventos" class="events-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Próximos Eventos</h2>
            <p class="lead text-muted">Participe dos nossos eventos e degustações especiais</p>
        </div>
        
        @if($events->isEmpty())
            <div class="text-center py-5 bg-light rounded">
                <p class="mb-0">Em breve novos eventos serão anunciados!</p>
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
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section id="produtos" class="products-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Nossos Produtos</h2>
            <p class="lead text-muted">Cervejas artesanais produzidas com os melhores ingredientes</p>
        </div>
        
        @if($products->isEmpty())
            <div class="text-center py-5 bg-white rounded">
                <p class="mb-0">Em breve nossos produtos estarão disponíveis!</p>
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
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<section class="cta-section py-5 text-center">
    <div class="container">
        <h2 class="display-5 fw-bold mb-4">Visite Nossa Cervejaria</h2>
        <p class="lead mb-4">Venha conhecer nosso espaço e experimentar nossas cervejas direto da fonte</p>
        <div class="d-flex gap-3 justify-content-center flex-wrap">
            <a href="#contato" class="btn btn-primary btn-lg">Entre em Contato</a>
            <a href="#localizacao" class="btn btn-outline-primary btn-lg">Como Chegar</a>
        </div>
    </div>
</section>

@endsection