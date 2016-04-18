$(function(){
	$("#submit").click(function(){
		var account=$("input[name=account]").val();
		var password=$("input[name=password]").val();
		var phone=$("input[name=phone]").val();
		var email=$("input[name=email]").val();
		$.ajax({
			url:"admindoaddcbe",
			type:"POST",
			data:"account="+account+"&password="+password+"&phone="+phone+"&email="+email,
			success:function(msg){
				if(msg.status==1){
					alert("添加成功");
					window.location.reload();
				}else{
					alert(msg.error);
				}
			}
		});
		return false;
	});
})
