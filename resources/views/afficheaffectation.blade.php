@extends('layouts.base')
@section('content')

    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex;justify-content:space-between; align-items:center;">
                <h3 class="m-0 font-weight-bold text-primary">Les affectations reçues</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  style="text-align:center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Date</th>
                            <th>Service origine</th>
                            <th>Fichier </th>
                            <th>instruction</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                           @foreach($affectations as $affectation)
                           <tr>
                                <td>{{ $affectation->date }}</td>
                                <td>{{ $affectation->id_service_origine}}</td>
                                <td>{{ $affectation->fichier }}</td>
                                <td>{{ $affectation->instruction }}</td>
                                <td>
                                    <div style="display:flex;justify-content:center;">
                                        <a class="btn btn-success mr-1" href="/storage/{{$affectation->fichier}}" download>Télécharger</a>
                                        @if (strpos(auth()->user()->role, 'secretaire'))

                                            <a class="btn btn-danger mr-1" href="{{route('archiver', ['id_courrier_arrivee'=>$affectation->id_courrier_arrivee])}}">Archiver</a>
                                        @endif

                                        <span class="dropdown">
                                            <a class="sidebar-link btn btn-warning" href="#" aria-expanded="false" href="" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"> Affecter</a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li><a class="dropdown-item sidebar-link" href="{{route('affecterservice',['id'=>$affectation->id, 'id_courrier_arrivee'=>$affectation->id_courrier_arrivee, 'id_service'=>$affectation->id_service_arrivee])}}">Service</a></li>
                                                <li><a class="dropdown-item sidebar-link" href="{{route('formulaire_affectation_service',  ['id_affectation' =>$affectation->id])}}">Agent</a></li>
                                            </ul>

                                        </span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="card shadow mt-5">
            <div class="card-header py-3" style="display:flex;justify-content:space-between; align-items:center;">
                <h3 class="m-0 font-weight-bold text-primary">Les affectations envoyées</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  style="text-align:center;" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Date</th>
                            <th>Service arrivée</th>
                            <th>Fichier </th>
                            <th>instruction</th>
                            <th>Actions</th>
                        </thead>

                        <tbody>
                           @foreach($mes_affectations as $mes_affectation)
                           <tr>
                                <td>{{ $mes_affectation->date }}</td>
                                <td>{{ $mes_affectation->id_service_arrivee}}</td>
                                <td>{{ $mes_affectation->fichier }}</td>
                                <td>{{ $mes_affectation->instruction }}</td>
                                <td>
                                        <a class="btn btn-success mr-1" href="/storage/{{$mes_affectation->fichier}}" download>Télécharger</a>
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


