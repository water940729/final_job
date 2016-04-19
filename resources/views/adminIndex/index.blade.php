<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>

    <!-- CSS -->
    {{--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">--}}
    {{--<link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('assets/font-awesome/css/font-awesome.min.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('assets/css/form-elements.css')}}">--}}
    {{--<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">--}}


    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons -->
    {{--<link rel="shortcut icon" href="{{asset('assets/ico/favicon.png')}}">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">--}}
    {{--<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">--}}
    {{--<link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">--}}

    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>

<body>

<!-- Top menu -->
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Bootstrap Multi Step Registration Form Template</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <label><a href="users/register">用户注册</label>
                <label><a href="users/register">忘记密码</label>
                {{--<li>--}}
							{{--<span class="li-text">--}}
								{{--Put some text or--}}
							{{--</span>--}}
                    {{--<a href="#"><strong>links</strong></a>--}}
							{{--<span class="li-text">--}}
								{{--here, or some icons:--}}
							{{--</span>--}}
							{{--<span class="li-social">--}}
								{{--<a href="#"><i class="fa fa-facebook"></i></a>--}}
								{{--<a href="#"><i class="fa fa-twitter"></i></a>--}}
								{{--<a href="#"><i class="fa fa-envelope"></i></a>--}}
								{{--<a href="#"><i class="fa fa-skype"></i></a>--}}
							{{--</span>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
</nav>

<!-- Top content -->
<div class="top-content">

    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text">
                    <h1><strong>Bootstrap</strong> Multi Step Registration Form</h1>
                    <div class="description">
                        <p>
                            This is a free responsive multi-step registration form made with Bootstrap.
                            Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">

                    <form role="form" action="adminlogin" method="post" class="registration-form" id="registration-form">

                        <fieldset>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Step 1 / 2</h3>
                                    <p>请选择登陆身份:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-bottom">

                                <div class="form-group">

                                    <label class="sr-only" for="form-last-name">请选择登陆身份</label>
                                    <label  class=" col-md-4">
                                        <input type="radio" name="optionsRadios" class="" id="optionsRadios1" value="user" >企业用户
                                    </label>
                                    <label>
                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="admin" checked> 后台管理员
                                    </label>

                                </div>
                                <button type="button" class="col-md-4"   hidden="hidden"></button>
                                <button type="button" class="btn btn-next col-md-offset-4" >下一步</button>
                            </div>

                        </fieldset>
                        {{--身份选择--}}

                        <fieldset>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Step 2 / 2</h3>
                                    <p>Social media profiles:</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-twitter"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">请输入用户名</label>
                                    <input type="text" name="form_email" placeholder="请输入用户名" class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="form_password" placeholder="请输入密码" class="form-password form-control" id="form-password">
                                </div>
								<input type="hidden" name="login-type" value=""/>
                                <button type="button" class="btn btn-previous">上一步</button>
                                <button type="submit" class="btn" id="login">登陆</button>
                            </div>
                        </fieldset>

                    </form>

                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
{{--<script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/jquery.backstretch.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/retina-1.1.0.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/js/scripts.js')}}"></script>--}}

<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/retina-1.1.0.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/login.js"></script>

<!--[if lt IE 10]>
<script src="{{asset('assets/js/placeholder.js')}}"></script>
<![endif]-->

</body>

</html>
