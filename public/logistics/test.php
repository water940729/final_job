<!DOCTYPE html>
<html>
<head>
	<title>test</title>
</head>
<body>
	<form action="logistics_api.php" method="GET">
		订单编号：<input type="text" name="order_no" value="11111111111"><br/>
		快递公司：<input type="text" name="carrier_name" value="申通"><br/>
		发件人姓名：<input type="text" name="sender_name" value="测试发件"><br/>
		发件人手机号码：<input type="text" name="sender_telephone" value="18034524223"><br/>
		发件人国家名称：<input type="text" name="sender_country_name" value="中国"><br/>
		发件地址省名称：<input type="text" name="sender_province_name" value="陕西省"><br/>
		发件地址市名称：<input type="text" name="sender_city_name" value="西安市"><br/>
		发件地址区名称：<input type="text" name="sender_district_name" value="长安区"><br/>
		发件地址详细信息：<input type="text" name="sender_address" value="西安电子科技大学新校区"><br/>
		收件人姓名：<input type="text" name="receiver_name" value="测试收件"><br/>
		收件人手机号码：<input type="text" name="receiver_telephone" value="15023535264"><br/>
		收件人国家名称：<input type="text" name="receiver_country_name" value="中国"><br/>
		收件地址省名称：<input type="text" name="receiver_province_name" value="陕西省"><br/>	
		收件地址市名称：<input type="text" name="receiver_city_name" value="西安市"><br/>
		收件地址区名称：<input type="text" name="receiver_district_name" value="雁塔区"><br/>
		收件地址详细信息：<input type="text" name="receiver_address" value="西安电子科技大学老校区"><br/>
		货物重量（单位kg）：<input type="text" name="item_weight" value="1.5"><br/>
		货物名称：<input type="text" name="item_name" value="书籍"><br/>
		<input type="submit" value="提交">
	</form>
</body>
</html>