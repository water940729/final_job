<?php

	// 订单编号
	$logisticsInfo['order_no'] = $_GET['order_no'];
	// 快递公司
	$logisticsInfo['carrier_name'] = $_GET['carrier_name'];
	// 发件人姓名
	$logisticsInfo['sender_name'] = $_GET['sender_name'];
	// 发件人电话
	$logisticsInfo['sender_telephone'] = $_GET['sender_telephone'];
	// 发件人国家名称
	$logisticsInfo['sender_country_name'] = $_GET['sender_country_name'];
	// 发件人省名称
	$logisticsInfo['sender_province_name'] = $_GET['sender_province_name'];
	// 发件人城市名称
	$logisticsInfo['sender_city_name'] = $_GET['sender_city_name'];
	// 发件人区名称
	$logisticsInfo['sender_district_name'] = $_GET['sender_district_name'];
	// 发件人地址详细信息
	$logisticsInfo['sender_address'] = $_GET['sender_address'];
	// 收件人姓名
	$logisticsInfo['receiver_name'] = $_GET['receiver_name'];
	// 收件人电话
	$logisticsInfo['receiver_telephone'] = $_GET['receiver_telephone'];
	// 收件人国家名称
	$logisticsInfo['receiver_country_name'] = $_GET['receiver_country_name'];
	// 收件人省名称
	$logisticsInfo['receiver_province_name'] = $_GET['receiver_province_name'];
	// 收件人城市名称
	$logisticsInfo['receiver_city_name'] = $_GET['receiver_city_name'];
	// 收件人区名称
	$logisticsInfo['receiver_district_name'] = $_GET['receiver_district_name'];
	// 收件人地址详细信息
	$logisticsInfo['receiver_address'] = $_GET['receiver_address'];
	// 货物重量
	$logisticsInfo['item_weight'] = $_GET['item_weight'];
	// 货物名称
	$logisticsInfo['item_name'] = $_GET['item_name'];

	// 时间戳
	$logisticsInfo['timestamp'] = time();
	// 物流平台用户账号
	$logisticsInfo['user'] = 'username';

	// 32位的MD5签名密钥
	$key = 'dtawer346346e56utrs647rs54456s3s';

	//对待签名参数数组排序
	$param_temp = $logisticsInfo;
	ksort($param_temp);
	reset($param_temp);
	//把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串
	$arg  = "";
	while (list ($key, $val) = each ($param_temp)) {
		$arg.=$key."=".$val."&";
	}
	//去掉最后一个&字符
	$arg = substr($arg,0,count($arg)-2);
	//如果存在转义字符，那么去掉转义
	if(get_magic_quotes_gpc()){
		$arg = stripslashes($arg);
	}
	//生成签名结果
	$mysign = md5($arg.$key);
		
	//签名结果与签名方式加入请求提交参数组中
	$logisticsInfo['sign'] = $mysign;
	$logisticsInfo['sign_type'] = 'MD5';

	// 构建表单向物流公司发送请求
	$html = "<form id='logisticsSubmit' name='logisticsSubmit' action='logistics.php' method='GET'>";
	while (list ($key, $val) = each ($logisticsInfo)) {
        $html.= "<input type='hidden' name='".$key."' value='".$val."'/>";
    }
	//submit按钮控件请不要含有name属性
    $html = $html."<input type='submit'  value='".$button_name."' style='display:none;'></form>";
	$html = $html."<script>document.forms['logisticsSubmit'].submit();</script>";
	echo $html;

?>