<div class="top-bar">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?= $baseurl ?>"><?= $site->title ?></a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    if ($user['name'] == null) {
                        require 'top-bar-unlogged.php';
                    } else {
                        require 'top-bar-logged.php';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</div>
