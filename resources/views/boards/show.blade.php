@extends('layouts.app')

@section('content')
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" >
    @if(count($board->cards) > 0)
    @foreach($board->cards as $card)
     <div class="panel panel-primary kanban-col" id="wrap">
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
                            @if(isset($site->logo))
                            <img src="{{ $site->logo }}" class="img-circle" />
                            @else
                            <i class="fa fa-compass"></i>
                            @endif
                            </div>
                                {{ $site->name }}
                        </a>
                    </li>
                    @endforeach
                </ol>
            </div>
        </div>
        @endif
        <div class="panel-footer" >
            <a href="#" onclick="create({{$card->id}}, {{$board->id}})" data-toggle="modal" data-target="#newSite">Add a site...</a>
        </div>
    </div>
    @endforeach
    @endif
     <!-- Modal -->
        <div class="modal fade" id="newSite" tabindex="-1" role="dialog" aria-labelledby="siteLabel" aria-hidden="true">
        <div class="container">
            <div class="row">
            <div class="col-sm-6 col-sm-offset-3" style="padding-top:100px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <form method="post" action="{{ route('sites.store') }}">
                {{ csrf_field() }}

                    <input type="hidden" id="card_id" name="card_id" value='' />
                    <input type="hidden" id="board_id" name="board_id" value='' />

                    <div class="form-group">
                        <label for="site-name">Name<span class="required"></span></label>
                        <input placeholder="Enter name" 
                            id="board-name" 
                            required 
                            name="name" 
                            spellcheck="false"
                            class="form-control"
                            />
                    </div>

                    <div class="form-group">
                        <label for="site-url">Url</label>
                        <input placeholder="Enter Url" 
                            id="site-url" 
                            name="url" 
                            spellcheck="false"
                            class="form-control"
                            />
                    </div>
                     <div class="form-group">
                        <label for="site-logo">Logo</label>
                        <input placeholder="Enter Logo Url" 
                            id="site-logo" 
                            name="logo" 
                            spellcheck="false"
                            class="form-control"
                            />
                    </div>

                    

                    <div class="form-group">
                        <label for="site-content">Description</label>
                        <textarea placeholder="Enter description" 
                            style="resize: vertical"
                            id="board-content"  
                            name="description" 
                            rows="5"
                            spellcheck="false"
                            class="form-control autosize-target text-left">
                            </textarea>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary pull-right" style="margin-bottom:5px;" value="Submit"/>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
</div>
@endsection