<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->
    <meta name="renderer" content="webkit">

    <title>管理帐号</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/managecbe.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/managecbe.js"></script>
	</head>

	<body>

	<table id="travel" summary="Travel times to work by main mode (Autumn 2006) - Source: London Travel Report 2007 http://www.tfl.gov.uk/assets/downloads/corporate/London-Travel-Report-2007-final.pdf">

		
		<thead>    
			<tr>
				<th scope="col">支付方式名称</th>
				<th scope="col">支付方式描述</th>
				<th scope="col">插件版本</th>
				<th scope="col">插件作者</th>
				<th scope="col">支付费用</th>
				<th scope="col">操作</th>
			</tr>        
		</thead>
		
		<tbody>
			@foreach($result as $th)
			<tr>
				<td>{{html_entity_decode($th['name'])}}</td>
				<td>{{$th['desc']}}</td>
				<td>{{$th['version']}}</td>
				<td>{{$th['author']}}</td>
				<td>{{$th['pay_fee']}}</td>
				<td></td>
			</tr>
			@endforeach
		</tbody>

	</table>
	</body>
	</html>
