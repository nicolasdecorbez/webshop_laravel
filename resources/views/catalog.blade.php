@extends('layouts.app')

@section('content')
<html>
	<head>
		<title>catalogue</title>
		<link rel="stylesheet" href="style.css">
		<script src="https://kit.fontawesome.com/ccdb88f8bd.js" crossorigin="anonymous"></script>
		<script src ="{{ asset('js/basket.js') }}"defer></script>
	</head>

	<body>

		<main class="catalog">
		@foreach ($product as $product)
		
		<div class="cata_container">
			<img class="cat_img" src={{$product->image}}>
				<div class="cata_bot">

					<div class="cata_tit">{{$product->title}}</div>
					
					<div class="cata_links">
						<a href={{route('show_product',['id'=>$product->id])}} class="cata_butt">Plus d'informations</a>
						<button onclick= buyProduct({{$product->id}}) class="cata_butt">Achat direct</div>
					</div>
				</div>
		</div>
		@endforeach
			</main>

	</body>
</html>
@endsection