@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Mes Annonce') }}</div>
                <div class="card-body">
                    @if(isset($alert))
                    <p>{{ $alert }}</p>
                    @endif

                    <div class="col-md-8 offset-md-0">
                        <p>Nom de l'annonce</p>
                        @if(isset($annonces))
                        @foreach ($annonces as $annonce)
                        <div style='display:flex'>
                            <p name="name_annonce">{{ $annonce->name }} &nbsp;&nbsp;&nbsp; {{$annonce->created_at}} {{ link_to_route('myannonce.edit', 'Modifier',[$annonce->id], ['class'=>'btn btn-primary']) }}</p>
                                <form action="{{ route('myannonce.destroy', $annonce->id)}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}
                                    <input class="btn btn-danger" type="submit" value="Supprimer" />
                                </form>
                        </div>


                        @endforeach
                        @endif
                        <form action="myannonce/create" method="get">
                            <button type="submit" class="btn btn-primary" style="margin-top:40px">
                                {{ __('Ajouter une annonce') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection