@extends('layouts.app')

@section('content')
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
    @if(count($board->cards) > 0)
    @foreach($board->cards as $card)
     <div class="panel panel-primary kanban-col">
        <div class="panel-heading i-father">
            <span class="head-title">{{ $card->name }} </span>
            <a href="#" style="color:white;" class="i-hidden"><i class="fa fa-cog pull-right " style="margin-top: 5px;"></i></a>
        </div>
        @if(count($card->sites) > 0)
        <div class="panel-body">
            <div id="TODO" class="kanban-centered">
                <ol class="list-unstyled">
                    @foreach($card->sites as $site)
                    <li class="" title="{{ $site->description }}">
                        <a href="http://{{ $site->url }}" target="_blank" >
                            <div class="img-wrap">
                            <span></span>
                            <img src="{{ $site->logo }}" class="img-circle" />
                            </div>
                                {{ $site->name }}
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        @endif
        <div class="panel-footer">
            <a href="#">Add a site...</a>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection