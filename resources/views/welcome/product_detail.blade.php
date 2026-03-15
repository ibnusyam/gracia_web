@extends('welcome.layouts.app')

@section('title', ucwords(strtolower($detail_product->produk ?? 'Product Details')) . ' - PT Gracia Pharmindo')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8"
        data-bg-img="{{ asset('image_gracia/paralak_product.jpg') }}">
        <div class="container pt-60 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">Product Details</h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="{{ url('/') }}">Home</a></li>

                            @if (isset($nama_kategori) && is_array($nama_kategori))
                                <li>
                                    <a href="{{ url('product-list/' . $nama_kategori[2]) }}">
                                        {{ ucwords(strtolower($nama_kategori[1])) }}
                                    </a>
                                </li>
                            @endif

                            <li class="active text-theme-colored">Product Detail</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-content">
                <div class="row">

                    @if ($detail_product)
                        <div class="product">

                            <div class="col-md-5">
                                <div class="product-image">
                                    <ul class="owl-carousel-1col" data-nav="true">
                                        <li data-thumb="{{ asset('pict_produk/' . $detail_product->pict) }}">
                                            <a href="{{ asset('pict_produk/' . $detail_product->pict) }}"
                                                data-lightbox="single-product">
                                                <img alt="{{ $detail_product->produk }}"
                                                    src="{{ asset('pict_produk/' . $detail_product->pict) }}">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-md-7">
                                <div class="product-summary">
                                    <h2 class="product-title">{{ ucwords(strtolower($detail_product->produk)) }}</h2>

                                    <div class="short-description">
                                        <div>{!! $detail_product->deskripsi !!}</div>
                                    </div>

                                    {{-- 
                <div class="tags"><strong>Code:</strong> {{ $detail_product->kode }}</div>
                --}}

                                    <div class="category">
                                        <strong>Category:</strong> {{ $detail_product->golongan }}
                                    </div>

                                    {{-- 
                <div class="tags">
                  <strong>Status:</strong> 
                  {{ $detail_product->status_obat == 0 ? 'Still Produced' : 'Discontinue' }}
                </div>
                --}}
                                </div>
                            </div>

                        </div>
                    @else
                        <div class="col-md-12">
                            <div class="alert alert-warning text-center">
                                Detail produk tidak ditemukan atau sudah tidak tersedia.
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>
@endsection
