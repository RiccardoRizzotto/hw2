<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;

class CityController extends BaseController
{
    private function controlSession()
    {
        if(!Session::has('username_id'))
         return redirect('home');
    }

     public function visualizza_cortina()
    {
      return view('cortina');
    }

    public function visualizza_corvara()
    {
      return view('corvara');
    }

    public function visualizza_moena()
    {
      return view('moena');
    }

}
?>