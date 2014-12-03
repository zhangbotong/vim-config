<?php 
include "include/functions.php";
include "include/header.php";
if(!checkSession())
{
	showmsg("login.php","请先登录后再操作!"); 
}
?>
<!-- main -->

<div id="main">
  <div id="sidebar">
    <?php if(checkSession()){ ?>
    <ul>
      <li><a href="#" >管理员信息</a></li>
      <li>用户名:<?php echo $_SESSION['adminuser'] ;?></li>
      <li>密 码:<?php echo $_SESSION['adminpass'] ;?></li>
      <li><a href="logincheck.php?do=exit">退出登录</a></li>
    </ul>
    <?php }?>
    <br />
    <br />
    <h2>站内导航</h2>
    <ul>
      <li><a href="http://www.w3school.com.cn">技术支持</a></li>
       <li><a href="introduce.html">关于我们</a></li>
    </ul>
  </div>
  <div id="text">
    <h1><img src="images/edit-icon.gif"/>回复留言</h1>
<?php
if(isset($_GET["id"]))
{
	$query="select * from tb_messages where id=".$_GET["id"];
	$result = mysql_query($query,$conn);
	mysql_query("SET names utf8");
	while ($row=mysql_fetch_array($result)){		
?>
    <form action="dao.php?do=reply" method="post" id="form1" name="form1" >
      <dl>
        <dt><img src="images/arrow.gif" alt="" /><strong>标题：</strong></dt>
        <dd><?php echo($row["title"]); ?></dd>
        <dt><img src="images/arrow.gif" alt="" /><strong>姓名：</strong></dt>
        <dd><a href="<?php echo($row["url"]); ?>" target="_blank"><?php echo($row["visitor"]); ?></a></dd>
        <dt><img src="images/arrow.gif" alt="" /><strong>留言时间：</strong></dt>
        <dd><?php echo($row["create_at"]); ?></dd>
        <dt><img src="images/arrow.gif" alt="" /><strong>留言内容：</strong></dt>
        <dd><?php echo($row["body"]); ?></dd>
        <hr/>
        <dt><img src="images/arrow.gif" alt="" />
          <label for="reply">输入回复</label>
        </dt>
        <dd>
          <textarea cols="40" rows="5" name="reply"  id="reply"><?php echo($row["reply"]); ?></textarea>
          <br/>
        </dd>
      </dl>
      <input type="hidden" name="msgid" id="msgid" value="<?php echo($_GET['id']);?>">
      <input type="submit" id="btnsave" name="btnsave" value="保存" />
      <input type="reset"  id="btn" name="btn" value="重置" />
    </form>
 <?php }
mysql_close($conn);
}
?>
  </div>
</div>
<!-- end main -->
<!-- footer -->
<div id="footer">
  
</div>
<!-- end footer -->
</div>
</body></html>