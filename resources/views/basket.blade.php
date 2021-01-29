@extends('layouts.app')

@section('content')
<script src="{{ asset('js/basket.js') }}"defer></script>
<main>

	
	<div class="basket_title">
		<span>Panier</span>
	</div>

	<div class="basket_c">
		<div class="basket_products">

			<table class="basket_tbl">

				<tr>
					<th class="basket_colort b_20"></th>
					<th class="basket_colort">Produit</th>
					<th class="basket_colort b_200">Quantité</th>
					<th class="basket_colort b_200">Prix unitaire</th>
				</tr>
			</table>

		</div>	
		<div id="price" class="basket_right">


		<div  class="basket_price">
			<div>
				<p class="price_title">Total :</p>
			</div>
			<div class="price_c">
				<p id ="total" class="price_nbr"></p>
			</div>
			<div >
				<p class="price_qty">Elements: <strong id="elements" ></strong></p>

			</div>
		</div>
	</div>
</main>
</body>

@endsection
