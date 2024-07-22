@extends('layouts.base')
@section('content')
<x-guest-layout>
<div class="container-fluid">
    Ajouter un nouveau service.
    <form action="{{route('add_servicedb')}}" method="POST">
        @csrf
        <label for="service">Saisissez le nom du service</label>
        <input class="form-control" type="text" id="service" name="service">
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
</x-guest-layout>
@endsection
