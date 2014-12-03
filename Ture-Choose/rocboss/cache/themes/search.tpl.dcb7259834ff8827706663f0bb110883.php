<?php require $this->_include('header.tpl',__FILE__); ?>
<div id="contain">
	<h3 class="topicTl">
		搜索主题： <span style="color:red;"><?php echo $searchWord; ?></span>
	</h3>
	<ul class="topicUl">
		<?php if(is_array($topicList)) foreach($topicList as $t) { ?>
		<li class="topic" id="topic-<?php echo $t['tid']; ?>">
		<div class="name">
			<a href="index.php?m=user&id=<?php echo $t['uid']; ?>" title="<?php echo $t['nickname']; ?>" class="avatar" rel="nofollow">
				<img src="<?php echo $t['avatar']; ?>">
			</a>
		</div>
		<div class="post">
			<div class="container">
				<span class="org_box_cor"></span>
				<span class="org_box_cor_s"></span>
				<div class="badge">
						<a class="title" href="say-<?php echo $t['tid']; ?>.html"><?php echo $t['comments']; ?></a>
                </div>
				<a class="title" id="topicContent" href="say-<?php echo $t['tid']; ?>.html">
					<?php echo $t['message']; ?>
				</a>
				<div class="post-info">
					<span class="right">
						<a href="./say-<?php echo $t['tid']; ?>.html">点击查看</a>
					</span>						
					<?php if ($t['clubname'] != '' ) { ?> 
					<a href="./?cid=<?php echo $t['cid']; ?>" id="clubname"><b><?php echo $t['clubname']; ?></b></a>
					<?php if ($t['pictures'] != '' ) { ?>
						<img src="<?php echo TPL; ?>/rocboss/images/picture.png" class="qqlogo">
					<?php } ?><span>•</span>
					<?php } ?> 
					<span><a href="index.php?m=user&id=<?php echo $t['uid']; ?>" rel="nofollow"><b><?php echo $t['nickname']; ?></b></a></span>
					<?php if ($t['client'] != '') { ?>
						<font color="#87A797">
							[ <img src="<?php echo TPL; ?>/rocboss/images/phone.png" class="qqlogo"><?php echo $t['client']; ?> ]
						</font>
					<?php } ?>
					<span>•</span>
					<span><?php echo $t['posttime']; ?> 发布</span>
					<span>•</span>
					<span><?php echo $t['lasttime']; ?> 最后</span>
				</div>
				
			</div>
		</div>
		</li>
		<?php } ?>
	</ul>
	<div id="pager">
		 <?php if ($topicList == array() ) { ?> 
              暂无搜索数据
          <?php }else{ ?> 
              <?php echo $page; ?> 
          <?php } ?>
	</div>
</div>
<?php require $this->_include('footer.tpl',__FILE__); ?> 