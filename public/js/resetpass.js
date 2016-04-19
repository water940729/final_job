$(function(){
		$("#submit").click(function(){
			var pass1=$("input[name=password]").val();
			var pass2=$("input[name=password_confirmation]").val();
			$.ajax({
				type:"POST",
				url:"admindoresetpass",
				data:"password="+pass1+"&password_confirmation="+pass2,
				success:function(msg){
					//console.log(msg);
					if(msg.status==1){
						alert("密码修改成功");
						window.location.reload();
					}else{
						alert(msg.error);
					}
				}
			});
			return false;
		})
});
