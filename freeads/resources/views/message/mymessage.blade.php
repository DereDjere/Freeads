@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="height: 700px;">
        <div class="col-md-2 border border-primary rounded" style="overflow:scroll;">
            @if(isset($users))
            @foreach($users as $user)
            <p>{{ link_to_route('message.show', $user->name,[$user->id], ['class'=>'btn btn-primary']) }}</p>
            @endforeach
            @endif
        </div>
        <div class="col-md-8 border border-primary rounded" style="background-color: white; overflow:scroll;">
            @if(isset($detail))
                @foreach($detail as $message)
                    @if($message->sender_id == Auth::user()->id)
                        <p class="bg-primary text-white">{{ $message->content }}</p>
                    @endif
                @endforeach
                @foreach($detail_sender as $message_receveir)
                    @if($message_receveir->sender_id == $current_id)
                        <p class="bg-success text-white">{{ $message_receveir->content }}</p>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    <div class="row justify-content-center bg-light">
        <div class="col-md-2 ">

        </div>
        <div class="col-md-8 border border-primary rounded">
            <form action="{{ route('message.store')}}" method="post">
                @csrf
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="message_send">
                    <div class="input-group-prepend">
                        <input type="submit" value="Envoyer" class="input-group-text" id="inputGroup-sizing-lg">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection