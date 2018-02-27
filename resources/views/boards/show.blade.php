@extends('layouts.app')

@section('content')
<div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 240 }' >
    @if(count($board->cards) > 0)
    @foreach($board->cards as $card)
    <div class="grid-item">
     <div class=" panel panel-primary" id="wrap">
        <div class="panel-heading i-father">
            <span class="head-title">{{ $card->name }}</span>
            <div class="dropdown" style="display:inline;float:right">
                
                <a href="#" style="color:white;" class="i-hidden" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-cog pull-right " style="margin-top: 5px;"></i></a>
                
                <ul class="dropdown-menu" style="left: -65px;" aria-labelledby="dropdownMenu1">
                    <li><a href="/cards/{{ $card->id }}/edit"><i class="fas fa-pencil-alt"></i> Modify</a></li>
                    <li>
                        <a href="#" onclick="createSite({{$card->id}}, {{$board->id}})" data-toggle="modal" data-target="#newSite"><i class="fas fa-plus"></i> Add website</a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" onclick="
                            var result= confirm('Are you sure you wish to delete the Card?');
                            if(result){
                            event.preventDefault();
                            document.getElementById('delete-{{$card->id}}-form').submit();
                            }">
                                <span class="text-danger"><i class="fas fa-trash"></i>  Delete</span> 
                        </a>
                        <form id="delete-{{$card->id}}-form" action="{{ route('cards.destroy',[$card->id]) }}"
                            method="POST" style="display:none">
                        <input type="hidden" name="_method" value="delete"/>
                        {{ csrf_field() }}
                        </form> 
                    </li>
                </ul>
            </div>
        </div>
        @if(count($card->sites) > 0)
        <div class="panel-body">
            <div id="TODO" class="kanban-centered">
                <div class="list-group list-unstyled">
                    @foreach($card->sites as $site)
                    <div class="sItem i-father"  title="{{ $site->description }}">
                        <div class="dropdown" style="display:inline;float:right">
                            <a href="#" class="i-hidden"  id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-ellipsis-h pull-right" style="margin-top:2px;"></i></a>
                
                            <ul class="dropdown-menu" style="left: -65px;" aria-labelledby="dropdownMenu2">
                                <li>
                                    <a href="/sites/{{ $site->id }}/edit"><i class="fas fa-pencil-alt"></i> Modify</a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#" onclick="
                                    var result= confirm('Are you sure you wish to delete the site?');
                                    if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-{{$site->id}}-form').submit();
                                    }">
                                        <span class="text-danger"><i class="fas fa-trash"></i>  Delete</span> 
                                    </a>
                                        <form id="delete-{{$site->id}}-form" action="{{ route('sites.destroy',[$site->id]) }}"
                                            method="POST" style="display:none">
                                        <input type="hidden" name="_method" value="delete"/>
                                        {{ csrf_field() }}
                                        </form> 
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <a href="http://{{ $site->url }}" target="_blank">
                                
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
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
        @if(count($card->sites) === 0)
        <div class="panel-footer" >
            <a href="#" onclick="createSite({{$card->id}}, {{$board->id}})" data-toggle="modal" data-target="#newSite">Add a site...</a>
        </div>
        @endif
     </div>
    </div>
    @endforeach
    @endif
</div>

     {{--  <!-- Modal new site-->  --}}
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

    <script src="https://npmcdn.com/masonry-layout@4.1/dist/masonry.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var msnry = new Masonry( elem, {
        // options
        itemSelector: '.grid-item',
        columnWidth: 200
        });

        // element argument can be a selector string
        //   for an individual element
        var msnry = new Masonry( '.grid', {
        // options
        });
    </script>
@endsection