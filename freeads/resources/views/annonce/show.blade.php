@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(isset($annonce))
                        
                            <h3 name="name_annonce">Nom de l'annonce : {{ $annonce->name }}</h4>
                            <h6>Date :{{$annonce->created_at}}</h6>
                            <h5>Description : {{$annonce->content}}</h5>
                            @if(isset($image))
                                @foreach($image as $img)
                                    <img src="/images/{{$img->url_image}}" alt="">
                                @endforeach
                            @endif
                            <h4>Prix : {{$annonce->price}} Euro</h4>

                    
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection