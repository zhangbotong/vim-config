<?php require $this->_include('header.tpl',__FILE__); ?>
<div id="contain">
    <div class="rightC">
      <ul class="topicUl">
        <?php if(is_array($whisperList)) foreach($whisperList as $t) { ?>
        <li class="topic" id="whisper-<?php echo $t['wid']; ?>">
          <div class="name">
            <a href="index.php?m=user&id=<?php echo $t['uid']; ?>" class="avatar">
              <img src="<?php echo $t['avatar']; ?>" title="<?php echo $t['nickname']; ?>" alt="<?php echo $t['nickname']; ?>">
            </a>
          </div>
          <div class="post">
            <div class="container">
              <span class="org_box_cor"></span>
              <span class="org_box_cor_s"></span>
                <h4><?php echo $t['message']; ?></h4>
                <div class="post-info">
                  <span><a href="index.php?m=user&id=<?php echo $t['uid']; ?>"><?php echo $t['nickname']; ?></a></span>
                  <span>•</span>
                  <small><?php echo $t['posttime']; ?></small>
                  <?php if ($t['atnickname'] != $loginInfo['nickname']) { ?> 
                  <span>•</span>
                  发给 
                  <span>
                    <img src="<?php echo $t['atavatar']; ?>" class="talk-avatar-tiny">
                    <a href="?m=user&id=<?php echo $t['atuid']; ?>"><?php echo $t['atnickname']; ?></a>
                  </span>
                  <span>•</span>
                  <?php if ($t['isread'] == 1) { ?>[ 已读 ]<?php }else{ ?><b>[ 未读 ]</b><?php } ?> 
                  <?php } ?> 
                </div>
            </div>
          </div>
        </li>
        <?php } ?>
    </ul>
    <div id="pager">
      <?php if ($whisperList == array() ) { ?> 
        暂无数据 
      <?php }else{ ?> 
        <?php echo $page; ?> 
      <?php } ?>
    </div>
  </div>
  <div class="leftC">
      <div class="box">
        <h3 class="boxhead"><img src="<?php echo TPL; ?>/rocboss/images/whisper.png" class="qqlogo"> 我的私信</h3>
        <ul class="list-topic">
          <li<?php if ($whisperStatus == '0') { ?> class="active"<?php } ?>>
            <a href="./?m=user&w=whisper&status=0">未读私信</a>
          </li>
          <li<?php if ($whisperStatus == '1') { ?> class="active"<?php } ?>>
            <a href="./?m=user&w=whisper&status=1">已读私信</a>
          </li>
          <li<?php if ($whisperStatus == '2') { ?> class="active"<?php } ?>>
            <a href="./?m=user&w=whisper&status=2">已发私信</a>
          </li>
        </ul>
      </div>
    </div>
</div>
<?php require $this->_include('footer.tpl',__FILE__); ?>