@extends('layouts.base1')
@section('content')

<div class="container-fluid">
    <div class="brand-logo d-flex align-items-center justify-content-center">

        <img src="{{ asset('images/profile/poster.png') }}" width="100" height="100" alt=""/><br>

    </div>
            <h3 class="text-center">Affecter un courrier à un agent</h3>

     <form method="POST" action="{{route('affecteragent1', ['id_affectation' =>$id] )}}" enctype="multipart/form-data">
         @csrf
           <!-- date_recu -->
            <div>
                 <x-input-label for="date" :value="__('Date affectation')" />
                 <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                 <x-input-error :messages="$errors->get('date')" class="mt-2" />
             </div><br>

            <div>
            <x-input-label for="nom" :value="__('Nom')" />
            <select id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autocomplete="nom">
                @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->nom }} {{$user->prenom }}</option>
                @endforeach
            </select>
            </div><br>

            <div>
             <button>
             <input type="file" id="avatar" name="avatar"/>
             <x-input-error :messages="$errors->get('avatar')"  />
             </button>
            </div><br>

            <div>
                 <x-input-label for="commentaire" :value="__('commentaire')" />
                 <x-text-input id="commentaire" class="block mt-1 w-full" type="text" name="commentaire"  />
                 <x-input-error :messages="$errors->get('text')" class="mt-2" />
             </div><br>














         <!-- instruction -->



         <!-- fichier -->
             <x-primary-button class="ms-4 btn btn-primary">
                 {{ __('Enregistrer') }}
             </x-primary-button>
         </div>
</form>

    </div>

@endsection

