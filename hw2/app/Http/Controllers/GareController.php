<?php

namespace App\Http\Controllers;

    use App\Models\Gara;
    use App\Models\User;
    use App\Models\Commento;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;

class GareController extends Controller{

    public function index() {  
        $session_id = session('user_id');
        $user = User::find($session_id);
        
        return view("gare")->with("user", $user);
    }      

    public function caricaGare() {

        $listaGare = Gara::select('titolo', 'immagine', 'descrizione','id_gara')->get();
        
        return($listaGare);
    }

    public function caricaCommenti() {
        $commenti = Commento::join('users','users.id','=','comments.utente')->orderBy('comments.id_commento')->get();
        $commentiArray = array();
        foreach($commenti as $value) {
            $commentiArray[] = array('commento' => $value->commento, 'id_commento' => $value->id_commento,'id_gara' => $value->id_gara,'id_utente' => $value->utente, 'username' => $value->username);
        }
        return response()->json($commentiArray);        
    }

    public function aggiungiCommento($commento) {
        
        $comment= Commento::insert(array('commento'=> $commento,'utente' => session('user_id')));
        $aggiunto = array();
        $user = User::find(session('user_id'));
        $aggiunto[] = array('username' => $user->username, 'commento' => $commento);       
        return response()->json($aggiunto);
                
    }


}