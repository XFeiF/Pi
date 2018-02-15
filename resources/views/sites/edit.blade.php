@extends('layouts.app')

@section('content')
    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-offset-1">
        <h1> Edit Site</h1>
        <div class="row col-md-12 col-lg-12 col-sm-12" style="background:white; margin:10px;">
            <form method="post" action="{{ route('sites.update', [$site->id]) }}">
                {{ csrf_field() }}
    
                <input type="hidden" name="_method" value="put">

                <div class="form-group">
                    <label for="site-name">Name<span class="required"></span></label>
                    <input placeholder="Enter name" 
                        id="site-name" 
                        required 
                        name="name" 
                        spellcheck="false"
                        class="form-control"
                        value="{{$site->name}}"
                        />
                </div> 
                <div class="form-group">
                    <label for="site-url">Url<span class="required"></span></label>
                    <input placeholder="Enter name" 
                        id="site-url" 
                        required 
                        name="url" 
                        spellcheck="false"
                        class="form-control"
                        value="{{$site->url}}"
                        />
                </div> 
                <div class="form-group">
                    <label for="site-logo">Logo</label>
                    <input placeholder="Enter logo url" 
                        id="site-logo" 
                        name="logo" 
                        spellcheck="false"
                        class="form-control"
                        value="{{$site->logo}}"
                        />
                </div> 

                <div class="form-group">
                    <label for="site-content">Description</label>
                    <textarea placeholder="Enter description" 
                        style="resize: vertical"
                        id="site-content"  
                        name="description" 
                        rows="5"
                        spellcheck="false"
                        class="form-control autosize-target text-left">
                        {{ $site->description }}
                        </textarea>
                </div>

                <div class="form->group">
                    <input type="submit" class="btn btn-primary pull-right" style="margin-bottom:5px;" value="Submit"/>
                </div>
            </form>
        </div>
    </div>
@endsection