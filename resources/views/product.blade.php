@extends('layouts.app')

@section('content')
<script src="{{ asset('js/basket.js') }}"defer></script>"
<main>
	<div class="product">
		@foreach ($product as $product)

		<div class="product_img">
			<img src="{{$product->image}}" class="product_visu">
		</div>

		<div class="product_infos">

			<div>
				<span class="product_title">{{$product->title}}</span>
				<span class="product_cat">{{$product->category}}</span>
				<span class="product_price">{{$product->price}}€</span>
			</div>

			<p class="product_desc">{{$product->description}}</p>

			<button class="product_btn" onclick="buyProduct({{$product->id}})">
				Ajouter au panier
			</a>

		</div>
		@endforeach
	</div>

	@if(Auth::user()->id == 1)
	<div>
		<div class="product_admin">
			<form method="post" action="{{ route('update_product',['product'=>$product->id]) }}" class="admin_form">
				@csrf
				<p class="admin_title">Modification de l'article</p>
				<div class="admin_chmp">

					<div class="admin_left">
						<label for="name" class="admin_lab">Nom</label><br/>
						<input type="text" id="name" name="name" class="admin_input"><br/>
						<br/>
						<label for="image" class="admin_lab">Lien de l'image</label><br/>
						<input type="text" id="image" name="image" class="admin_input"><br/>
						<br/>
						<label for="description" class="admin_lab">Description</label><br/>                  <!-- LE FORMULAIRE POUR UN NOUVEAU PRODUIT-->
						<input type="textarea" id="description" name="description" class="admin_input"><br/>
					</div>

					<div class="admin_right">
						<label for="price" class="admin_lab">Prix</label><br/>
						<input type="number" id="price" name="price" class="admin_input"><br/>
						<br/>
						<label for="group" class="admin_lab">Catégorie</label><br/>
						<input type="text" id="group" name="group" class="admin_input"><br/>
						<br/>
						<label for="stock" class="admin_lab">Stock</label><br/>
						<input type="number" id="stock" name="stock" class="admin_input"><br/>
						<br/>
					</div>

				</div>

				<div class="admin_butt">
					<input type="submit" value="Mettre à jour" class="a_but a_mod a_mt15">

				</div>

			</form>

			<div>
				<a href="{{route('remove_product',['product'=>$product->id])}}"><button class="a_but a_supp">Supprimer</button></a>
			</div>

	</div>
	@endif

</main>

@endsection
