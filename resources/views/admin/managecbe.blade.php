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
				<th scope="col" rowspan="2">帐号</th>
				<th scope="col" colspan="6">帐号信息</th>
			</tr>
			
			<tr>
				<th scope="col">手机号</th>
				<th scope="col">邮箱</th>
				<th scope="col">上次登录IP</th>
				<th scope="col">上次登录时间</th>
			</tr>        
		</thead>
		
		
		<tbody>
			@foreach($result as $th)
			<tr>
				<th scope="row">{{$th->cbeAdminAccount}}</th>
				<td>{{$th->cbeAdminPhone}}</td>
				<td>{{$th->cbeAdminMail}}</td>
				<td>{{$th->lastip}}</td>
				<td>{{$th->lasttime}}</td>
			</tr>
			@endforeach
		</tbody>

	</table>
	</body>
	</html>
