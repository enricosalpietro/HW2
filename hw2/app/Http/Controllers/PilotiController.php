<?php

namespace App\Http\Controllers;

    use App\Models\Driver;
    use App\Models\User;
    use App\Models\Preferito;
    use Illuminate\Routing\Controller;
    use Illuminate\Support\Facades\Session;

class PilotiController extends Controller{
    
    public function index() {
        $session_id = session('user_id');
        $user = User::find($session_id);
        
        return view("piloti")->with("user", $user);
    } 

    public function caricaPiloti() {

        $listaPiloti = Driver::select('nome','descrizione', 'immagine', 'id_pilota')->get();
        
        return($listaPiloti);
    }

    public function caricaPreferiti() {
        /*$commenti = Commento::join('users','users.id','=','comments.utente')->orderBy('comments.id_commento')->get();
        $commentiArray = array();
        foreach($commenti as $value) {
            $commentiArray[] = array('commento' => $value->commento, 'id_commento' => $value->id_commento,'id_gara' => $value->id_gara,'id_utente' => $value->utente, 'username' => $value->username);
        }
        return response()->json($commentiArray); */
        $session_id = session('user_id');
        $user = User::find($session_id);

        $preferiti = Preferito::/*join('users','users.id','=','preferiti.utente')->*/join('pilota','pilota.id_pilota','=','preferiti.pilota')->where('utente', session('user_id'))->get();
        $preferitiArray = array();
        foreach($preferiti as $value) {
            $preferitiArray[] = array('id_preferito'=>$value->id, 'nome' => $value->nome, 'descrizione' => $value->descrizione,'immagine' => $value->immagine, 'utente'=>$value->utente);
        }
        return response()->json($preferitiArray);     
        
    }

    public function aggiungiPreferiti($id_pilota) {
        $preferito= Preferito::insert(array('pilota'=> $id_pilota,'utente' => session('user_id')));
        $user = User::find(session('user_id'));
        $preferiti = Preferito::join('pilota','pilota.id_pilota','=','preferiti.pilota')->where('utente', session('user_id'))->get();
        $preferitiArray = array();
        foreach($preferiti as $value) {
            $preferitiArray[] = array('id_preferito'=>$value->id, 'id'=>$value->id_pilota, 'nome' => $value->nome, 'descrizione' => $value->descrizione,'immagine' => $value->immagine, 'utente'=>$value->utente);
        }
        return response()->json($preferitiArray);    
        
    }

    public function rimuoviPreferiti($id_preferito) {
        /*$preferito= Preferito::delete(array('pilota'=> $id_pilota,'utente' => session('user_id')));
        $user = User::find(session('user_id'));
        $preferiti = Preferito::join('pilota','pilota.id_pilota','=','preferiti.pilota')->where('utente', session('user_id'))->get();
        $preferitiArray = array();
        foreach($preferiti as $value) {
            $preferitiArray[] = array('nome' => $value->nome, 'descrizione' => $value->descrizione,'immagine' => $value->immagine, 'utente'=>$value->utente);
        }
        return response()->json($preferitiArray);    
        $user = User::find(session('user_id'));
        $query=Preferito::where('pilota', $id_pilota, 'utente', session('user_id'))->delete();
        Preferito::where('pilota', $id_pilota,'utente', session('user_id'))->delete();
        
        $eliminato = array();
        if($query) {
            $eliminato[] = array('eliminato' => true);
        }else{
            $eliminato[] = array('eliminato' => false);
        }
        return response()->json($eliminato);*/

        $query=Preferito::find($id_preferito)->delete();
        $eliminato = array();
        if($query) {
            $eliminato[] = array('ok' => true);
        }else{
            $eliminato[] = array('ok' => false);
        }
        $preferiti = Preferito::join('pilota','pilota.id_pilota','=','preferiti.pilota')->where('utente', session('user_id'))->get();
        $preferitiArray = array();
        foreach($preferiti as $value) {
            $preferitiArray[] = array('id_preferito'=>$value->id, 'id'=>$value->id_pilota, 'nome' => $value->nome, 'descrizione' => $value->descrizione,'immagine' => $value->immagine, 'utente'=>$value->utente);
        }
        return response()->json($preferitiArray);  
    }

}