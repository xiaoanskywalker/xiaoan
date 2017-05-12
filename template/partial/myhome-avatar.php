<center><h4>修改头像</h4></center>
<form enctype="multipart/form-data" action="" method="post">
    <input type="hidden" name="MAX_FILE_SIZE" value="1000">
    <input name="myFile" type="file">
    <input type="submit" value="上传文件">
</form>
<?php
Home::Upload("$baseurl/static/img/avatars/$User->name.png")