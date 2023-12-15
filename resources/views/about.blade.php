@extends('layouts.main')
@section('content')
<div class="container">
<h1 class="text-center mt-4">Selamat datang di Nourriture !</h1>
<p class="text-center mb-5">Halo, Foodies! Saya Evta, penulis di balik layar dan otak di balik setiap resep lezat yang Anda temukan di sini. Saya adalah seorang pecinta makanan yang penuh gairah dan pemberani dalam merintis dunia kuliner yang menggoda lidah.</p>
<h1 class="text-center mt-4">Mengapa Nourriture?</h1>
<p class="text-center mb-5">Nourriture ini tidak hanya tentang resep-resep yang membuat air liur meleleh, tetapi juga perjalanan saya dalam dunia kuliner. Dari dapur rumahan hingga eksplorasi kuliner di berbagai belahan dunia, saya berbagi kisah dan tips yang saya dapatkan sepanjang perjalanan.</p>
<h1 class="text-center mt-4">Apa yang Anda Akan Temukan di Sini?</h1>
<p class="text-center mb-5">Resep Kreatif: Dari masakan sehari-hari hingga karya seni kuliner yang lebih eksperimental, saya berbagi resep-resep yang dijamin akan memanjakan lidah Anda.<br>

Petualangan Kuliner: Ikuti saya dalam setiap petualangan kuliner saya, mulai dari warung makan tersembunyi hingga restoran pemenang penghargaan.<br>

Tips & Trik: Saya tidak hanya berbagi resep, tetapi juga memberikan tips praktis dan trik kuliner untuk membantu Anda menjadi ahli dapur di rumah.</p>

@forelse ($abouts as $about)
    <div class="card mx-auto border-0" style="max-width: 60rem;">
        <div class="card-body">
            <h1 class="text-center mb-4 mt-4">{{ $about->title }}</h1>
            <h4 class="text-center mt-4">{{ $about->sub_title }}</h4>
        </div>
    </div>

    <div class="card mx-auto mt-3 border-0" style="max-width: 60rem;">
        <div class="card-body">
            <p>{!! $about->content !!}</p>
        </div>
        <img src="{{ asset('/storage/posts/'.$about->image) }}" class="img-fluid mx-auto" style="max-width: 45vh;">

    </div>

    @empty
    <div class="container">
      <div class="card border-0 mt-3" style="width: 100%;">
        <div class="card-body text-center">
          <h5 class="card-title">Not Found</h5>
        </div>
      </div>
    </div>
    @endforelse
</div>
@endsection