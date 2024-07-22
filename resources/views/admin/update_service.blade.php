@extends('layouts.base')
@section('content')
<x-guest-layout>
<div class="container-fluid">
    Modifier un  service.
    <form action="{{route('update_servicedb')}}" method="POST">
        @csrf
        <div>
            <label for="id">ID</label>
            <input class="form-control" type="text" value="{{$service->id}}" disabled>
        </div>
        <div>
            <label for="service">Modifier le nom du service</label>
            <input class="form-control" type="text" id="service" value="{{$service->service}}"  name="service">
        </div>
        <input type="hidden" id="id" value="{{$service->id}}" name="id">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
</div>
</x-guest-layout>
@endsection
