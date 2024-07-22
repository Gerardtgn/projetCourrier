@extends('layouts.base')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex;justify-content:space-between; align-items:center;">
                <h3 class="m-0 font-weight-bold text-primary">Liste des courriers départs</h3>
            </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date départ</th>
                                <th>Destinataire</th>
                                <th>Chemin fichier</th>
                                <th>Objet</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Date départ</th>
                            <th>Destinataire</th>
                            <th>Chemin fichier</th>
                            <th>Objet</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                           @foreach($search as $item)
                           <tr>
                                <td>{{ $item->date_depart }}</td>
                                <td>{{ $item->destinataire }}</td>
                                <td>{{ $item->fichier }}</td>
                                <td>{{ $item->objet }}</td>
                                <td>{{ $item->status }}</td>
                                <td><a class="btn btn-success" href="#">Télécharger</a> </td>                   
                            </td>
                            </tr>
                            @endforeach
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
