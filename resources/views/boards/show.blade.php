@extends('layouts.app')

@section('content')
<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">

    <div class="panel panel-primary kanban-col">
        <div class="panel-heading i-father">
            <span class="head-title">Card Name </span>
            <a href="#" style="color:white;" class="i-hidden"><i class="fa fa-cog pull-right " style="margin-top: 5px;"></i></a>
        </div>
        <div class="panel-body">
            <div id="TODO" class="kanban-centered">
                <ol class="list-unstyled">
                    <li class="active">
                        <div class="img-wrap">
                        <span></span>
                        <img src="https://www.google.com/favicon.ico" class="img-circle" />
                        </div>
                            <strong>Their Consectuer Option #3</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="panel-footer">
            <a href="#">Add a site...</a>
        </div>
    </div>

     <div class="panel panel-primary kanban-col">
        <div class="panel-heading i-father">
            <span class="head-title">Card Name </span>
            <a href="#" style="color:white;" class="i-hidden"><i class="fa fa-cog pull-right " style="margin-top: 5px;"></i></a>
        </div>
        <div class="panel-body">
            <div id="TODO" class="kanban-centered">
                <ol class="list-unstyled">
                    <li class="active">
                    <a href="#" title="website description">
                        <div class="img-wrap">
                        <span></span>
                        <img src="https://www.google.com/favicon.ico" class="img-circle" />
                        </div>
                            website name
                    </li>
                </ol>
            </div>
        </div>
        <div class="panel-footer">
            <a href="#">Add a site...</a>
        </div>
    </div>
</div>
@endsection