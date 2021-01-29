@extends('layouts.app')

@section('content')
<html>
	<head>
		<title>login</title>
		

	</head>

	<body>

		<main>

			<div class="title">
				<span>Connexion</span>
			</div>

			<form method="POST" action="{{ route('login') }}" class="auth_form">
          @csrf
    			<br/>

			    <label for="email">E-mail</label>
          <br/>
			    <input type="email" id="email" name="email" value="{{ old('email') }}" class="champ" required autocomplete="email" autofocus>
          <br/>

			    <label for="pass">Mot de passe</label>
          <br/>
			   	<input type="password" id="pass" name="password" class="champ" required autocomplete="current-password">
          <br/>

			   	<input type="submit" value="Connexion" class="butt">

			</form>

      @if (Route::has('password.request'))

					<div class="forgot_link">
							<a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
					</div>

      @endif

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