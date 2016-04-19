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
});



