<html>
    <head>
        <link rel='stylesheet' href='{{ asset('css/login.css') }}'>
        <title>Motorsport-Login</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i|Open+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@500&display=swap" rel="stylesheet">     
        
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
                <h1>Login</h1>
            </div>
            <div id='form'>
            <form name='nome_form' id='form' method='post'>
            @csrf
                <p>
                    <span>Username</span>
                        <label><input type='text' name='username'></label>
                </p>
                <p>
                    <span>Password</span>
                        <label><input type='password' name='password'></label>
                </p>
                <p>Memorizza dati accesso<input type='checkbox' name='ricorda' value='yes'></p>
                <p>
                    <label>&nbsp;<input type='submit' class='btn' value='Entra'></label>
                </p>
            </form>
            </div>
            <div id="signup">
                <a href="{{ route('register') }}">Non sei registrato?</a>
            </div> 
        </main>
        
    </body>
</html>