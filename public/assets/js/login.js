$(function(){
	$("#login").click(function(){
		var optionsRadios=$("input[name=optionsRadios]:checked").val();
		var form_email=$("#form-email").val();
		var form_pass=$("#form-password").val();
		var url = document.getElementById("registration-form").action;
		$.ajax({
			type:"POST",
			//url:"adminlogin",
			url:""+url,
			data:"form_email="+form_email+"&form_password="+form_pass+"&optionsRadios="+optionsRadios,
			success:function(msg){
				//alert(msg);
				//console.log(msg);
				if(msg.status==1){
					location.href=msg.href;
				}else{
					alert(msg.href);
				}
			}
		});
		return false;
	});

	$("#register").click(function(){
		var name =$("#name").val();

		var no =$("#no").val();
		var phone =$("#phone").val();
		var password =$("#password").val();
		var email =$("#email").val();
		var repeat_password =$("#repeat-password").val();
		var url = document.getElementById("registration-form").action;

		$.ajax({
			type:"POST",
			//url:"adminlogin",
			url:""+url,
			data:"email="+email+"&password="+password+"&name="+name+"&no="+no+"&phone="+phone+"&repeat-password="+repeat_password,
			success:function(msg){
				//alert(msg);
				//console.log(msg);
				if(msg.errno==200){
					location.href=msg.errmsg;
				}else{
					alert(msg.errmsg);
				}
			}
		});
		return false;
	});


	$("#infoSave").click(function(){

		var Code =$("#Code").val();
		var phone =$("#phone").val();
		var Account =$("#Account").val();
		var url = document.getElementById("infoEdit").action;
		var local = window.location.toString();
		var t = $("#profileTab2").offset().top;

		$.ajax({
			type:"POST",
			//url:"adminlogin",
			url:""+url,
			data:"&Account="+Account+"&Code="+Code+"&phone="+phone,
			success:function(msg){
				//alert(msg);
				//console.log(msg);
				if(msg.errno==200){
					alert(msg.errmsg);
					$(window).scrollTop(t);
				}else{
					alert(msg.errmsg);
				}
			}
		});

	});

	$("#passSave").click(function(){

		var Pass =$("#oldPass").val();
		var newPass =$("#newPass").val();
		var repeatPass =$("#repeatPass").val();
		var url = document.getElementById("passEdit").action;
		var local = window.location.toString();
		var t = $("#passEdit").offset().top;
		if(newPass!=repeatPass){
			alert('两次密码不一致');
			return false;
		}else if (Pass == newPass){
			alert('密码未修改');
			return false;
		}else if(Pass.length==0){
			alert('密码不能为空');
			return false;
		}

		$.ajax({
			type:"POST",
			//url:"adminlogin",
			url:""+url,
			data:"&Pass="+Pass+"&newPass="+newPass+"&repeatPass="+repeatPass,
			success:function(msg){
				//alert(msg);
				//console.log(msg);
				if(msg.errno==200){
					alert(msg.errmsg);
					$(window).scrollTop(t);
					$("input[type=reset]").trigger("click");

				}else{
					alert(msg.errmsg);

				}
			}
		});

	});


	$('#reservation').daterangepicker(null,
		function(start, end, label) {
			console.log(start.toISOString(), end.toISOString(), label);
		});


	//$("#query").click(function (){
	//	var timeRange=$("#reservation").val();
	//	var numQuery = $("#numQuery").val();
	//	var url = document.getElementById("queryForm").action;
    //
    //
	//	$.ajax({
	//		type:"GET",
	//		//url:"adminlogin",
	//		url:""+url,
	//		data:"&timeRange="+timeRange+"&numQuery="+numQuery,
	//		success:function(msg){
	//			window.location.reload();
	//			//alert(msg);
	//			//console.log(msg);
	//			//if(msg.errno==200){
	//			//	alert(msg.errmsg+msg.errno);
	//			//	//$(window).scrollTop(t);
	//			//	//$("input[type=reset]").trigger("click");
     //           //
	//			//}else{
	//			//	alert(msg.errmsg);
     //           //
	//			//}
	//		}
	//	});
	//});
});



