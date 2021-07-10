<?php

?>

<html>
    <head>
        <script src='{{ asset('js/signup.js') }}'defer></script>
        <script type="text/javascript">
            const CHECK_USER = "{{route('check_user')}}";
        </script>
        <script type="text/javascript">
            const CSFR_TOKEN = '{{ csrf_token() }}';
        </script>    
        <link rel='stylesheet' href='{{ asset('css/signup.css') }}'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">        
        <title>Motorsport-Signup</title>
    </head>
    <body>
        <div id='overlay'></div>
        <main>
            <div id='back'>  
                <a href="{{ route('home') }}">                       
                    <img src="{{ asset('immagini/close.png') }}">
                </a>                    
            </div>
            <div id='header'> 
                <img src="{{ asset('immagini/logo.png') }}">
                <h1>Iscriviti</h1>
            </div>
            <div id='divform'>        
            <form name='nome_form' id='form' method='post' action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf			
			    <p>
                    <input type='text' name='name' placeholder="nome">
                </p>
				<p>
                    <input type='text' name='surname' placeholder="cognome">
                </p>
				<p>
				<input type='email' name='email' placeholder="email@domain.ext">                    
                </p>
                <p>
                    <input type='text' name='username' placeholder="username">
                </p>
                <p>
                    <input type='password' name='password' placeholder="password">
                </p>
				<p>
                    <input type='password' name='passwordDue' placeholder="conferma password">
                </p>
                <p>
                    <input name='try'  type='submit' class='button' value='Registrati!'>
				</p>
				

			</form>
            </div>    
            <div id='login'>
                <a href="{{ route('login') }}">Sei già membro?</a>
            </div> 
        </main>
    </body>

</html>