<?php include "include/header.php"; ?>
  <!-- main -->
  <div id="main">
    <div id="sidebar">
      <h2>站内导航</h2>
      <ul>
        <li><a href="http://www.w3school.com.cn">技术支持</a></li>
        <li><a href="introduce.html">关于我们</a></li>
      </ul>
    </div>
    <div id="text">
      <h1><img src="images/edit-icon.gif"/>管理员登录</h1>
      <table width="392" height="96" border="0" cellpadding="0" cellspacing="0">
        <form name="form1" method="post" action="loginCheck.php">
          <tr>
            <td width="138" height="35">用户名：
              <input name="user" type="text" id="user3" size="15"></td>
          </tr>
          <tr>
            <td height="29">密&nbsp;&nbsp;&nbsp;&nbsp;码：
              <input name="pass" type="password" id="pass2" size="15"></td>
          </tr>
          <tr>
            <td height="32"><input type="hidden" name="do" id="do" value="login">
              <input type="submit" value="登录 " style="width:60px;"/>
              <input name="重置" type="reset" value="重置 " style="width:60px;"/></td>
          </tr>
        </form>
      </table>
    </div>
  </div>
  <!-- end main -->
 <!-- footer -->
<div id="footer">
  
 
</div>
<!-- end footer -->
</div>
</body>
</html>
