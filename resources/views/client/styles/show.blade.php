@extends('base')

@section('titulo', $style->name)
@section('conteudo')

<section class="hero-banner-small py-5 bg-light">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Início</a></li>
                <li class="breadcrumb-item"><a href="{{ route('styles.list') }}">Estilos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $style->name }}</li>
            </ol>
        </nav>
        <div class="text-center mt-4">
            <h1 class="display-4 fw-bold mb-3">{{ $style->name }}</h1>
            <p class="lead text-muted">{{ $style->description }}</p>
        </div>
    </div>
</section>

<section class="products-section py-5">
    <div class="container">
        @if($style->products->isEmpty())
            <div class="text-center py-5">
                <p class="lead text-muted">Ainda não temos cervejas deste estilo disponíveis.</p>
                <a href="{{ route('styles.list') }}" class="btn btn-primary mt-3">Ver Outros Estilos</a>
            </div>
        @else
            <div class="row g-4">
                @foreach($style->products as $product)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm product-card">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
                            @else
                                <div class="product-image-placeholder card-img-top d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cup-straw" style="font-size: 4rem; color: #6c757d;"></i>
                                </div>
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text text-muted flex-grow-1">{{ $product->description }}</p>
                                <div class="product-details mt-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0 text-primary">R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                                        @if($product->ABV)
                                            <span class="badge bg-secondary">{{ $product->ABV }}% ABV</span>
                                        @endif
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        @if($product->IBU)
                                            <small class="text-muted">IBU: {{ $product->IBU }}</small>
                                        @else
                                            <span></span>
                                        @endif
                                        <button class="btn btn-primary add-to-cart" data-product-id="{{ $product->id }}">
                                            <i class="bi bi-cart-plus"></i> Adicionar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

<style>
    .hero-banner-small {
        background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    }
    
    .product-card {
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
        overflow: hidden;
    }
    
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .product-image {
        height: 250px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }
    
    .product-card:hover .product-image {
        transform: scale(1.05);
    }
    
    .product-image-placeholder {
        height: 250px;
        background-color: #f8f9fa;
    }
    
    .product-details {
        border-top: 1px solid #e9ecef;
        padding-top: 1rem;
    }
</style>

@endsection