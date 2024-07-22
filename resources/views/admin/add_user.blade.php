@extends('layouts.base')
@section('content')
<x-guest-layout>
<div class="container-fluid">
     <h2 class="text-center text-success">Ajout d'un nouveau utilisateur</h2>
    <form method="POST" action="{{ route('add_userdb') }}">
        @csrf

        <!-- Nom -->
        <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <input id="nom" class="block mt-1 w-full" type="text" name="nom"  required autofocus autocomplete="nom" />
            <x-input-error :messages="$errors->get('nom')" class="mt-2" />
        </div>


         <!-- Prenom -->
         <div>
            <x-input-label for="prenom" :value="__('Prenom')" />
            <input id="prenom" class="block mt-1 w-full" type="text" name="prenom"  required autofocus autocomplete="prenom" />
            <x-input-error :messages="$errors->get('prenom')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Mot de passe')" />

            <input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmation')" />

            <input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <!-- Rôle -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            {{-- <x-text-input id="role" class="block mt-1 w-full" type="role" name="role" :value="old('role')" required autocomplete="role" /> --}}
            <select id="role" class="block mt-1 w-full" type="role" name="role" :value="old('role')" required autocomplete="role">
                <option value="agent">agent</option>
                <option value="chef service">chef service</option>
                <option value="admin">Administrateur</option>
                <option value="chef service directeur">chef service directeur</option>
                <option value="chef service secretaire">chef service secretaire</option>
                <option value="agent secretaire">agent secretaire</option>
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
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>
</x-guest-layout>
@endsection
