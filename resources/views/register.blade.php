<html>
    <head>
        <link rel='stylesheet' href="css/signup.css">
        <script src="{{ URL::to('js/signup.js') }}" defer ="true"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="icon" type="image/png" href="favicon.png"> !-->
        <meta charset="utf-8">

        <title>Iscriviti</title>
    </head>
    <body>

        <main>
        <section class="main_left">
        </section>
        <section class="main_right">
            <h1 class = "titolo"> Iscriviti gratuitamente </h1>

            <form name='signup' method='post' enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="names">

                    <div class="name">
                        <label for='name'>Nome</label>
                        <input type='text' name='name' value = '{{ old("name") }}' >
                        <span>Devi inserire il tuo nome</span></div> 
                    </div>

                    <div class="surname">
                        <label for='surname'>Cognome</label>
                        <input type='text' name='surname' value = '{{ old("surname") }}' >
                        <span> Devi inserire il tuo cognome</span></div>
                    </div>
                </div>
                <div class="username">
                    <label for='username'>Nome utente</label>
                    <input type='text' name='username' value = '{{ old("username") }}'>
                     <span>Nome utente non disponibile</span></div>
                </div>
                <div class="email">
                    <label for='email'>Email</label>
                    <input type='text' name='email' value = '{{ old("email") }}'>
                    <span>Indirizzo email non valido</span></div> 
                </div>
                <div class="password">
                    <label for='password'>Password</label>
                    <input type='password' name='password' value='{{ old("password") }}'> 
                    <span>Inserisci almeno 8 caratteri</span>
                </div>
                <div class="confirm_password">
                    <label for='confirm_password'>Conferma Password</label>
                    <input type='password' name='confirm_password' value='{{ old("confirm_password") }}' >
                   <span>Le password non coincidono</span></div>
                </div>
              
                <div class="allow"> 
                    <input type='checkbox' name='allow' value="1" {{ old('allow') ? 'checked' : '' }}>
                    <label for='allow'>Accetto i termini e condizioni d'uso.</label>
                </div>

                @if(isset($error)) {
                    @foreach($error as $err) {
                        echo " <div class='errorj'><img src='./assets/close.svg'/><span>".$err."</span></div>";
                    }@endforeach;
                }@endif 

                <div class="submit">
                    <input type='submit' value="Registrati" id="submit">
                </div>
            </form>
            <div class="signup">Hai un account? <a href= "login"> Accedi </a>
        </section>
        </main>
    </body>
</html>