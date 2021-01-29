<html>
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
	  <script src="{{ asset('js/usr.js') }}" defer></script>
      <script src="https://kit.fontawesome.com/ccdb88f8bd.js" crossorigin="anonymous"></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body onload="setCookie()">
    <header>
  			<div class="logo">
  				<a href="https://bongo.cat" title="don't click"><img src="{{url('img/logo.png')}}" class="logoimg"></a>
  			</div>

  			<div class="menu">

  				<div class="link">
  					<a href="{{ route('home')}}">Accueil</a>
  				</div>
  				<div class="link">
  					<a href="{{ route('show_all_products') }}">Catalogue</a>
  				</div>
				 
				  
  				<div class="link">
  					<a type="button" href="{{route('show_basket')}}" id="element_head"></a>
					 
				  </div>
				  </div>
				
				
  			</div>

  			<div class="username flsb">

          @if (Auth::check())
            <div class="userlink mr10">
    					<p>Bienvenue, <a href="{{ route('log') }}" class="cblack">{{ Auth::user()->name }}</a></p>
    				</div>

    				<div class="userlink decon ml10 tar">
    					<p><a href="/logout" class="cgrey">Déconnexion</a></p>
    				</div>

          @else
            <div class="userlink mr10">
    					<p><a href="{{ route('login') }}" class="cblack">Connexion</a></p>
    				</div>

    				<div class="userlink ml10">
    					<p><a href="{{ route('register') }}" class="cblack">Inscription</a></p>
    				</div>

          @endif
  			</div>

  		</header>

      @yield('content')

      <footer class="footer_custom h50">
         <div class="foot_logos">
        <div class="fb">
            <a href=""><i class="fab fa-facebook-f foot"></i></a>
        </div>
        <div  class="tw">
            <a href=""><i class="fab fa-twitter foot"></i></a>
        </div>
        </div>
</footer>

  </body>
</html>
