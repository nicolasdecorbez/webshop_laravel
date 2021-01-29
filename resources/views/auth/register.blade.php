@extends('layouts.app')

@section('content')
<html>
	<head>
		<title>Inscription</title>
		

	</head>

	<body>

		<main>

			<div class="title">
				<span>Inscription</span>
			</div>

			<form method="POST" action="{{ route('register') }}" class="auth_form">
          @csrf

				  <br>

			    <label for="name">Nom</label><br/>
			    <input type="text" id="name" name="name" class="champ" value="{{ old('name') }}" required autocomplete="name" autofocus><br/>

			    <label for="email">E-mail</label><br/>
			    <input type="text" id="email" name="email" class="champ" value="{{ old('email') }}" required autocomplete="email"><br/>

			    <label for="password">Mot de passe</label><br/>
			    <input type="password" id="password" name="password" class="champ" required autocomplete="new-password"><br/>

          <label for="password-confirm">Confirmez le mot de passe</label><br/>
			    <input type="password" id="password-confirm" name="password_confirmation" class="champ" required autocomplete="new-password"><br/>

			    <input type="submit" value="Inscription" class="butt">

			</form>

			@error('name')
					<p class="error">{{ $message }}</p>
			@enderror

			@error('email')
					<p class="error">{{ $message }}</p>
			@enderror

			@error('password')
					<p class="error">{{ $message }}</p>
			@enderror

		</main>

	</body>
</html>
@endsection