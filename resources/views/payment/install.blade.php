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
<form action="adminpaydoinstall" method="post" class="basic-grey">
<h1>安装支付</h1>
<label>
<span>支付方式名称:</span>
<input type="text" name="pay_name" value="{{$pay['pay_name']}}" size="40"/>
</label>
<label>
<span>支付方式描述:
</span>
<textarea name="pay_desc" cols="60" rows="8">{{$pay['pay_desc']}}</textarea>
</label>
@if($pay['pay_config'])
@foreach ($pay['pay_config'] as $config)
<label>
<span>{{$config['label']}}:</span>
@if($config['type']=='text')
<input type="{{$config['type']}}" name="cfg_value[]" value=""/>
@elseif($config['type']=='textarea')
<textarea name="cfg_value[]"></textarea>
@else
<select name="cfg_value[]">
@foreach ($config['range'] as $range)
<option>{{$range}}</option>
@endforeach
</select>
@endif
      <input name="cfg_name[]" type="hidden" value="{{$config['name']}}" />
      <input name="cfg_type[]" type="hidden" value="{{$config['type']}}" />
</label>
@endforeach
@endif
<label>
<span>&nbsp;</span>
<input type="hidden"  name="pay_code"     value="{{$pay['pay_code']}}" />
<input type="submit" class="button" name="submit" value="安装" id="submit">
</label>
</form>
<script type="text/javascript" src="js/jquery.min.js"></script>
</body>

</html>
