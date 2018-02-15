@extends('layouts.app')

@section('content')
  <div class="col-md-9 col-lg-9 col-sm-9 col-xs-offset-1">
    <h1> Create new Board</h1>
    <div class="row col-md-12 col-lg-12 col-sm-12" style="background:white; margin:10px;">
        <form method="post" action="{{ route('boards.store') }}">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="board-name">Name<span class="required"></span></label>
                <input placeholder="Enter name" 
                    id="board-name" 
                    required 
                    name="name" 
                    spellcheck="false"
                    class="form-control"
                    />
            </div>

            <div class="form-group">
                <label for="board-content">Description</label>
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
@endsection