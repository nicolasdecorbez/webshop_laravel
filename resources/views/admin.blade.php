@extends('layouts.app')

@section('content')

<script src="{{ asset('js/admin.js') }}" defer></script>

<main>

	<a href="{{route('number_commands')}}" id="commands_link" hidden></a>
	<a href="{{route('bigest_command')}}" id="big_link" hidden></a>

	<table class="admin_table">
		<tr>
			<th>Utilisateurs connectés</th>
			<th>Nombres de commandes passées</th>
			<th>Plus grosse commande</th>
		</tr>
		<tr>
			<td id="users">0</td>
			<td id="coms">0</td>
			<td id="big">0 €</td>
		</tr>
		<tr>
			<td colspan="3">
				<form class="admin_table_refresh" action="{{route('users_connected')}}" method="post" id="refresh-form">
					<button type="submit">Appuyez pour actualiser</button>
				</form>
			</td>
		</tr>
	</table>


	<div class="title">
		<span>Ajout d'un article</span>
	</div>

	<form method="post" action="{{ route('create_product') }}" class="auth_form">
		@csrf

		<br/>
		<label for="name" class="tet">Nom de l'article</label><br/>
		<input type="text" id="name" name="name" class="champ"><br/>

		<br/>
		<label for="image" class="tet">Lien de l'image</label><br/>
		<input type="text" id="image" name="image" class="champ"><br/>

		<br/>
		<label for="description" class="tet">Description</label><br/>                  							<!-- LE FORMULAIRE POUR UN NOUVEAU PRODUIT-->
		<input type="textarea" id="description" name="description" class="champ"><br/>

		<br/>
		<label for="price" class="tet">Prix</label><br/>
		<input type="number" id="price" name="price" class="champ"><br/>

		<br/>
		<label for="group" class="tet">Catégorie</label><br/>
		<input type="text" id="group" name="group" class="champ"><br/>

		<br/>
		<input type="submit" value="Ajouter" class="butt">

		<br/>
	</form>



</main>

@endsection
