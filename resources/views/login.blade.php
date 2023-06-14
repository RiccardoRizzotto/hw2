<html>
    <head>
        <link rel='stylesheet' href='css/login.css'>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Accedi</title>
    </head>
    <body>
  
        <main class="login">
        <section class="main">
            <h5>Per continuare, accedi.</h5>
        

                @if (isset($error)) {
                    echo "<p class='error'> $error </p>";
                } @endif
            

            <form name='login' method='post'>
                @csrf
                
                <div class="username">
                    <label for='username'>Username</label>
                    <input type='text' name='username' value='{{ old("username") }}' >
                </div>

                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' value='{{ old("password") }}'>
                </div>

                <div class="submit-container">
                    <div class="login-btn">
                        <input type='submit' value="ACCEDI">
                    </div>
                </div>

            </form>
            <div class="signup"><h4>Non hai un account?</h4></div>
            <div class="signup-btn-container"><a class="signup-btn" href="register">Iscriviti subito</a></div>
        </section>
        </main>
    </body>
</html>