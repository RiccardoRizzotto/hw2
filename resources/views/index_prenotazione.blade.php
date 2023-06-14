<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index_prenotazione.css">
    <title> Prenota il tuo hotel </title>
</head>

<body>

 <h1 class = "titolo"> Prenota la tua vacanza in Altura </h1>
<form class = "" method = "post" action ="">
    @csrf

        <p>
            <label> Name <input type = 'text' name = 'name'> </label>
        </p>

        <p>
            <label> Surname <input type = 'text' name = 'surname'> </label>
        </p>

        <p>
            <label> Email <input type = 'text' name = 'email'> </label>
        </p>

        <p>
            <label> Date <input type = 'text' name = 'data_nascita'> </label>
        </p>

        <p>
            <label> Phone <input type = 'text' name = 'phone'> </label>
        </p>
    
        <p>
            <label> Residence <input type = 'text' name = 'residenza'> </label>
        </p>

        <p>
            <label> Check-In <input type = 'text' name = 'check_in'> </label>
        </p>

        <p>
            <label> Check-out <input type = 'text' name = 'check_out'> </label>
        </p>

        <p>
            <label> Hotel <input type = 'text' name = 'hotel'> </label>
        </p>


        <button type ="submit" name = "submit"> Invia la tua Prenotazione </button>
    </form>
</body>
</html>