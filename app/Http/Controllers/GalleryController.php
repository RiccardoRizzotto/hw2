<?php 
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Request;
use Session;
use App\Models\User;
use App\Models\DolomitesImage;

class GalleryController extends BaseController
{
    private function controlSession()
     {
        if(!Session::has('username_id'))
         return redirect('home');
     }

     public function gallery()
      {
        return view('visualizza_gallery');
      }


      public function get_pictures()
      {
        $immagini = DolomitesImage::all();
        return $immagini;
      }
}
?>