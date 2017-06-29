 <table class="table">
     <tr>
         <td>
             <b><?= $sex ?>的用户名:<p></b><?= $usr->name ?>
         </td>
         <td>
             <b><?= $sex ?>的uid:<p></b><?= $usr ->id ?>
         </td>
         <td>
             <b><?= $sex ?>的年龄:<p></b><?= $age ?>岁
         </td>
     </tr>
     <tr>
         <td>
             <b><?= $sex ?>的注册时间：<p></b><?= $info->regtime ?>
         </td>
         <td>
             <b><?= $sex ?>的电子邮箱：<p></b><?= $info->email ?>
         </td>
         <td>
             <b><?= $sex ?>的生日：<p></b><?= $birthday[1] ?>月<?= $birthday[2] ?>日
         </td>
     </tr>
 </table>