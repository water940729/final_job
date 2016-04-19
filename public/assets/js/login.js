$(function(){
	$("#login").click(function(){
		var optionsRadios=$("input[name=optionsRadios]:checked").val();
		var form_email=$("#form-email").val();
		var form_pass=$("#form-password").val();
		$.ajax({
			type:"POST",
			url:"adminlogin",
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
});
