@extends('welcome.layouts.app')

@section('title', ucwords(strtolower($nama_kategori)) . ' - PT Gracia Pharmindo')

@section('content')
    <section class="inner-header divider parallax layer-overlay overlay-white-8"
        data-bg-img="{{ asset('image_gracia/paralak_product.jpg') }}">
        <div class="container pt-60 pb-60">
            <div class="section-content">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="title">{{ ucwords(strtolower($nama_kategori)) }}</h2>
                        <ol class="breadcrumb text-center text-black mt-10">
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li class="active text-theme-colored">Product</li>
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

                    <div class="col-md-9">
                        <div class="products">
                            <div class="row multi-row-clearfix">

                                @if (isset($daftar_product) && $daftar_product->isNotEmpty())
                                    @foreach ($daftar_product as $row)
                                        <div class="col-sm-6 col-md-4 col-lg-4 mb-30">
                                            <div class="product">
                                                <div class="product-thumb">
                                                    <img alt="{{ $row->produk }}"
                                                        src="{{ asset('pict_produk/thumb/' . $row->pict) }}"
                                                        class="img-responsive img-fullwidth">
                                                    <div class="overlay"></div>
                                                </div>
                                                <div class="product-details text-center">
                                                    <a href="{{ url('product-detail/' . $row->id_obat) }}">
                                                        <h5 class="product-title">{{ $row->produk }}</h5>
                                                    </a>
                                                    <div class="price">{{ $row->golongan }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="col-md-12">
                                        <div class="alert alert-info">Belum ada produk di kategori ini.</div>
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="sidebar sidebar-right mt-sm-30">
                            <div class="widget">
                                <h5 class="widget-title line-bottom">Categories</h5>
                                <div class="categories">
                                    <ul class="list list-border angle-double-right">

                                        @if (isset($kategori_product) && $kategori_product->isNotEmpty())
                                            @foreach ($kategori_product as $row)
                                                <li>
                                                    <a href="{{ url('product-list/' . $row->kode_golongan) }}">
                                                        {{ ucwords(strtolower($row->golongan)) }}

                                                        {{-- Cek apakah kolom total ada di database/query, kalau ada tampilkan --}}
                                                        @if (isset($row->total))
                                                            <span> ( {{ $row->total }} ) </span>
                                                        @endif
                                                    </a>
                                                </li>
                                            @endforeach
                                        @endif

                                    </ul>
                                </div>
                            </div>

                            {{-- 
            <div class="widget">
              <h5 class="widget-title line-bottom">Latest Events</h5>
              <div class="latest-posts">
                @if (isset($get_events_limit) && $get_events_limit->isNotEmpty())
                  @foreach ($get_events_limit as $row)                  
                    <article class="post media-post clearfix pb-0 mb-10">
                      <a class="post-thumb" href="{{ url('event-detail/' . $row->id_artikel) }}">
                        <img src="{{ asset('artikel_files/' . $row->ilustrasi) }}" alt="{{ $row->judul_artikel }}" width="75">
                      </a>
                      <div class="post-right">
                        <h5 class="post-title mt-0">
                          <a href="{{ url('event-detail/' . $row->id_artikel) }}">{{ $row->judul_artikel }}</a>
                        </h5>
                      </div>
                      {{ $row->tempat }}
                    </article>
                    <br />
                  @endforeach
                @endif             
              </div>
            </div>
            --}}

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
