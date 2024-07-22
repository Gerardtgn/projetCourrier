@extends('layouts.base')
@section('content')
<x-guest-layout>
<div class="container-fluid">
     <h2 class="text-center text-success">Modifier les informations d'un utilisateur</h2>
    <form action="{{route('update_userdb')}}" method="POST">
        @csrf
        <div>
            <label for="id">ID</label>
            <input class="form-control" type="text"  disabled>
        </div>
        <div>
            <label for="service">Modifier le nom du service</label>
            <input class="form-control" type="text" id="service"   name="service">
        </div>
        <input type="hidden" id="id"  name="id">
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    {{-- <form method="POST" action="{{route('update_userdb')}}">
        @csrf
        <input type="hidden" id="id" name="id" value="">
        <button class="btn btn-success">Modifier</button> --}}
        <!-- ID -->
        {{-- <div>
            <x-input-label for="id" :value="__('ID')" />
            <input id="id" class="block mt-1 w-full" type="text" name="id" value="{{$user->id}}"   required autofocus disabled/>
        </div>

        <!-- Nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <input id="nom" class="block mt-1 w-full" type="text" name="nom" value="{{$user->nom}}"  required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>


         <!-- Prenom -->
         <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <input id="prenom" class="block mt-1 w-full" type="text" name="prenom" value="{{$user->prenom}}"  required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmation')" />

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation"/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!-- Rôle -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" class="block mt-1 w-full" type="role" name="role" :value="old('role')" required autocomplete="role">
                <option value="agent">agent</option>
                <option value="chef service">chef service</option>
                <option value="admin">Administrateur</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Service -->
        <div class="mt-4">

             <select id="service" class="block mt-1 w-full" type="service" name="service" :value="old('service')" required autocomplete="service">
                @foreach ($services as $service)
                    <option value="{{$service->id}}">{{$service->service}}</option>
                @endforeach

            </select>
            <x-input-error :messages="$errors->get('serice')" class="mt-2" />
        </div> --}}
{{--
        <div class="flex items-center justify-end mt-4">

            <button type="submit" class="ms-4 btn btn-primary">
                Mettre à jour
            </button>
        </div>
    </form>--}}
</div>
</x-guest-layout>
@endsection
