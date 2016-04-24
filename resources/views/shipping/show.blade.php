<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--360浏览器优先以webkit内核解析-->
    <meta name="renderer" content="webkit">

    <title>管理物流</title>
	<link rel="stylesheet" type="text/css" media="screen" href="css/managecbe.css" />
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/managecbe.js"></script>
	</head>

	<body>

	<table id="travel" summary="Travel times to work by main mode (Autumn 2006) - Source: London Travel Report 2007 http://www.tfl.gov.uk/assets/downloads/corporate/London-Travel-Report-2007-final.pdf">

		
		<thead>    
			<tr>
				<th scope="col">{{$lang["shipping_name"]}}</th>
				<th scope="col">{{$lang["shipping_desc"]}}</th>

				<th scope="col">{{$lang["insure"]}}</th>
				<th scope="col">{{$lang["support_cod"]}}</th>

				<th scope="col">操作</th>
			</tr>        
		</thead>
		
		<tbody>
			@foreach($result as $th)
			<tr>
				<td><?php echo $th["name"];?></td>
				<td width="40%"><?php echo $th['desc'];?></td>
				<td><?php echo $th["insure_fee"];?></td>
				<td>
				@if($th["cod"]==1)
				支持
				@else
				不支持
				@endif</td>
				<td>
					@if($th["install"]==0)
						<a href="adminshipinstall?code={{$th['code']}}">安装</a>
					@else
						<a href="adminshipuninstall?code={{$th['code']}}">卸载</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
	</body>
	</html>
