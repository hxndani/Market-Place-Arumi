<section class="section grey">
    <div class="container column is-9">
        <div class="columns">
            <div class="column is-one-quarter">
                <aside class="menu">
                    <ul class="menu-list">
                        <li id="profil" class="has-submenu">
                            <a><i class="icofont-user-alt-6 has-text-link"></i>
                            Akun Saya</a>
                            <ul>
                                <li><a href="<?= ($BASE) ?>/profil">Profil</a></li>
                                <li><a href="<?= ($BASE) ?>/bank">Bank dan Kartu</a></li>
                                <li><a href="<?= ($BASE) ?>/alamat">Alamat</a></li>
                                <li><a>Ubah Password</a></li>
                                <li><a href="<?= ($BASE) ?>/pengaturan_notifikasi">Pengaturan Notifikasi</a></li>
                                <li><a>Pengaturan Privasi</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= ($BASE) ?>/pengiriman">
                            <i class="icofont-vehicle-delivery-van has-text-primary"></i>Pesanan Saya</a></li>
                        <li id="notifikasi" class="has-submenu">
                            <a><i class="icofont-notification has-text-warning"></i>
                                Notifikasi</a>
                            <ul>
                                <li><a>Status Pesanan</a></li>
                                <li><a>Promo Arumi</a></li>
                                <li><a>Info Arumi</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= ($BASE) ?>/voucher"><i class="icofont-ticket has-text-danger"></i>Voucher Saya</a></li>
                    </ul>
                </aside>
            </div>

            <script>
                document.getElementById('profil').addEventListener('click', function() {
                    this.classList.toggle('active');
                });
                document.getElementById('notifikasi').addEventListener('click', function() {
                    this.classList.toggle('active');
                });
            </script>