<div class="clear"></div>
<div class="footer">
	<p>
		Powered By <a href="https://www.rocboss.com" target="_blank">ROCBOSS <!--{$GLOBALS['roc_config']['version']}--></a>&nbsp;
		<a href="http://<!--{$GLOBALS['roc_config']['siteurl']}-->" target="_blank"><!--{SITENAME}--></a>&nbsp;
		Runtime:<!--{$runtime}-->&nbsp;
		<!--{if $GLOBALS['roc_config']['siteicp'] != '' }-->备案号：<!--{$GLOBALS['roc_config']['siteicp']}--><!--{/if}-->
	</p>
	<!--{if $currentStatus == 'index' && isset($LinksList)}-->
	友链： <a href="https://www.rocboss.com" target="_blank">ROCBOSS微社区</a> 
		<!--{loop $LinksList $v}--> 
		<span class="slant"> | </span> <a href="<!--{$v['url']}-->" target="_blank"><!--{$v['text']}--></a> 
		<!--{/loop}--> 
	<!--{/if}--> 
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