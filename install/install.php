<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /install/install.php
 */
include("header.php");
?>
<script>
    function check(){
        var chec=document.getElementById("chec");
        if(chec.checked==true){
            document.getElementById("btn").removeAttribute("disabled")
        }else{
            document.getElementById("btn").disabled="disabled"
        }
    }
</script>
<h3>
    <span class="label label-info">1/5</span>--阅读使用协议
</h3>
<p>感谢您将 <b>小安社区</b> 用作您网站的论坛系统。<br>
本软件遵照<a href="http://www.gnu.org/licenses/gpl-3.0.html" target="_blank">GPL协议</a>开放源代码，您可以自由传播和修改，在遵照下面的约束条件的前提下：</p>
<p>一.用户可以自由地使用及二次发布本软件而不必征得原作者同意。</p>
<p>二.在二次发布时请务必不要删除这个使用协议。</p>
<p>三.请<b><font color="red">不要删除软件底部的名称及版权信息</font></b>，二次开发者可保留自己的版权信息。</p>
<p>只要你遵循上述条款规定，您就可以自由使用并传播本源代码。</p>
<center>
    <label  class="btn btn-default">
        <input type="checkbox" id="chec" onclick="check()" > 我已看过并接受 <span id="xieyi" onclick="foo3()">《使用协议》</span>
    </label>
    <a href="step-2.php" class="btn btn-primary" id="btn" disabled>下一步</a>
</center>
</div>
</body>