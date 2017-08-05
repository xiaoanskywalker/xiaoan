<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.1
 * Author: Xiaoan
 * File: /template/partial/add-picture.php
 */
?>
<div id="massage_box">
    <div class="massage">
        <div class="headerrr" onmousedown='MDown(massage_box)'>
            <div style="display:inline; width:400px; position:absolute">添加图片 </div>
            <span onClick="d_y();" style="float:right; display:inline; cursor:hand">× </span>
        </div>

        <ul style="margin-right:25">
            图片URL：<input type = "text" id="picurl" class="form-control" value="http://"  required>
            <p></p><button class = "btn btn-success" onclick="addpic()">确定</button>
        </ul>

    </div>
</div>

<div id="mask" onClick="d_y();"> </div>