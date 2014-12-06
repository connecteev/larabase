@extends('layouts.master')
@section('header-js')
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.3/highcharts.js') }}
    {{ HTML::script('//cdn.jsdelivr.net/highcharts/4.0.3/modules/exporting.js') }}
@stop

@section('content')
<h1>Dashboard</h1>
<hr>
<div class="row" id="dashboard">

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Sitewide Trends</h3>
            </div>
            <div class="panel-body">
                <div id="trends"></div>
                <div class="row">
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-file-text"></i> <span id="posts" class="label label-info counter">0</span> Posts</h2>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-users"></i> <span id="users" class="label label-info counter">0</span> Users</h2>
                    </div>
                    <div class="col-md-4 col-xs-4">
                        <h2><i class="fa fa-envelope"></i> <span id="feedback" class="label label-info counter">0</span> Msgs</h2>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Your Summary</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <h1>
                            <span id="user_posts">0</span>
                            <a href="{{ url("/posts/user/{$user->username}") }}"> Posts</a>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> Activity Timeline</h3>
            </div>
            <div class="panel-body">
                <ul class="list-group">
                    <li class="list-group-item">Dapibus ac facilisis in Vestibulum scaevola <span class="text-muted"><i class="fa fa-clock-o"></i> 3 mins ago</span></li>
                    <li class="list-group-item">Porta ac consectetur ac facilisis inashem <span class="text-muted"><i class="fa fa-clock-o"></i> 1 hour ago</span></li>
                    <li class="list-group-item">Nec quando facilis ne, simul interpretaris te per <span class="text-muted"><i class="fa fa-clock-o"></i> 6 hours ago</span></li>
                    <li class="list-group-item">Vestibulum at eros ac facilisis <span class="text-muted"><i class="fa fa-clock-o"></i> 7 hour ago</span></li>
                    <li class="list-group-item">Eu his sonet hendrerit. Integre voluptatibus in duo <span class="text-muted"><i class="fa fa-clock-o"></i> 2 days ago</span></li>
                    <li class="list-group-item">Mei et assueverit vituperatoribus, eos cu reprehendunt <span class="text-muted"><i class="fa fa-clock-o"></i> 5 days ago</span></li>
                    <li class="list-group-item">Dapibus ac facilisis in Porta acumpos delicatissimi <span class="text-muted"><i class="fa fa-clock-o"></i> 8 days ago</span></li>
                </ul>
            </div>
        </div>
    </div>

</div>

@stop

@section('footer-js')
    {{ HTML::script('js/animateNumber.min.js') }}
    <script>
        var users = {{ json_encode($users) }};
        var posts = {{ json_encode($posts) }};
        var user_posts = {{ json_encode($user_posts) }};
        var feedback = {{ json_encode($feedback) }};
    </script>
@stop