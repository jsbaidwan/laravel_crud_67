<!DOCTYPE html>
<html>

<head>
    <title>Evergreen-@yield('title')</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--== FAV ICON ==-->
    <link rel="shortcut icon" href="{{asset('images/fav.ico')}}">

    <!--== ALL CSS FILES ==-->
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/plugin.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/dashboard.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/icons.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/validationEngine.jquery.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/bootstrap-datepicker3.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/css/dataTables.bootstrap.min.css')}}" />

    <!--======== SCRIPT FILES =========-->
    <script src="{{asset('public/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/plugin.js')}}"></script>
    <script src="{{asset('public/js/preloader.js')}}"></script>
    <script src="{{asset('public/js/main.js')}}"></script>
    <script src="{{asset('public/js/dashboard-custom.js')}}"></script>
    <script src="{{asset('public/js/jpanelmenu.min.js')}}"></script>
    <script src="{{asset('public/js/counterup.min.js')}}"></script>
    <script src="{{asset('public/js/jquery.validationEngine-en.js')}}"></script>
    <script src="{{asset('public/js/jquery.validationEngine.js')}}"></script>
    <script src="{{asset('public/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/js/jdataTables.bootstrap.min.js')}}"></script>
</head>
<body> 
    <style type="text/css">
        .dashboard-nav ul li.active::after {
            border:0;
        }
        .alert_msgs {
            max-width: 100%;
            margin: 0 auto;
            position: fixed;
            top: 30px;
            transform: translate(-50%, -20%);
            left: 50%;
            width: 400px;
            text-align: center;
            z-index: 9999999;
        }
        .js-alert-msgs {
            display:none;
        }
        .modal{
            z-index:99999;
        }
        .no-data-found {
            text-align: center;
            font-size: 20px;
            padding: 40px 0 10px 0;
        }
        .t-box {
            cursor:pointer;
        }
        .datepicker-days .table-condensed {
            width:100%;
        }
        button.btn-red {
            padding:5px 20px;
        }
        .content-left {
            background: #000;
        }
        .dashboard-nav {
            background-color:#000;
        }
        .dashboard-nav-inner {
            background: #000;    
        }
        .dashboard-nav ul li.active, .dashboard-nav ul li:hover {
            background-color: #303030;
        }
        .dashboard-list-box h4.gray {
            background-color: #000;
        }
        .booking-table span.t-box {
            padding: 3px 11px;
            font-size: 12px;
        }
        .booking-table a.button.gray {
            height: 26px;
            width: 25px;
            font-size: 10px;
            background:#f2ae43;
        }
        table.basic-table th, table.basic-table td {
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-weight:400;
        }
        .btn-danger {
            background-color:#D60D45;
        }
        table.dataTable thead .sorting::after {
            content:"\2193";
        }
        table.dataTable thead .sorting_asc::after {
            content:"\2191";
        }
        table.dataTable thead .sorting_desc::after { 
            content:"\2193";
        }
        .paginate_button {
            position: relative;
            padding: 0.5rem 0.75rem;
            margin-left: -1px;
            line-height: 1.25;
            color: #d60d45;
            background-color: #fff;
            border: 1px solid #dee2e6;
            cursor:pointer;
        }
        div.dataTables_wrapper div.dataTables_paginate {
            margin-bottom:3px;
        }
        .btn-red {
            padding: 3px 8px;
            font-weight: normal;
            font-size: 13px;
        }
        #packages-index-page_filter input, #customers-table_filter input {
            border:0;
            border-bottom:solid 1px #888;
            background:transparent;
            border-radius:0px;
        }
        ::after, ::before {
            box-sizing:unset;  
        }
        #packages-index-page_length select, #customers-table_length select {
            width:218px;
            margin-left:20px;
        }

        .checkbox-danger input[type="checkbox"]:checked + label::before {
            background-color: #D60D45;
            border-color: #D60D45; 
        }
        .checkbox-danger input[type="checkbox"]:checked + label::after {
            color: #fff; 
        }
        .checkbox {
            padding-left: 20px; 
        }
        .checkbox label {
            display: inline-block;
            position: relative;
            padding-left: 5px; 
        }
        .checkbox label::before {
            content: "";
            display: inline-block;
            position: absolute;
            width: 17px;
            height: 17px;
            left: 0;
            margin-left: -20px;
            border: 1px solid #cccccc;
            border-radius: 3px;
            background-color: #fff;
            -webkit-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            -o-transition: border 0.15s ease-in-out, color 0.15s ease-in-out;
            transition: border 0.15s ease-in-out, color 0.15s ease-in-out; 
        }
        .checkbox label::after {
            display: inline-block;
            position: absolute;
            width: 16px;
            height: 16px;
            left: 0;
            top: 0;
            margin-left: -20px;
            padding-left: 3px;
            padding-top: 1px;
            font-size: 11px;
            color: #555555; 
        }
        .checkbox input[type="checkbox"] {
            opacity: 0; 
        }
        .checkbox input[type="checkbox"]:focus + label::before {
            outline: thin dotted;
            outline: 5px auto -webkit-focus-ring-color;
            outline-offset: -2px; 
        }
        .checkbox input[type="checkbox"]:checked + label::after {
            font-family: 'FontAwesome';
            content: "\f00c"; 
        }
        .checkbox input[type="checkbox"]:disabled + label {
            opacity: 0.65; 
        }
        .checkbox input[type="checkbox"]:disabled + label::before {
            background-color: #eeeeee;
            cursor: not-allowed; 
        }
        .checkbox.checkbox-circle label::before {
            border-radius: 50%; 
        }
        .checkbox.checkbox-inline {
            margin-top: 0; 
        }
        input[type="text"], input[type="email"], input[type="number"], input[type="search"], input[type="password"], input[type="tel"], input[type="date"], textarea, select, .form-control {
            border-radius:5px;
        }
        .formError .formErrorContent {
            width:210px;
        }
    </style>
    <script type="text/javascript">
        function hide_alerts() {
            setTimeout(function() {
                $('.alert_msgs').fadeOut('slow')
            }, 3000);
        }
        function alert_msg (text,type) {
            $('.js-alert-msgs').show();
            $('.js-alert-msgs').text(text);
            if(type == 'success') {
                $('.js-alert-msgs').addClass('alert-success');
                $('.js-alert-msgs').removeClass('alert-danger');
            }
            else {
                $('.js-alert-msgs').addClass('alert-danger');
                $('.js-alert-msgs').removeClass('alert-success');
            }
            hide_alerts();
        }    
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
            $('.datepicker').datepicker({
                autoclose: true,
                startDate: new Date()
            });
        });  
    </script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert_msgs">
                {{$error}}
            </div>
        @endforeach
        <script type="text/javascript">
            hide_alerts();
        </script>
    @endif
    @if(Session::has('success') || Session::has('error'))
        @php
            $alert_class = '';
            $alert_msg = '';
            if(Session::has('success')) {
                $alert_class = 'alert-success';
                $alert_msg = Session::get('success');
            }
            else {
                $alert_class = 'alert-danger';
                $alert_msg = Session::get('error');
            }
        @endphp
        <div class="alert {{$alert_class}} alert_msgs">
            {{ $alert_msg }}
        </div>
        <script type="text/javascript">
            hide_alerts();
        </script>
    @endif  
    <div class="alert alert_msgs js-alert-msgs">
    </div>
    <div id="preloader">
        <div id="status"></div>
    </div>
    <div id="container-wrapper">
        <div id="dashboard">
            @include('includes.header')
            @include('includes.side_nav')
            @yield('content')
            @include('includes.footer')
        </div>
    </div>

</body>

</html>