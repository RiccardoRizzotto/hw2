<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Meteo</title>
  <link rel="stylesheet" href="/css/style.css">
  <script src= "/js/app.js" defer="true"></script>
</head>
<body>
   <div class= "container">
     <button type = "submit" class = "btn" onclick="openPopup()"> Meteo </button>
       <div class = "popup" id="popup">


        <form name ='search_content' id='search_content'>
			
          <h1 id="titolo">Meteo</h1>
          
          <label>Luogo: <input type='text' placeholder="Enter the city" name = 'content' id ='content'></label>	
          <label>&nbsp;<input class="submit" type='submit'></label>
         </form>
          
      <article id="album-view">
    
          <div class="card">
            <p class="humidity"></p>
            <p class="temp"></p>
            <p class="desc"></p>
            <p class="wind"></p>
            <p class="prec"></p>
            <p class="company"></p>
            <p id="dove"></p>
          </div>
    
      </article>

          <h2> Powered by WeatherApi</h2>
          <button type="button" onclick="closePopup()"> OK</button>
  
       </div>
   </div>
</body>
</html>