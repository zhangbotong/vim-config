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
      <h1><img src="images/edit-icon.gif"/>发表路线评价</h1>
<form action="dao.php?do=new" method="post" id="form1" name="form1" >
        <dl>
          <dt>
            <label for="title">标题：</label>
          </dt>
          <dd>
            <input type="text" width="260px" name="title"  id="title"/>
            （×必填）</dd>
          <dt>
            <label for="vname">姓名：</label>
          </dt>
          <dd>
            <input type="text" width="260px" name="vname"  id="vname"/>
            （×必填）</dd>
          <dt>
            <label for="url">网址或者邮箱：</label>
          </dt>
          <dd>
            <input type="text" width="260px" name="url"  id="url"/>
            （×必填）</dd>
          <dt>
            <label for="body">内容：</label>
          </dt>
          <dd>
            <textarea cols="40" rows="5" name="body"  id="body"></textarea>
            （×必填）</dd>
        </dl>
        <input type="submit" id="btnsave" name="btnsave" value="保存" style="width:60px;" />
        <input type="reset"  id="btn" name="btn" value="重置"  style="width:60px;"/>
      </form>
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
