<!DOCTYPE html>
<html lang="zh-cn">

<?php require 'partial/head.php'; ?>

<body class="<?= $page['body']['class'] ?>">

<div class="layout">

    <?php require 'partial/top-bar.php'; ?>

    <div class="container">

        <?php require $body; ?>

    </div>
</div>

<?php require 'partial/import-js.php' ?>

</body>
</html>
