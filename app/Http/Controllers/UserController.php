<?php

namespace App\Http\Controllers;

use App\Historiques;
use App\Utilisateur;
use App\Personnel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function getForm(){
    	if (session()->has('user')) {
    		session(['page' => 8]);
	    	$users = Utilisateur::with('personnel')->where('statut', '!=', -1)->get();
	    	return view('utilisateur', compact('users'));
    	}else{
    		session()->flush();
    		return redirect('/');
    	}
    }

    function postForm(Request $request){
    	if ($request->ajax()) {
    		if ($request->has('ajouter')) {
                $user = Utilisateur::create(['Per_id' => $request->input('userId'), 'mdp' => sha1($request->input('mdp')), 'type' => $request->input('typ')]);
                if(isset($user->id)){
                    Historiques::create(['Uti_id' => session('user.id'), 'operation' => 'CREATION', 'element' => 'Utilisateur']);
                }else{
                    return 0;
                }
				//return dump($request);
            }

            if ($request->has('edit')) {
                $user = Utilisateur::with('personnel')->where('id', $request->input('edit'))->first();
                if (isset($user->id)) {
                    return view('modifiers.modif_utilisateur', compact('user'));
                }else{
                    return 0;
                }
            }

            if ($request->has('generate')) {
                $mdp = $this->generateStrongPassword();
                $u = Utilisateur::where('id', $request->input('generate'))->update(['mdp' => sha1($mdp)]);

                if($u == 1){
                    Historiques::create(['Uti_id' => session('user.id'), 'operation' => 'MODIFICATION', 'element' => 'Utilisateur']);

                    return $mdp;
                }else{
                    return 0;
                }
            }

            if ($request->has('modifier')) {
                if (!empty($request->input('mdp'))) {
                     $mdp = sha1($request->input('mdp'));
                }else{
                    $mdp = Utilisateur::where('id', $request->input('modifier'))->first()->mdp;
                }

                $u = Utilisateur::where('id', $request->input('modifier'))->update(['mdp' => $mdp, 'type' => $request->input('typ')]);
                if($u == 1){
                    Historiques::create(['Uti_id' => session('user.id'), 'operation' => 'MODIFICATION', 'element' => 'Utilisateur']);
                }else{
                    return 0;
                }
            }

            if ($request->has('search')){
    			$valeur = strtolower($request->input('user'));

    			$pers = Personnel::with(['poste', 'service'])->where('nom', 'like' , '%'.$valeur.'%')->orWhere('prenom', 'like', '%'.$valeur.'%')->orWhere('sexe', 'like', '%'.$valeur.'%')->orWhere('matricule', 'like', '%'.$valeur.'%')->orderBy('nom', 'asc')->get();

    			$valeur = '';
    			$us = array_values(array_column(Utilisateur::all()->toArray(), 'Per_id'));
    			foreach ($pers as $p) {
    				$trouve = 0;
    				for ($i=0; $i < count($us); $i++) { 
    					if ($us[$i] == $p->id) {
    						$trouve = 1;
    						break;
    					}
    				}

    				if ($trouve == 0) {
    					$valeur.='<div class="list" style="padding:0.5%;" onclick="selectionner('.$p->id.', \''.$p->nom.' '.$p->prenom.'\', \''.$p->matricule.'\', \''.$p->poste->libelle.'\', \''.$p->photo.'\')"><div class="row"><div class="col-md-2 col-lg-2 col-xs-2 text-center">'.$p->matricule.'</div><div class="col-md-6 col-lg-6 col-xs-6 text-center">'.$p->nom.' '.$p->prenom.'</div><div class="col-md-4 col-lg-4 col-xs-4 text-center">'.$p->poste->libelle.'</div></div></div>';
    				}
    			}

    			return $valeur;
			}

            if ($request->has('suppr')) {
                $h = Historiques::where('Uti_id', $request->input('suppr'))->first();

                if(!empty($h)){
                    $u = Utilisateur::where('id', $request->input('suppr'))->update(['statut' => -1]);
                }else{
                    $u = Utilisateur::where('id', $request->input('suppr'))->delete();
                }

                if($u == 1){
                    Historiques::create(['Uti_id' => session('user.id'), 'operation' => 'MODIFICATION', 'element' => 'Utilisateur']);
                }else{
                    return 0;
                }
            }

            $users = Utilisateur::with('personnel')->where('statut', '!=', -1)->get();
            return view('utilisateur', compact('users'))->renderSections()['content'];
    	}    	
    }

    function generateStrongPassword($length = 9, $add_dashes = false, $available_sets = 'luds'){
        $sets = array();
        if(strpos($available_sets, 'l') !== false)
            $sets[] = 'abcdefghjkmnpqrstuvwxyz';
        if(strpos($available_sets, 'u') !== false)
            $sets[] = 'ABCDEFGHJKMNPQRSTUVWXYZ';
        if(strpos($available_sets, 'd') !== false)
            $sets[] = '23456789';
        if(strpos($available_sets, 's') !== false)
            $sets[] = '!@#$%&*?';
        $all = '';
        $password = '';
        foreach($sets as $set)
        {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }
        $all = str_split($all);
        for($i = 0; $i < $length - count($sets); $i++)
            $password .= $all[array_rand($all)];
        $password = str_shuffle($password);
        if(!$add_dashes)
            return $password;
        $dash_len = floor(sqrt($length));
        $dash_str = '';
        while(strlen($password) > $dash_len)
        {
            $dash_str .= substr($password, 0, $dash_len) . '-';
            $password = substr($password, $dash_len);
        }
        $dash_str .= $password;
        return $dash_str;
    }
}
