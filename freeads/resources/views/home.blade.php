@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-top:25%">
        <div class="col-md-10">
            @if(isset($all_annonce))
            @foreach($all_annonce as $annonce)
            <div class="border border-secondary">
                <p class="d-inline p-2">Nom de l'annonce : {{ $annonce->name }}</p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <p class="d-inline p-2">Date de l'annonce : {{ $annonce->created_at }}</p>
                <p class="d-inline p-2">Description : {{ $annonce->content }}</p>
                <a href="{{route('annonce.show', $annonce->id)}}" class="btn btn-primary">Voir l'annonce</a>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>
@endsection