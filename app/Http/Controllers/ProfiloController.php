<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\Reservation;

class ProfiloController extends BaseController
{
    private function controlSession()
     {
        if(!Session::has('username_id'))
         return redirect('home');
     }

     public function profilo()
      {
        return view('visualizza_profilo');
      }


      public function get_informazioni()
      {
        $userid = Session::get('username_id');
        $informazioni = Reservation::where('id_utente_prenotazione',$userid)->get();
        return $informazioni;
      }
}
?>