<?php
	/**
	 * 小安云平台-微贴吧 发送验证邮箱页 开发语言：PHP 数据库：MYSQL 官方网站http://www.xiaoan.gq/
     * 请勿未经程序原作者同意而随意更改版权信息后再次发布。请保留程序底部的原作者信息。
     * 建议请使用PHP5.3环境，否则mysql_query()函数可能无法被执行，程序无法执行一切数据库操作！
	 * 注：本邮件类都是经过我测试成功了的，如果大家发送邮件的时候遇到了失败的问题，请从以下几点排查：
	 * 1. 用户名和密码是否正确；
	 * 2. 检查邮箱设置是否启用了smtp服务；
	 * 3. 是否是php环境的问题导致；
	 * 4. 将26行的$smtp->debug = false改为true，可以显示错误信息，然后可以复制报错信息到网上搜一下错误的原因；
	 * 5. 如果还是不能解决，可以访问：http://www.daixiaorui.com/read/16.html#viewpl 
	 *    下面的评论中，可能有你要找的答案。
	 * 6. 千万不要更改本文件中的163邮箱的密码！！！否则其他用户谁也用不了！！！
	 */
require_once("../../source/email.class.php");
error_reporting (E_ALL &~E_NOTICE &~E_DEPRECATED);
	//******************** 配置信息 ********************************
	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "xiaoancloud@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = $row[3];//发送给谁
	$smtpuser = "xiaoancloud";//SMTP服务器的用户帐号
	$smtppass = "donotchangeit123";//SMTP服务器的用户密码
	$mailcontent = "<meta http-equiv='content-type' content='text/html;charset=UTF-8'>您的邮箱验证码是:<b>".$post."</b>";//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	if($state=="")
	{
		die ("<script  type='text/javascript'>alert('对不起，邮件发送失败！请检查邮箱填写是否有误。');</script>");	
	}
	echo "<script  type='text/javascript'>alert('恭喜！邮件发送成功！请注意查收。');</script>";
?>