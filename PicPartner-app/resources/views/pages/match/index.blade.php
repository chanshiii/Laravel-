@extends('layouts.app')

@section('content')
<div class="p-match-index">
    <div class="container">
        <div class="row">
            @foreach ($matchedUsers as $matchedUser)
                <div class="col-md-12 nb-3">
                    <img src="{{ asset($matchedUser->toUser->img_url) }}" class="rounded-circle" style="height:70px; width:70px; object-fit:cover;">
                    <a href="{{ route('home') }}" class="stretched-link ml-3" style="font-size:16px">
                        {{ $matchedUser->toUser->name }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
