<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="css/resetpass.css" type="text/css" rel="stylesheet">

    <!--360浏览器优先以webkit内核解析-->
    <meta name="renderer" content="webkit">

    <title>H+ 后台主题UI框架 - 主页示例</title>

</head>

<body class="gray-bg">
<form action="" method="post" class="basic-grey">
<h1>密码修改</h1>
<label><span>新密码:</span>
<input type="password" name="password" value="" placeholder="请输入你的密码"/>
</label>
<br/>
<label>
<span>确认密码:
</span>
<input type="password" name="password_confirmation" value=""/>
</label>
<br/>
<label>
<span>&nbsp;</span>
<input type="button" class="button" name="submit" value="修改" id="submit">
</label>
</form>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/resetpass.js"></script>
</body>

</html>
