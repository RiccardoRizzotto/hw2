<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;

class HomeController extends BaseController
{
    private function controlSession()
     {
        if(!Session::has('username_id'))
         return redirect('home');
     }

     public function home()
      {
        return view('home');
      }

      public function visualizza_weather()
      {
        return view('visualizza_curl');
      }


      public function weather()
      {
        $key_weather = '7722b8b48b1e4923824170135231804';
        //$value = $_GET['q'];
        $value = Request::get('q');
        $url = "http://api.weatherapi.com/v1/current.json/key=$key_weather?q=" .$value;

        $curl = curl_init();

        curl_setopt_array($curl, [
	    CURLOPT_URL => "http://api.weatherapi.com/v1/current.json?key=7722b8b48b1e4923824170135231804&q=$value&aqi=no",
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_ENCODING => "",
	    CURLOPT_MAXREDIRS => 10,
	    CURLOPT_TIMEOUT => 30,
	    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	    CURLOPT_CUSTOMREQUEST => "GET",
	/*CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: weatherapi-com.p.rapidapi.com",
		"X-RapidAPI-Key: 7722b8b48b1e4923824170135231804 "
	],*/
    ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

     if ($err) 
     {
	   echo "cURL Error #:" . $err;
     } else 
       {
	    echo $response;
       }
   }
}
?>