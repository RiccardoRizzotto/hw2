<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\Reservation;


class PrenotazioneController extends BaseController
{
    private function controlSession()
     {
        if(!Session::has('username_id'))
         return redirect('home');
     }

     public function form_prenotazione()
      {
        return view('index_prenotazione');
      }
      

    public function post_prenotazione()
    {
     $newPrenotazione = new Reservation;
     $newPrenotazione -> name = Request::post('name');
     $newPrenotazione -> surname = Request::post('surname');
     $newPrenotazione -> email = Request::post('email');
     $newPrenotazione -> data_nascita = Request::post('data_nascita');
     $newPrenotazione -> telefono = Request::post('phone');
     $newPrenotazione -> residenza = Request::post('residenza');
     $newPrenotazione -> check_in = Request::post('check_in');
     $newPrenotazione -> check_out = Request::post('check_out');
     $newPrenotazione -> id_utente_prenotazione = Session::get('username_id');
     $newPrenotazione -> hotel = Request::post('hotel');
     $newPrenotazione -> save();
     return redirect('visualizza_profilo');
     
    }

    
    public function elimina_prenotazione()
    {
      if(!Session:: has('username_id'))
      {
        return redirect('login');
      }

      $userid = Session::get('username_id');

      $prenotazione = Reservation::where('id_utente_prenotazione',$userid)->delete();

      return response()->json(["Reservation" => $prenotazione, "elimina" => true]);
    }

}
?>