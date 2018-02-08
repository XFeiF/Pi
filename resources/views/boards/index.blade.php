@extends('layouts.app')

@section('content')
<link href="{{ asset('css/boards.css') }}" rel="stylesheet">
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    @foreach($boards as $board)
    <div class="col-sm-6 col-lg-6 col-xs-6 col-md-6">
        <div class="bs-calltoaction bs-calltoaction-info">
            <div class="row">
                <div class="col-md-6 cta-contents">
                    <h2 class="cta-title">{{ $board->name }}</h2>
                    <div class="cta-desc">
                    @isset($board->description)
                    <p>{{ $board->description }} </p>
                    @endisset
                    {{--  @foreach($board->cards as $card)
                        @if($loop->index<3)
                        <p>{{ $card->name }}</p>
                        @endif
                    @endforeach  --}}

                    </div>
                </div>
                <div class="col-md-3 cta-button">
                    <a href="/boards/{{ $board->id }}" class="btn btn-lg btn-block btn-info">Detail <i class="fa fa-arrow-right"></i></a>
                </div>
                </div>
        </div>
    </div>
    @endforeach
</div>

@endsection