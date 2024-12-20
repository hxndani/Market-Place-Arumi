<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Gas Tipis</title>
    <link rel="stylesheet" href="<?= ($BASE) ?>/public/bulma-0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/public/icofont/icofont.min.css">
    <link rel="stylesheet" href="<?= ($BASE) ?>/public/css/admin.css">
</head>

<body>

    <nav class="navbar navbar-top is-fixed-top is-dark" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item brand frame-brand" href="<?= ($BASE) ?>/admin">
                <span>Admin</span>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarTopMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <?php if ($SESSION): ?>
            
                <div id="navbarTopMenu" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item" href="<?= ($BASE) ?>/admin">
                            <i class="icofont-home"></i>
                            &nbsp;Home
                        </a>

                        <a class="navbar-item" href="<?= ($BASE) ?>/admin/products">
                            <i class="icofont-cubes"></i>
                            &nbsp;Products
                        </a>

                        <a class="navbar-item" href="<?= ($BASE) ?>/admin/sales">
                            <i class="icofont-sale-discount"></i>
                            &nbsp;Promo
                        </a>

                        <a class="navbar-item" href="<?= ($BASE) ?>/admin/members">
                            <i class="icofont-users-alt-5"></i>
                            &nbsp;Members
                        </a>
                    </div>

                    <div class="navbar-end">
                        <a class="navbar-item" href="<?= ($BASE) ?>/logout">
                            <i class="icofont-lock"></i>
                            &nbsp;Logout
                        </a>
                    </div>
                </div>
            
        <?php endif; ?>
    </nav>
    <br />
    <br />
    <br />
    <br />