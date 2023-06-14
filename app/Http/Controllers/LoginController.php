<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
//use Illuminate\Http\Request;
use Request;
use Session;
use App\Models\User;

class LoginController extends BaseController
{
    public function register_form()
     {
        return view('register');
     }


   /*  public function do_register(Request $request){

        if(Session::has('username_id')) {
            return redirect('home');
        }

        $error=array();

        $user = User::where('username', $request->input('username'))->first();
        if($user){
            $error["username"]="username già in uso";
            return redirect("register")->withErrors($error)->withInput();
        }

        $email=User::where('email', $request->input('email'))->first();
        if($email){
            $error["email"]="mail già in uso";
            return redirect("register")->withErrors($error)->withInput();
        }

        $password= strtolower(User::where('password', $request->input('password'))->first());
        $uppercase = preg_match('@[A-Z]@', $password); //varie condizioni
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        if(!$uppercase||!$lowercase||!$number || strlen($password) < 8)
        $error[] = "Password non adatta";
 
        $utente = new User;
        $utente->username = $request->input('username');
        $p = password_hash($request->input('password'), PASSWORD_BCRYPT); 
        $utente->password = $p;
        $utente->email = $request->input('email');
        $utente->name = $request->input('name');
        $utente->surname = $request->input('surname');
        $utente->save();
        Session::put('username', $utente->username);
        Session::put('username_id', $utente->id);

        return redirect('home');
} */

public function do_register()
    {
        if(Session::has('username_id')) {
            return redirect('home');
        }   
        
        $error = array();
    
        // Verifica l'esistenza di dati POST
        if (!empty(Request::get("username")) && !empty(Request::get("password")) && !empty(Request::get('email')) && !empty(Request::get('name')) && 
            !empty(Request::get('surname')) && !empty(Request::get('confirm_password')) && !empty(Request::get('allow')))
        {
            
            # USERNAME
            // Controlla che l'username rispetti il pattern specificato
            if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
                $error['username'] = "Username non valido";
            } else {
                if(User::where('username', Request::get('username'))->first())
                {
                    dd(User::where('username', Request::get('username'))->first());
                    $error['username'] = "Username già utilizzato";
                }
            }
            # PASSWORD
            if (strlen(Request::get("password")) < 8) {
                $error['password'] = "Caratteri password insufficienti";
            } 
            # CONFERMA PASSWORD
            if (Request::get('password') != Request::get('confirm_password')) {
                $error['password'] = "Le password non coincidono";
            }
            # EMAIL
            if (!filter_var(Request::get('email'), FILTER_VALIDATE_EMAIL)) {
                $error['email'] = "Email non valida";
            } else {
                if(User::where('email', Request::get('email'))->first())
                {
                    $error['email'] = "Email già utilizzata";
                }
            }

            # REGISTRAZIONE NEL DATABASE
            if (count($error) == 0) {
                $password = password_hash(Request::get('password'), PASSWORD_BCRYPT);
    
                $user = new User;
                $user->username = Request::get('username');
                $user->password = $password;
                $user->name = Request::get('name');
                $user->surname = Request::get('surname');
                $user->email = Request::get('email');
                $user->save();
                Session::put('username_id', $user->id);
                return redirect('home');
            }

        }
        else {
            $error[] = "Compila tutti i campi";
        }
        return redirect('register')->withInput()->withErrors($error);
    }


     public function check($field)  //è una funzione un pò più generale, va bene per entrambe i campi. Nella route specifico poi username o email nel campo adeguato
     {
         if(empty(Request::get('q'))) {
             return ['exists' => false];
         }
         $user = User::where($field, Request::get('q'))->first();
         return ['exists' => $user ? true : false];
     }


     private function controlSession()
     {
         if(Session::has('username_id'))
             //Reindirizzo alla home
             return redirect('home');
     }


     public function redirect_login()
     {
        return redirect('login');
     }


     public function login()
    {
        $this->controlSession();
        return view('login');
    }


    public function do_login(Request $request)
     {
        if(!empty(Request::get('username')) && !empty(Request::get('password')))
         {
            $username = Request::get("username");
            $password = Request::get("password");

            $user = User::where('username', $username)->first();
            if($user)
            {
                if(password_verify(Request::get('password'), $user->password)){
                
                    Session::put("username_id", $user ->id); //metto la var. di sessione
                
                    return redirect("home");
                }
            }

          return view("login");
         }
     }


     public function logout()
      {
        Session::flush();
        return redirect('login');
      }
}

?>