@extends('layouts.base')
@section('content')
<div class="container-fluid">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="display:flex; justify-content:space-between; align-items:center;">
                <h1 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase;">Liste des utilisateurs du système</h1>
                <a href="{{route('add_user')}}" class="btn btn-primary"><i class="fas fa-user-plus"></i> Ajouter</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>email</th>
                                <th>Service</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                       <tbody>
                        @foreach ($users as $key=>$user)
                            <tr>

                                <th>{{$user->nom}}</th>
                                <th>{{$user->prenom}}</th>
                                <th>{{$user->email}}</th>
                                <th>{{$user->service}}</th>
                                <th>{{$user->role}}</th>
                                <th>
                                   <div style="display:flex;">
                                    <form action="{{route('update_user')}}" method="post">
                                        @csrf
                                        <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                        <button class="btn btn-success mr-1">Modifier</button>
                                    </form>
                                    <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$key}}">
                                    Supprimer
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{$key}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Suppression de {{$user->nom}}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        Voulez vous vraiment supprimer cet utilisateur?
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Non</button>
                                        <form action="{{route('delete_user')}}" method="post">
                                            @csrf
                                            <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                            <button class="btn btn-danger">Supprimer</button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>

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
