<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Multi Step Registration Form Template</title>

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/form-elements.css">
    <link rel="stylesheet" href="../assets/css/style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Favicon and touch icons --><link rel="shortcut icon" href="../assets/ico/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">


</head>

<body style="background-image: url('../assets/img/backgrounds/1.jpg')">

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
                <label><a href="/final_job/public">返回登录</a></label>
                <label><a href="users/register">忘记密码</a></label>
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
                    <h1><strong></strong>欢迎加入</h1>
                    <div class="description">
                        <p>
                            {{--This is a free responsive multi-step registration form made with Bootstrap.--}}
                            {{--Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!--}}
                            毕业季你好，毕业季再见
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3 form-box">

                    <form role="form" action="regist" method="post" class="registration-form">

                        <fieldset>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Step 1 / 2</h3>
                                    {{--<p>Tell us who you are:</p>--}}
                                    <p>公司信息填写</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name" >公司名称</label>
                                    <input type="text" name="name" placeholder="请填写公司名称" class="form-first-name form-control" id="name ">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">公司编号</label>
                                    <input type="text" name="no" placeholder="请填写公司编号" class="form-last-name form-control" id="no">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">手机号</label>
                                    <input type="text" name="phone" placeholder="请填写联系人手机号" class="form-last-name form-control" id="phone">
                                </div>
                                <button type="button" class="btn btn-next">下一步</button>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Step 2 / 2</h3>
                                    <p>设置你的登陆账号</p>
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-key"></i>
                                </div>
                            </div>
                            <div class="form-bottom">
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">用户名</label>
                                    <input type="text" name="email" placeholder="Email将作为您的登陆账号，请真实填写" class="form-email form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="请输入密码" class="form-password form-control" id="password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-repeat-password">Repeat password</label>
                                    <input type="password" name="repeat-password" placeholder="确认密码"
                                           class="form-repeat-password form-control" id="repeat-password">
                                </div>
                                <button type="button" class="btn btn-previous">上一步</button>
                                <button type="submit" class="btn">注册</button>
                            </div>
                        </fieldset>


                    </form>

                </div>
            </div>
        </div>
    </div>

</div>


<!-- Javascript -->
<script src="../assets/js/jquery-1.11.1.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.backstretch.min.js"></script>
<script src="../assets/js/retina-1.1.0.min.js"></script>
<script src="../assets/js/scripts.js"></script>

<!--[if lt IE 10]>
<script src="../assets/js/placeholder.js"></script>
<![endif]-->

</body>

</html>