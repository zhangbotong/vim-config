<div class="clear"></div>
<div class="footer">
	<p>
		Powered By <a href="https://www.rocboss.com" target="_blank">ROCBOSS <?php echo $GLOBALS['roc_config']['version']; ?></a>&nbsp;
		<a href="http://<?php echo $GLOBALS['roc_config']['siteurl']; ?>" target="_blank"><?php echo SITENAME; ?></a>&nbsp;
		Runtime:<?php echo $runtime; ?>&nbsp;
		<?php if ($GLOBALS['roc_config']['siteicp'] != '' ) { ?>备案号：<?php echo $GLOBALS['roc_config']['siteicp']; ?><?php } ?>
	</p>
	<?php if ($currentStatus == 'index' && isset($LinksList)) { ?>
	友链： <a href="https://www.rocboss.com" target="_blank">ROCBOSS微社区</a> 
		<?php if(is_array($LinksList)) foreach($LinksList as $v) { ?> 
		<span class="slant"> | </span> <a href="<?php echo $v['url']; ?>" target="_blank"><?php echo $v['text']; ?></a> 
		<?php } ?> 
	<?php } ?> 
</div>
<div class="alert-messages">
	<div class="message">
		<span class="message-text"></span>
	</div>
</div>
<div class="alert-confirms">
	<div class="confirm">
		<span class="confirm-text">
			<a class="confirmBtn" href="" id="confirm-it">确定执行操作</a>
			<a class="confirmBtn" href="javascript:closeAlert();">取消</a>
		</span>
	</div>
</div>
</body>
</html>