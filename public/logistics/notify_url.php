<?php
	
	// 物流平台返回的物流单号
	$order_no = $_POST['order_no'];
	// 快递公司
	$carrier_name = $_POST['carrier_name'];

	echo $order_no."   ".$carrier_name;

?>