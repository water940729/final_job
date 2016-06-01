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
	<script>

	$(function(){
		$(".action").click(function(){
			var href=$(this).attr("href");
			var data=$(this).attr("data");
			$.ajax({
				method:"GET",
				url:href,
				data:"id="+data,
				success:function(msg){
					if(href=="adminactcbe"){
						alert("激活成功");
					}else{
						alert("删除成功");
					}
					window.location.reload();
				}
			});
			return false;
		});
	});
//		$(document).on("mousewheel DOMMouseScroll", function (e) {
////			alert($("#content").attr("value"));
//			var cur=$("#content").attr("value");
//			cur=parseInt(cur)+1;
//			$("#content").attr("value",cur);
//			//$("#content").load("adminshowcbe?cur="+cur+" #travel");
//			$.ajax({
//				method:"GET",
//				data:"cur="+cur,
//				url:"adminshowcbe",
//				success:function(msg){
//					alert(msg);
//				}
//			});
//		});
	
//	$(function(){
//			alert("11");
//		window.onscroll=function(){
//			alert("11");
//		}
//	});
	</script>
	</head>

	<body>
	<div id="content" value="0">
	<table id="travel" value="0"  summary="Travel times to work by main mode (Autumn 2006) - Source: London Travel Report 2007 http://www.tfl.gov.uk/assets/downloads/corporate/London-Travel-Report-2007-final.pdf">

		
		<thead>    
			<tr>
				<th scope="col" rowspan="2">帐号</th>
				<th scope="col" colspan="6">帐号信息</th>
			</tr>
			
			<tr>
				<th scope="col">商家名</th>
				<th scope="col">商家编号</th>
				<th scope="col">上次登录IP</th>
				<th scope="col">上次登录时间</th>
				<th scope="col">操作</th>
			</tr>        
		</thead>
		
		<tbody>
			@foreach($result as $th)
			<tr>
				<th scope="row">{{$th->cbeAccount}}</th>
				<td>{{$th->cbeName}}</td>
				<td>{{$th->cbeNo}}</td>
				<td>
					@if ($th->cbeLoginIP)
					{{$th->cbeLoginIP}}
					@else
					未登录
					@endif</td>
				<td>
					@if($th->cbeLoginTime)
						{{$th->cbeLoginTime}}
					@else
						未登录
					@endif
				</td>
				<td>
					<a href="admininfocbe?id={{$th->id}}">详情</a>
					@if($th->isalive==0)
						<a href="adminactcbe" data="{{$th->id}}" class="action">激活</a>
					@else
						<a href="admindelcbe" data="{{$th->id}}" class="action">注销</a>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
	</div>
	</body>
	</html>
