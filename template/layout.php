<?php
/**
 * (C)2016-2017 Xiaoanbbs All rights reserved.
 * Last modify version:0.5.0
 * Author: Xiaoan
 * File: /template/layout.php
 */
?><!DOCTYPE html>
<html lang="zh-cn">
<?php require 'partial/head.php'; ?>
<body class="<?= $page['body']['class'] ?>" onload="show()">
<div class="layout">
    <?php require 'partial/top-bar.php'; ?>
    <div class="container">
        <?php
        require $body;
        require 'partial/footer.php';
        ?>
    </div>
</div>
</body>
</html>
