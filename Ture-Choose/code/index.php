
<?php 
header("Content-type: text/html; charset=utf-8"); 
include "include/header.php"; 
include "include/functions.php";
//mysql_connect("localhost","root","");
//mysql_select_db("guestbook");
//mysql_query();
// 获取当前页数
if( isset($_GET['page']) ){
   $page = intval( $_GET['page'] );
}
else{
   $page = 1;
}
// 每页数量
//$page_size = PAGESIZE;
$page_size = 10;
// 获取总数据量
$sql = "select count(*) as amount from `tb_message` ";
$result = mysql_query($sql);

if(!$result){echo "cuowu!";}
$row = @mysql_fetch_row($result);
$amount = $row[0];
// 记算总共有多少页
if( $amount ){
   if( $amount < $page_size ){ $page_count = 1; }       //如果总数据量小于$PageSize，那么只有一页
   if( $amount % $page_size ){                       //取总数据量除以每页数的余数
       $page_count = (int)($amount / $page_size) + 1;   //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
   }else{
       $page_count = $amount / $page_size;           //如果没有余数，则页数等于总数据量除以每页数的结果
   }
}
else{
   $page_count = 0;
}

// 翻页链接
$page_string = '';
if( $page == 1 ){
   $page_string .= '第一页|上一页|';
}
else{
   $page_string .= '<a href=?page=1>第一页</a>|<a href=?page='.($page-1).'>上一页</a>|';
}
if( ($page == $page_count) || ($page_count == 0) ){
   $page_string .= '下一页|尾页';
}
else{
   $page_string .= '<a href=?page='.($page+1).'>下一页</a>|<a href=?page='.$page_count.'>尾页</a>';
}
// 获取数据，以二维数组格式返回结果
if( $amount ){
   $sql = "select * from `tb_message` order by id desc limit ". ($page-1)*$page_size .", $page_size";

   $result = mysql_query($sql);

 
   while ( $row = mysql_fetch_assoc($result) ){
       $rowset[] = $row;
   }
}else{
   $rowset = array();
}

?>
<!-- main -->

<div id="main">
  <div id="sidebar">
    <h2>站内导航</h2>
    <?php if(checkSession() == true){ ?>
    <ul>
      <li><a href="#" >管理员信息</a></li>
      <li>用户名:<?php echo $_SESSION['adminuser'] ;?></li>
      <li>密 码:<?php echo $_SESSION['adminpass'] ;?></li>
      <li><a href="logincheck.php?do=exit">退出登录</a></li>
    </ul>
    <?php }?>
    <br />
    <ul>
	  <li><a href="introduce.html">网站首页</a></li>
      <li><a href="http://www.w3school.com.cn">技术支持</a></li>
	
      <li><a href="introduce.html">关于我们</a></li>
    </ul>
  </div>
  <div id="text">
    <h1><img src="images/edit-icon.gif"/>查看所有路线评价</h1>
    <?php foreach ($rowset as $row) {?>
    <h2>标题：<?php echo($row["title"]); ?></h2>
    <div id="cls" class="cls">&nbsp;&nbsp;<?php echo($row["body"]); ?></div>
    <?php if(!empty($row["reply"])){?>
    <fieldset>
      <legend>管理员回复：</legend>
      <ul>
        <img src="images/arrow.gif" alt="" /> <?php echo($row["reply"]); ?>
      </ul>
    </fieldset>
    <?php } ?>
    <p class="date">Posted by <?php echo($row["visitor"]); ?> <img src="images/more.gif" alt="" /> <?php echo($row["url"]); ?> <img src="images/comment.gif" alt="" /> 发表于于<?php echo($row["create_at"]); ?> <img src="images/timeicon.gif" alt="" /> 
  
    <?php } mysql_close($conn); ?>
    
  </div>
</div>
<!-- footer -->
<div id="footer">
  
</div>
<!-- end footer -->
</body></html>