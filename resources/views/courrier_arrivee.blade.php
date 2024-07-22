@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex; justify-content:space-between;">
                <h3 class="m-0 font-weight-bold text-primary">Liste des Courriers arrivées</h3>
                <a href="{{route('enregistrementCourrier', ['type' => 'arrivee'])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date Arrivée</th>
                                <th>Date enregistrement</th>
                                <th>Expéditeur</th>
                                <th>Fichier</th>
                                <th>Objet</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($courriers as $key=>$courrier)
                            <tr>
                                <th>{{$courrier->date_recu}}</th>
                                <th>{{$courrier->date_ajout}}</th>
                                <th>{{$courrier->expediteur}}</th>
                                <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier->fichier}}</span></th>
                                <th>{{$courrier->objet}}</th>
                                <th>{{$courrier->status}}</th>
                                <th>
                                <div style="display:flex;justify-content:center;">
                                    <a class="btn btn-primary mr-1" href="{{route('affectation',['id'=>$courrier->id])}}"> Affecter</a>
                                    <a href="/storage/{{$courrier->fichier}}" download class="btn btn-success">Télécharger</a>
                                </div>
                                </th>
                            </tr>
                        @endforeach

                       </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
