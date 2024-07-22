@extends('layouts.base')
@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
                <h3 class="m-0 font-weight-bold text-primary">Archives des courriers arrivés</h3>
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
                        @foreach ($courrier_arrivee_archives as $key=>$courrier_arrivee_archive)
                            <tr>
                                <th>{{$courrier_arrivee_archive->date_recu}}</th>
                                <th>{{$courrier_arrivee_archive->date_ajout}}</th>
                                <th>{{$courrier_arrivee_archive->expediteur}}</th>
                                <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier_arrivee_archive->fichier}}</span></th>
                                <th>{{$courrier_arrivee_archive->objet}}</th>
                                <th>{{$courrier_arrivee_archive->status}}</th>
                                <th>
                                <div style="display:flex;justify-content:center;">
                                    <a href="/storage/{{$courrier_arrivee_archive->fichier}}" download class="btn btn-success">Télécharger</a>
                                </div>
                                </th>
                            </tr>
                        @endforeach

                       </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
                <h3 class="m-0 font-weight-bold text-primary">Archives des courriers départ</h3>
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

                        @foreach ($courrier_depart_archives as $key=>$courrier_depart_archive)
                        <tr>
                            <th>{{$courrier_depart_archive->date_depart}}</th>
                            <th>{{$courrier_depart_archive->destinataire}}</th>
                            <th>{{$courrier_depart_archive->objet}}</th>
                            <th><i class="fas fa-file-pdf text-danger" style="font-size:20px;"></i><span>{{$courrier_depart_archive->fichier}}</span></th>
                            <th>{{$courrier_depart_archive->status}}</th>
                            <th>
                            <div style="display:flex;justify-content:center;">
                                <a href="/storage/{{$courrier_depart_archive->fichier}}" download class="btn btn-success">Télécharger</a>
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
