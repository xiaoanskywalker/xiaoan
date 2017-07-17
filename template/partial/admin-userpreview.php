<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/partial/admin-userpreview.php
 */
?>
<tr>
    <td><input type="checkbox" name="chk[<?= $value->u_id ?>]"></td>
    <td><?= $value->u_id ?></td>
    <td><?= $value->u_name ?></td>
    <td><?= $value->u_regtime ?></td>
    <td><?php
          switch ($value->u_admingp){
              case 1:
                  echo "普通管理员";
                  break;
              case 2:
                  echo "超级管理员";
                  break;
              default:
                  echo "普通用户";
          }
        ?>
    </td>
</tr>