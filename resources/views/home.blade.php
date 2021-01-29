@extends('layouts.app')

@section('content')

<main class="bienvenue">

	<div class="home_c img_filter h_mt">
		<img src="{{url('img/catalog.jpg')}}" class="home_img i_c img_blur">
		<div class="home_links_c">
				<a href="{{ route('show_all_products') }}" class="home_links"><div class="home_c2">CATALOGUE</div></a>
		</div>
	</div>

	<div class="home_c img_filter">
		<img src="{{url('img/profil.jpeg')}}" class="home_img i_p img_blur">
		<div class="home_links_c">
				<a href="{{ route('log') }}" class="home_links"><div class="home_c2">PROFIL</div></a>
		</div>
	</div>

	<div class="home_c img_filter h_mb">
		<img src="{{url('img/basket.jpg')}}" class="home_img i_b img_blur">
		<div class="home_links_c">
				<a href="{{route('show_basket')}}" class="home_links"><div class="home_c2">PANIER</div></a>
		</div>
	</div>

</main>

@endsection
