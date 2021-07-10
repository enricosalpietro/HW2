<html>
    <head>
        <title>Motorsport-Piloti</title>   
        <script src='{{ asset('js/script.js') }}' defer="true"></script>
        <link rel='stylesheet' href='{{ asset('css/piloti.css') }}'>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">        
        <meta charset="utf-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1">     
    </head>
    <body>
    <div id='access'>
      @if($user == null)
        <a href="{{ route('login') }}">Accedi</a>
        <a href="{{ route('register') }}">Iscriviti</a>              
      @else
        <a href="{{ route('logout') }}">Logout</a>    
      @endif
    </div>   
        <header>
            <nav>
                <div id="logo">
                  <img src="{{ asset('immagini/logo.png') }}">
                </div>
                <div id="links">
                  <a href = "{{ route('home') }}">Home</a>
                  <a href = "{{ route('piloti') }}">Piloti</a>
                  <a href="{{ route('gare') }}">Gare</a>
                  <a>About</a>              
                </div>
                <div id="menu">
                  <div></div>
                  <div></div>
                  <div></div>
                </div>                
            </nav> 
            <div class="overlay"></div>     
        </header>
                     
          <div id="favorite" class="hidden">
            <h2>Preferiti:</h2>
            <div id="sezPreferiti"> </div>
        </div>
        
        <section id="main">
        @if($user == null)
          <h1>Piloti F1 2021</h1> 
          <div id = "grid"> </div>
        @else
          <h1>Scegli i tuoi piloti preferiti</h1>
          <div id = "grid"> </div>                       
        @endif
        </section>     
        <footer>
            <address>Enrico Salpietro O46002067</address>
            <h2>Seguici</h2>
            <div id='social'>
              <div>
              <img src="{{ asset('immagini/instagram.png') }}">
                <p>@Motorsport_italia</p>
              </div>
              <div>
              <img src="{{ asset('immagini/facebook.png') }}">
                <p>Motorsport Italia</p>
              </div>
              <div>
              <img src="{{ asset('immagini/twitter.png') }}">
                <p>Motorsport Italia</p>
              </div>
            </div>  
        </footer>    
    </body>
     
<html>    