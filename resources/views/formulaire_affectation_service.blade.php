@extends('layouts.base')
@section('content')


    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            <div style="display:flex;justify-content:center;">
                <div class="container-fluid">
                    <h2 class="text-center">Affecter un courrier à un agent </h2>
                    <form method="POST" action="{{route('traitement_agent_service', ['id_affectation'=>$id_affectation])}}" enctype="multipart/form-data">
                        @csrf
                        <!-- date_recu -->

                            <div class='mb-1'>
                                <x-input-label for="date" :value="__('Date affectation')" />
                                <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                                <x-input-error :messages="$errors->get('date')" class="mt-2" />
                            </div><br>

                            <div>
                                <x-input-label for="nom" :value="__('Nom et prenoms')" />
                                <select id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autocomplete="nom">
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->nom }} {{$user->prenom }}</option>
                                    @endforeach
                                </select>
                            </div><br>

                            <div class='mb-1'>
                                <x-input-label for="commentaire" :value="__('commentaire')" />
                                <textarea name="commentaire" id="commentaire"></textarea>
                                <x-input-error :messages="$errors->get('commentaire')" class="mt-2" />
                            </div><br>



                        <!-- fichier -->
                        <div>
                            <button>
                            <input type="file" id="avatar" name="avatar"/>
                            <x-input-error :messages="$errors->get('avatar')"  />
                            </button>
                        </div><br>


                            <x-primary-button class="ms-4 btn btn-primary">
                                {{ __('Affecter') }}
                            </x-primary-button>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
