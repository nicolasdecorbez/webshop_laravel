<html>
	<head>
		<title>reset</title>
		<link rel="stylesheet" href="{{url('style.css')}}">

	</head>

	<body>

		<main>

			<div class="title">
				<span>Mot de passe oublié</span>
			</div>

			<form method="POST" action="{{ route('password.email') }}">
          @csrf

				  <br>

			    <label for="email">E-mail</label><br>
			    <input type="email" id="email" name="email" class="champ" value="{{ old('email') }}" required autocomplete="email" autofocus><br/>

			    <input type="submit" value="Envoyer" class="butt">

			</form>

			@error('email')
					<p class="error">{{ $message }}</p>
			@enderror

		</main>

	</body>
</html>
