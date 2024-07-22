@extends('layouts.base')
@section('content')
Supprimmer un utilisateur

<form action="">
    <label for="nom">Saisissez le nom de l'utilisateur</label>
    <input class="form-control" type="text" id="nom" name="nom">
    <button type="submit" class="btn btn-primary">Supprimmer</button>
</form>
@endsection
