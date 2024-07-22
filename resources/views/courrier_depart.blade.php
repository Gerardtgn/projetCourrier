@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex; justify-content:space-between;">
                <h3 class="m-0 font-weight-bold text-primary">Liste des Courriers départ</h3>
                <a href="{{route('enregistrementCourrier', ['type' => 'depart'])}}" class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>

                                <th>Date départ</th>
                                <th>Destinataire</th>
                                <th>Objet</th>
                                <th>Fichier</th>
                                <th>status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>

                        @foreach ($courriers as $key=>$courrier)
                        <tr>
                            <th>{{$courrier->date_depart}}</th>
                            <th>{{$courrier->destinataire}}</th>
                            <th>{{$courrier->objet}}</th>
                            <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier->fichier}}</span></th>
                            <th>{{$courrier->status}}</th>
                            <th>
                            <div style="display:flex;justify-content:center;">
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
