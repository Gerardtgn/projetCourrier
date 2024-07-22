
@extends('layouts.base')

@section('content')
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
                  <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
                      <div style="display:flex;justify-content:center;">
                      <div class="container-fluid">

                        <h4>Affecter un courrier</h4>
                        <form method="POST"  action="{{route('affectation', ['id' =>$id])}}" enctype="multipart/form-data">
                            @csrf
                            <!-- date_recu -->
                            <div>
                                    <x-input-label for="date" :value="__('Date affectation')" />
                                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"  />
                                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                                </div><br>

                            <div>
                            <x-input-label for="idservice" :value="__('Service')" />
                            {{-- <x-text-input id="idservice" class="block mt-1 w-full" type="idservice" name="idservice" :value="old('idservice')" required autocomplete="idservice" /> --}}
                            <select id="idservice" class="block mt-1 w-full" type="service" name="idservice" :value="old('idservice')" required autocomplete="idservice">
                                @foreach($services as $service)
                                <option value="{{$service->id }}">{{$service->service }}</option>
                                @endforeach
                            </select>

                            <input type="hidden" value="{{$id}}" name='idcourrier'>

                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                            </div><br>

                            <!-- instruction -->
                            <div>
                                <x-input-label for="instruction" :value="__('Instruction')" />
                                <textarea id="instruction" class="block mt-1 w-full" type="text" name="instruction" rows="2"></textarea>
                                <x-input-error :messages="$errors->get('instruction')" class="mt-2" />
                            </div><br>


                            <!-- fichier -->
                            <div>
                                <button>
                                <input type="file" id="avatar" name="avatar"/>
                                <x-input-error :messages="$errors->get('avatar')"  />
                                </button>
                            </div><br>
                                <x-primary-button class="ms-4">
                                    {{ __('Enregistrer') }}
                                </x-primary-button>
                            </div>
                        </form>

                        </div>
                      </div>
                  </div>
              </div>




@endsection
