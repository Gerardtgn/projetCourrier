
@extends('layouts.base')
@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900" >
    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div style="display:flex;justify-content:center;">
        <div class="container-fluid">

            <h3>Formulaire enregistrement nouveau courrier {{$type}}</h3>
            <form method="POST" action="{{route('enregistrementCourrier', ['type' =>$type])}}" enctype="multipart/form-data">
                @csrf

                <!-- date_ajout -->
                <div>
                    <x-input-label for="date_ajout" :value="__('Date enregistrement')" />
                    <x-text-input id="date_ajout" class="block mt-1 w-full" type="date" name="date_ajout"  />
                    <x-input-error :messages="$errors->get('date_ajout')" class="mt-2" />
                </div>

                <!-- date_recu -->
                @if ($type == 'arrivee')
                    <div>
                        <x-input-label for="date_recu" :value="__('Date de réception du document')" />
                        <x-text-input id="date_recu" class="block mt-1 w-full" type="date" name="date_recu"  />
                        <x-input-error :messages="$errors->get('date_recu')" class="mt-2" />
                    </div>
                @endif

                <!-- expéditeur ou destinataire -->
                @if ($type == 'arrivee')
                    <div>
                        <x-input-label for="expediteur" :value="__('Expediteur')" />
                        <x-text-input id="expediteur" class="block mt-1 w-full" type="text" name="expediteur"  />
                        <x-input-error :messages="$errors->get('expediteur')" class="mt-2" />
                    </div>
                @else
                    <div>
                        <x-input-label for="destinataire" :value="__('Destinataire')" />
                        <x-text-input id="destinataire" class="block mt-1 w-full" type="text" name="destinataire"  />
                        <x-input-error :messages="$errors->get('destinataire')" class="mt-2" />
                    </div>
                @endif

                <!-- objet -->
                <div>
                    <x-input-label for="objet" :value="__('Motif')" />
                    <textarea id="objet" class="block mt-1 w-full" type="text" name="objet" rows="2"></textarea>
                    <x-input-error :messages="$errors->get('objet')" class="mt-2" />
                </div>
                <br>


                <!-- fichier -->
                <div>
                    <button>
                    <input type="file" id="avatar" name="avatar"/>
                    <x-input-error :messages="$errors->get('avatar')"  />
                    </button>
                </div>
                <br>
                    <button type="submit" class="ms-4 btn btn-primary">
                        {{ __('Enregistrer') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
