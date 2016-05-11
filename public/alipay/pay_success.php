<form name="notifyForm" id="notifyForm" action="notify_url.php" method="POST">
	<input type="hidden" name="out_trade_no" value="<?php echo $_GET['out_trade_no']; ?>"/>
	<input type="hidden" name="trade_money" value="<?php echo $_GET['trade_money']; ?>"/>
	<input type="hidden" name="trade_status" value="<?php echo $_GET['trade_status']; ?>"/>
	<input type='submit'  value="通知" style='display:none;'/>
</form>
<script type="text/javascript">
	document.forms['notifyForm'].submit();
</script>