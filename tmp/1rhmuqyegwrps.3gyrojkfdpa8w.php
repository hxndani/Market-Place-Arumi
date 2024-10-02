<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arumi</title>
    <!-- <link rel="stylesheet" type="text/css" href="<?= ($BASE) ?>/ui/jquery/jquery-ui/jquery-ui.css"> -->
    <link rel="stylesheet" type="text/css" href="<?= ($BASE) ?>/public/bulma-0.9.1/css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="<?= ($BASE) ?>/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= ($BASE) ?>/public/icofont/icofont.min.css">
</head>

<body>
    <nav class="navbar header is-sticky-top">
        <div class="container column is-9 is-size-7">
            <div class="navbar-brand has-text-white">
                <a role="button" class="navbar-burger has-text-white" aria-label="menu" aria-expanded="false" data-target="navbar">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
            
            <div id="navbar" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item nav-hover has-text-white" href="#">Seller Centre</a>
                    <a class="navbar-item nav-hover has-text-white" href="#">Download</a>
                    <span class="navbar-item has-text-white">Ikuti kami di</span>
                    <a class="navbar-item nav-hover has-text-white" href="#"><i class="icofont-facebook"></i></a>
                    <a class="navbar-item nav-hover has-text-white" href="#"><i class="icofont-instagram"></i></a>
                </div>
                <div class="navbar-end">
                    <a class="navbar-item nav-hover has-text-white" href="#"><i class="icofont-bell"></i> Notifikasi</a>
                    <a class="navbar-item nav-hover has-text-white" href="#"><i class="icofont-info-circle"></i> Bantuan</a>
                    <a class="navbar-item nav-hover has-text-white" href="#"><i class="icofont-globe"></i> Bahasa Indonesia</a>
                    
                    <?php if ($SESSION): ?>
                        
                            <a class="navbar-item nav-hover has-text-white" href="<?= ($BASE) ?>/profil"><?= ($SESSION['user']) ?></a>
                            <a class="navbar-item nav-hover has-text-white" href="<?= ($BASE) ?>/logout">Logout</a>
                        
                        <?php else: ?>
                            <!-- <a class="navbar-item nav-hover has-text-white" href="<?= ($BASE) ?>/datadiri">Daftar</a> -->
                            <a class="navbar-item nav-hover has-text-white" href="<?= ($BASE) ?>/datadiri">Daftar</a>
                            <a class="navbar-item nav-hover has-text-white" href="<?= ($BASE) ?>/login">Login</a>
                        
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </nav>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/66bacc77146b7af4a4399f7a/1i54qtdl2';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);

        })();
        
        document.addEventListener('DOMContentLoaded', function () {
            Tawk_API.onLoad = function() {
                var tawkLogo = document.querySelector('.tawk-min-container .tawk-min-btn');
                if (tawkLogo) {
                    tawkLogo.classList.add('is-hidden-touch');
                }
                document.getElementById('chat-button-mobile').addEventListener('click', function () {
                    Tawk_API.toggle();
                });
            };
        });
    </script>
    <!--End of Tawk.to Script-->

    <!-- Script untuk mengaktifkan hamburger menu -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);
            if ($navbarBurgers.length > 0) {
                $navbarBurgers.forEach(el => {
                    el.addEventListener('click', () => {
                        const target = el.dataset.target;
                        const $target = document.getElementById(target);

                        el.classList.toggle('is-active');
                        $target.classList.toggle('is-active');
                    });
                });
            }
        });
    </script>

