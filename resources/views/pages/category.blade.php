@extends('layouts.app')

@section('title','Store Category Page')

@section('content')
<!-- Page Content -->
<div class="page-content page-categories">
    <section class="store-trend-categories">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Categories</h5>
                </div>
            </div>
            <div class="row">
                @php $number = 0; @endphp
                @forelse ($categories as $categori)
                <div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $number += 100 }}">
                    <a class="component-categories d-block" href="{{ route('categories-detail', $categori->slug) }}">
                        <div class="categories-image">
                            <img src="{{ Storage::url($categori->photo) }}" alt="{{ $categori->name }}" class="w-100"/>
                        </div>
                        <p class="categories-text">
                            {{ $categori->name }}
                        </p>
                    </a>
                </div>
                @empty
                    <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100">
                        Not Category Found
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <section class="store-new-products">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <h5>All Products</h5>
                </div>
            </div>
            <div class="row">
                @php $number = 0 @endphp
                @forelse ($products as $product)
                    <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $number += 100 }}">
                        <a class="component-products d-block" href="{{ route('detail', $product->slug) }}">
                        <div class="products-thumbnail">
                            <div class="products-image" style="
                                @if($product->galleries->count())
                                    background-image: url('{{ Storage::url($product->galleries->first()->photos) }}')
                                @else
                                    background-color: #eee
                                @endif
                                ">
                            </div>
                        </div>
                        <div class="products-text">
                            {{ $product->name }}
                        </div>
                        <div class="products-price">
                            @currency($product->price )
                        </div>
                    </a>
                </div>
                @empty
                    <div class="col-12 text-center p-5">
                        Not Product Found
                    </div>
                @endforelse
            </div>
            {{ $products->links() }}
        </div>
    </section>
</div>

@endsection
