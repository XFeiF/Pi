@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-offset-1">
        <h1> Create New Card</h1>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background:white; margin:10px;">
            <form method="post" action="{{ route('cards.store') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="card-name">Name<span class="required"></span></label>
                    <input placeholder="Enter name" 
                        id="card-name" 
                        required 
                        name="name" 
                        spellcheck="false"
                        class="form-control"
                        />
                    @if($boards == null)
                    <input class="form-control" type="hidden"name="board_id" value="{{ $board_id }}"/>
                    @endif
                </div>
                @if($boards != null)
                <div class="form-group">
                    <label for="card-content">Select Company</label>

                    <select name="board_id" class="form-control">
                    @foreach($boards as $board)
                    <option value="{{ $board->id }}">{{ $board->name }}</option>
                    @endforeach
                    </select>
                </div>        
                @endif    

                <div class="form-group">
                    <label for="card-content">Description</label>
                    <textarea placeholder="Enter description" 
                        style="resize: vertical"
                        id="card-content"  
                        name="description" 
                        rows="5"
                        spellcheck="false"
                        class="form-control autosize-target text-left">
                        </textarea>
                </div>

                <div class="form->group">
                    <input type="submit" class="btn btn-primary pull-right" style="margin-bottom:5px;" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
@endsection