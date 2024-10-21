@extends('layouts.user.main')

@section('content')
<!-- Start Banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>Nike New <br>Collection!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                ad minim veniam, quis nostrud exercitation.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid" src="{{ asset('assets/templates/user/img/banner/banner-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Product Area -->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>Latest Products</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
            </div>
        </div>

        <h1>Flash Sale</h1>
        <div class="row">
            @forelse($flashsales as $flashSaleItem)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="product card text-center">
                        <img src="{{ asset('images/' . $flashSaleItem->image) }}" class="card-img-top" alt="{{ $flashSaleItem->product_name }}">
                        <div class="card-body">
                            <h2 class="card-title">{{ $flashSaleItem->product_name }}</h2>
                            <p class="card-text"><strike>Rp{{ number_format($flashSaleItem->original_price, 2) }}</strike></p>
                            <p class="card-text">Rp{{ number_format($flashSaleItem->discount_price, 2) }}</p>
                            <p class="card-text">Diskon: {{ round($flashSaleItem->discount_percentage) }}%</p>
                            <p class="card-text">Sisa waktu: {{ \Carbon\Carbon::parse($flashSaleItem->end_time)->diffForHumans() }}</p>
                            <p class="card-text">Stok tersisa: {{ $flashSaleItem->stock }}</p>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada produk flash sale saat ini.</h3>
                </div>
            @endforelse
        </div>

        <div class="row mt-5">
            @forelse ($products as $item)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="single-product card text-center">
                        <img class="img-fluid card-img-top" src="{{ asset('images/'. $item->image) }}" alt="">
                        <div class="product-details card-body">
                            <h6>{{ $item->name }}</h6>
                            <div class="price">
                                <h6>Harga: {{ $item->price }} Points</h6>
                            </div>
                            <div class="prd-bottom">
                                <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $item->id }}', '{{ Auth::user()->id }}')">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="{{ route('user.detail.product', $item->id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12">
                    <h3 class="text-center">Tidak ada produk</h3>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- End Product Area -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>
@endsection