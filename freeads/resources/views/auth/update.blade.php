@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mon compte</div>

                <div class="card-body">
                    @if(isset($message))
                       <p> {{ $message }} </p>
                    @endif
                    <form method="POST" action="{{ route('update') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Votre Nom :</label>
                                <input id="name" type="tet" class="form-control @error('email') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="name">Votre Email :</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="password">Nouveau Mot de passe</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-0">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifier') }}
                                </button>
                                <form action="" method="post">
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Supprimer son compte') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection