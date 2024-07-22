<?php

namespace App\Http\Controllers;
use App\Models\CourrierArrivee;
use App\Models\CourrierDepart;
use App\Models\Service;
use App\Models\User;
use App\Models\Affectation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\Models\Traitement;





class NavController extends Controller
{
    public function index(){                               //pour afficher le dashboard
        return view('dashboard')->name('dashboard');
    }



    public function show($type){                            // pour afficher la page du formulaire d'enregistrer des courriers
        return view('save', ['type' => $type]);

    }



     public function save(Request $request, $type){         // pour enrégistre les informations reçues du formulaire d'enreg dans la base

        // Vérifiez que le fichier est présent dans la requête
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Validez l'extension du fichier
            $allowedExtensions = ['pdf', 'docx'];
            if (!in_array($file->extension(), $allowedExtensions)) {
                return back()->withErrors(['avatar' => 'Seuls les fichiers PDF et DOCX sont autorisés.']);
            }

            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('dossier', $filename, 'public');

           if($type == 'arrivee'){
            $courrier = CourrierArrivee::create([
                'date_ajout' => $request->date_ajout,
                'date_recu'  => $request->date_recu,
                'expediteur' => $request->expediteur,
                'fichier'    => $path,
                'objet'      => $request->objet,
            ]);
           }
           else{
            $courrier = CourrierDepart::create([
                'date_depart' => $request->date_ajout,
                'destinataire' => $request->destinataire,
                'fichier'    => $path,
                'objet'      => $request->objet,
                'status'       => 'archivé'
            ]);
           }

           toaster()->add('Add message here');
            return view('save', ['status'=>'Enrégistrement effectué avec succès', 'type' =>$type]);
        }
        else
        {
            return back()->withErrors(['avatar' => 'Le fichier est requis.']);
        }
    }

    public function courrier_arrivee(){                    // pour afficher les courriers arrivées depuis la base
        $courriers= CourrierArrivee::orderBy('created_at', 'desc')->get();
        return view('courrier_arrivee', ['courriers'=> $courriers]);
    }

    public function courrier_depart(){                    // pour afficher les courriers arrivées
        $courriers= CourrierDepart::orderBy('created_at', 'desc')->get();
        return view('courrier_depart', ['courriers'=> $courriers]);
    }

    public function showaffectation($id){

        $services = Service::all();
        /* foreach($services as $service)
        {
            echo "$service";
        } */
        $users = User::all();


        return view ('affecteragent', ['id'=>$id,'services'=> $services, 'users'=>$users]);
    }

    public function affecter (Request $request, $id){

        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Validez l'extension du fichier
            $allowedExtensions = ['pdf', 'docx'];
            if (!in_array($file->extension(), $allowedExtensions)) {
                return back()->withErrors(['avatar' => 'Seuls les fichiers PDF et DOCX sont autorisés.']);
            }

            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('dossieraffectation', $filename, 'public');
        }else{
            $path=null;
        }
            $services = Service::all();

            $courrier = Affectation::create([
                'date' => $request->date,
                'id_service_arrivee'  => $request->idservice,
                'id_service_origine'  => $request->user()->id_service,
                'id_courrier_arrivee' => $id,
                'fichier'    => $path,
                'instruction' => $request->instruction,

            ]);

            return redirect()->back()->with('success', 'Affectation éffectuer avec succès.');
        }


        public function searcharrive(){
        $search= CourrierArrivee::orderBy('date_ajout', 'desc')->get();
        return view ('recherchercourrierarrivee',  ['search'=> $search]);
    }


    public function searchdepart(){
        $search= CourrierDepart::orderBy('date_depart', 'desc')->get();
        return view ('recherchercourrierdepart',  ['search'=> $search]);
    }

    public function afficheaffectation(){

        $affectations = Affectation::where('id_service_arrivee', auth()->user()->id_service)->get();

        $mes_affectations = Affectation::where('id_service_origine', auth()->user()->id_service)->get();
        // foreach($affectations as  $affectation){
        //     $service_arrivee= User::find($affectation->id_service_arrivee);
        //     $affectation->service_arrivee = $service_arrivee->service;
        //     $service_origine= User::find($affectation->id_service_origine);
        //     $affectation->service_origine = $service_origine->service;
        // }
        // foreach($mes_affectations as  $mes_affectation){
        //     $service_arrivee= User::find($affectation->id_service_arrivee);
        //     $mes_affectation->service_arrivee = $service_arrivee->service;
        //     $service_origine= User::find($mes_affectation->id_service_origine);
        //     $mes_affectation->service_origine = $service_origine->service;
        // }
        return view ('afficheaffectation', ['affectations'=>$affectations, 'mes_affectations'=>$mes_affectations]);
    }

    public function showaffectationagent ($id_affectation, $id_service){


        $users= User::all();

        return view ('affecteragent', ['id_affectation'=>$id_affectation, 'id_service'=>$id_service, 'users'=>$users]);

    }
    public function afficher_formulaire($id_affectation){
        $users = User::where('id_service', auth()->user()->id_service)->get();
        return view('formulaire_affectation_service', ['id_affectation'=>$id_affectation, 'users'=>$users]);
    }

    public function affectationagent (Request $request, $id_affectation){
        if ($request->hasFile('avatar')) {
            $file = $request->file('avatar');

            // Validez l'extension du fichier
            $allowedExtensions = ['pdf', 'docx'];
            if (!in_array($file->extension(), $allowedExtensions)) {
                return back()->withErrors(['avatar' => 'Seuls les fichiers PDF et DOCX sont autorisés.']);
            }

            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('dossieraffectation', $filename, 'public');
        }else{
            $path=null;
        }


            $traitement = Traitement::create([
                'date' => $request->date,
                'id_affectation' => $id_affectation,
                'id_user' =>$request->nom,
                'id_user_origine' =>auth()->user()->id,
                'fichier'=>$path,
                'commentaire' => $request->commentaire,
            ]);
            return redirect()->back()->with('success', 'Affectation éffectuer avec succès.');
    }

    public function showtraitement(){

        if(auth()->user()->role == 'agent'){
            $traitements = Traitement::where('id_user', auth()->user()->id)->get();
        }

        elseif(auth()->user()->role == 'chef service'){
            $traitements = Traitement::where('id_user', auth()->user()->id)->orWhere('id_user_origine', auth()->user()->id)->get();
        }
        else{
            $traitements = Traitement::all();
        }



            foreach($traitements as $traitement){
                $user_reçu = User::find($traitement->id_user);
                //dd($user_reçu);

                $user_origine = User::find($traitement->id_user_origine);
                $traitement->id_user = $user_reçu->nom. " ".$user_reçu->prenom ;

                 $traitement->id_user_origine = $user_origine->nom." ".$user_origine->prenom;

            }

            return view('affichetraitement', ['traitements'=>$traitements]);


    }
    public function showaffecterexistantservice($id, $id_courrier_arrivee, $id_service){

        $services= Service::all();
        $affectations = Affectation::all();
        return view ('affecterservice', ['id'=>$id, 'id_courrier_arrivee'=>$id_courrier_arrivee , 'id_service'=>$id_service, 'affectations'=>$affectations, 'services'=>$services]);
    }
    public  function affecterexistantservice(Request $request, $id , $id_courrier_arrivee, $id_service){


        if ($request->hasFile('avatar')) {

            $file = $request->file('avatar');

            // Validez l'extension du fichier
            $allowedExtensions = ['pdf', 'docx'];
            if (!in_array($file->extension(), $allowedExtensions)) {
                return back()->withErrors(['avatar' => 'Seuls les fichiers PDF et DOCX sont autorisés.']);
            }

            $filename = time().'.'.$file->getClientOriginalExtension();
            $path = $file->storeAs('dossieraffectation', $filename, 'public');
         }else{
            $path=null;
        }


        // $id_service = Service::find($id_service);
        // dd($request->user()->id_service);
         $services= Service::all();

            $affectations = Affectation::create([
            'id_service_origine'=>$id_service,
            'id_service_arrivee'=>$request->idservice,
            'id_courrier_arrivee'=>$id_courrier_arrivee,
            'fichier'=>$path,
            'date'=>$request->date,
            'instruction'=>$request->instruction,
        ]);
        return redirect()->back()->with('success', 'Courrier affecter au service avec succès.');
    }

    // ExempleController.php


    public function archiver($id_courrier_arrivee){

            $courrier = CourrierArrivee::find($id_courrier_arrivee);
            $courrier->status = 'archivé';
            $courrier->save();
            return redirect()->back()->with('success', 'Courrier archivé avec succès.');
    }

    public function afficher_archives(){
        $courrier_arrivee_archives = CourrierArrivee::where('status', 'archivé')->get();
        $courrier_depart_archives = CourrierDepart::where('status', 'archivé')->get();
        return view('archives',[
            'courrier_arrivee_archives'=>$courrier_arrivee_archives,
            'courrier_depart_archives'=>$courrier_depart_archives,
            ]
         );
    }
}


