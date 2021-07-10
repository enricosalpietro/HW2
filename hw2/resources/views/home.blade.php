<?php
?>

<html>
  <head>
    <link rel='stylesheet' href='{{ asset('css/home.css') }}'>
    <script src='{{ asset('js/home.js') }}' defer="true"></script>
    <meta charset="utf-8">
    <title>Motorsport-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">    
    
    
  </head>
  
  <body>
    <div id='access'>
        @if($user==null)
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
      
      <h1>
        <em>Archivio campionati automobilistici</em>
<br/> 
        <strong>Motorsport</strong><br/>
        
      </h1>
      <div class="overlay"></div> 
    </header>  
    <section>
      <div id="main">
        <h1>Risultati, circuiti, team e piloti del mondo automobilistico</h1>
        <p>Puoi trovare tutti i risultati, le informazioni e le statistiche delle diverse edizioni di un campionato
        </p>
      </div>  
      <div id="details">
        <div class="photo">
          <img src="{{ asset('immagini/campionati.png') }}">
          <a href = "{{ route('gare') }}">Gare f1 2021</a>
        </div>  
        <div class="photo">
        <img src="{{ asset('immagini/piloti.png') }}">
        <a href = "{{ route('piloti') }}">Piloti f1 2021</a>      
        </div>
       </div>       
      </div>
    </section>
    
    <div id="info">
    
    <div id="news">
            <h2>Cerca una notizia</h2>
            <form>
              Inserisci parola chiave
              <input type='text' id='key_news'>
              <input type='submit' value='Cerca'>
            </form>
            <div id="articles"></div>
    </div> 

      <div id="standing">
        <h3>Classifica Formula 1 2021</h3>
        <div class="classifica"></div>
      </div>
    </div>

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
</html>    