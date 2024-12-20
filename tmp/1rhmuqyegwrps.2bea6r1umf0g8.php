<section class="section grey is-hidden-touch">
    <div class="container column is-9">
        <div class="box">
            <h2 class="title is-4 has-text-danger"><i class="icofont-location-pin"></i> Alamat Pengiriman</h2>
            <div class="columns">
                <div class="column is-9">
                    <p><strong>rama dhanu (+62) 85624240421</strong></p>
                    <p>Jalan Nakula Sadewa Raya, Kel. Dukuh, Sidomukti, KOTA SALATIGA - SIDOMUKTI, JAWA TENGAH, ID 50723
                    </p>
                </div>
                <div class="column is-3 has-text-right">
                    <button class="button is-small is-info">Ubah</button>
                </div>
            </div>
            <label class="checkbox">
                <input type="checkbox"> Kirim sebagai Dropshipper
            </label>
        </div>

        <div class="box">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>Produk Dipesan</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="is-flex">
                                    <figure class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                                    </figure>
                                    <div class="ml-3">
                                        <p><strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong></p>
                                        <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>Rp3.069.00</td>
                            <td>1</td>
                            <td>Rp3.069.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="is-flex">
                                    <figure class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image">
                                    </figure>
                                    <div class="ml-3">
                                        <p><strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong></p>
                                        <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>Rp3.069.00</td>
                            <td>1</td>
                            <td>Rp3.069.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Pesan:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="(Opsional) Tinggalkan pesan ke penjual">
                    </div>
                </div>
                <div class="column">
                    <label class="label">Opsi Pengiriman:</label>
                    <div class="content">
                        <p><strong>Kargo</strong></p>
                        <p class="has-text-primary is-small-text">Garansi tiba: 26 - 28 Jul</p>
                        <p class="is-gray is-small-text">Voucher s/d Rp10.000 jika pesanan belum tiba</p>
                    </div>
                </div>
                <div class="column is-narrow">
                    <button class="button is-small is-info js-modal-trigger" data-target="cargo">Ubah</button>
                    <p>Rp91.000</p>
                </div>
            </div>
        </div>

        <div class="box">
            <p class="title is-5">Metode Pembayaran</p>
            <div class="payment-methods">
                <button class="button is-light">BRI</button>
                <button class="button is-light">Bank Jateng</button>
                <button class="button is-light">BNI</button>
                <button class="button is-light">BCA</button>
                <button class="button is-light">Mandiri</button>
            </div>
            <div class="columns">
                <div class="column is-8"></div>
                <div class="column is-4">
                    <div class="content">
                        <table class="table is-fullwidth">
                            <tbody>
                                <tr>
                                    <th>Subtotal untuk Produk:</th>
                                    <td>Rp3.069.00</td>
                                </tr>
                                <tr>
                                    <th>Subtotal Pengiriman:</th>
                                    <td>Rp00.00</td>
                                </tr>
                                <tr>
                                    <th>Total Ongkos Kirim:</th>
                                    <td>Rp0.00</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran:</th>
                                    <td>Rp3.069.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <button class="button is-info is-fullwidth js-modal-trigger" data-target="mapModal">Buat
                        Pesanan</button>
                    <div id="mapModal" class="modal">
                        <div class="modal-background"></div>

                        <div class="modal-content">
                            <div class="box">
                                <form action="">
                                    <div class="columns-1 is-flex">
                                        <div class="column is-one-quarter">
                                            <input type="text" class="input" placeholder="Nama Depan">
                                        </div>
                                        <div class="column is-one-quarter">
                                            <input type="text" class="input" placeholder="Nama Belakang">
                                        </div>
                                        <div class="column is-half">
                                            <input type="text" class="input" placeholder="Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="columns-2 is-flex">
                                        <div class="column is-half pt-0">
                                            <input type="text" class="input" placeholder="Alamat">
                                        </div>
                                        <div class="column is-half pt-0 px-0">
                                            <div class="columns-2-a is-flex">
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kota">
                                                </div>
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Provinsi">
                                                </div>
                                            </div>
                                            <div class="columns-2-b is-flex">
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kecamatan">
                                                </div>
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kode Pos">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map" style="height: 40vh;"></div>
                                </form>
                                <div class="columns mt-3">
                                    <div class="column is-flex is-justify-content-center">
                                        <button class="button is-info level">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>

                    <div id="cargo" class="modal">
                        <div class="modal-background"></div>
                        <div class="modal-content">
                            <div class="box">

                                <div>
                                    <p class="is-size-5"><strong>Pilih Opsi Pengiriman</strong></p>
                                    <p class="is-size-5">PILIH JASA PENGIRIMAN</p>
                                </div>
                                <div class="mt-3">
                                    <p class="is-size-6"><strong>Garansi tepat waktu</strong></p>
                                    <p class="is-size-6">Voucher s/d Rp10.000 jika pesanan terlambat</p>
                                </div>

                                <div class="columns is-multiline my-2">
                                    <a href="#" class="column is-full box has-background-light">
                                        <p class="is-size-6"><strong>Reguler</strong>Rp15.000</p>
                                        <p class="has-text-primary is-small-text icofont-fast-delivery">Garansi tiba: 26 - 28 Jul</p>
                                    </a>
                                    <a href="#" class="column is-full box has-background-light">
                                        <p class="is-size-6"><strong>Hemat</strong></p>
                                        <p class="has-text-dark is-small-text">Garansi tiba: 27 - 30 Jul</p>
                                    </a>
                                    <a href="#" class="column is-full box has-background-light">
                                        <p class="is-size-6"><strong>Kargo</strong></p>
                                        <p class="has-text-dark is-small-text">Garansi tiba: 27 - 29 Jul</p>
                                    </a>
                                    <a href="#" class="column is-full box has-background-light">
                                        <p class="is-size-6"><strong>Instan</strong></p>
                                        <p class="has-text-danger is-small-text">Pengiriman Tidak Tersedia</p>
                                    </a>
                                </div>
                                <div class="columns mt-3">
                                    <div class="product-actions column has-text-right buttons are-normal">
                                        <a class="button is-info">Nanti</a>
                                        <a class="button is-info is-outlined py-3">Konfirmasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- for mobile -->
<section class="section is-hidden-desktop">
    <div class="container">
        <div class="pb-2">
            <h2 class="title is-4 has-text-danger"><i class="icofont-location-pin"></i> Alamat Pengiriman</h2>
            <div class="columns">
                <div class="column is-9">
                    <p><strong>rama dhanu (+62) 85624240421</strong></p>
                    <p>Jalan Nakula Sadewa Raya, Kel. Dukuh, Sidomukti, KOTA SALATIGA - SIDOMUKTI, JAWA TENGAH, ID 50723
                    </p>
                </div>
                <div class="column is-3 has-text-right">
                    <button class="button is-small is-info">Ubah</button>
                </div>
            </div>
            <label class="checkbox">
                <input type="checkbox"> Kirim sebagai Dropshipper
            </label>
        </div>

        <div class="mb-2">
            <div class="table-container">
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>Produk Dipesan</th>
                            <th>Harga Satuan</th>
                            <th>Jumlah</th>
                            <th>Subtotal Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="is-flex">
                                    <figure class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                                    </figure>
                                    <div class="ml-3">
                                        <p><strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong></p>
                                        <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>Rp3.069.00</td>
                            <td>1</td>
                            <td>Rp3.069.00</td>
                        </tr>
                        <tr>
                            <td>
                                <div class="is-flex">
                                    <figure class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image">
                                    </figure>
                                    <div class="ml-3">
                                        <p><strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong></p>
                                        <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                    </div>
                                </div>
                            </td>
                            <td>Rp3.069.00</td>
                            <td>1</td>
                            <td>Rp3.069.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <hr>
            <div class="columns">
                <div class="column">
                    <label class="label">Pesan:</label>
                    <div class="control">
                        <input class="input" type="text" placeholder="(Opsional) Tinggalkan pesan ke penjual">
                    </div>
                </div>
                <div class="column">
                    <label class="label">Opsi Pengiriman:</label>
                    <div class="content">
                        <p><strong>Kargo</strong></p>
                        <p class="has-text-primary is-small-text">Garansi tiba: 26 - 28 Jul</p>
                        <p class="is-gray is-small-text">Voucher s/d Rp10.000 jika pesanan belum tiba</p>
                    </div>
                </div>
                <div class="column is-narrow">
                    <a class="button is-small is-info">Ubah</a>
                    <p>Rp91.000</p>
                </div>
            </div>
        </div>

        <div class="box">
            <p class="title is-5">Metode Pembayaran</p>
            <div class="payment-methods">
                <button class="button is-light">BRI</button>
                <button class="button is-light">Bank Jateng</button>
                <button class="button is-light">BNI</button>
                <button class="button is-light">BCA</button>
                <button class="button is-light">Mandiri</button>
            </div>
            <div class="columns">
                <div class="column is-8"></div>
                <div class="column is-4">
                    <div class="content">
                        <table class="table is-fullwidth">
                            <tbody>
                                <tr>
                                    <th>Subtotal untuk Produk:</th>
                                    <td>Rp3.069.00</td>
                                </tr>
                                <tr>
                                    <th>Subtotal Pengiriman:</th>
                                    <td>Rp00.00</td>
                                </tr>
                                <tr>
                                    <th>Total Ongkos Kirim:</th>
                                    <td>Rp0.00</td>
                                </tr>
                                <tr>
                                    <th>Total Pembayaran:</th>
                                    <td>Rp3.069.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <a class="button is-info is-fullwidth js-modal-trigger" data-target="mapModal">Buat
                        Pesanan</a>
                    <div id="mapModal" class="modal">
                        <div class="modal-background"></div>

                        <div class="modal-content">
                            <div class="box">
                                <form action="">
                                    <div class="columns-1 is-flex">
                                        <div class="column is-one-quarter">
                                            <input type="text" class="input" placeholder="Nama Depan">
                                        </div>
                                        <div class="column is-one-quarter">
                                            <input type="text" class="input" placeholder="Nama Belakang">
                                        </div>
                                        <div class="column is-half">
                                            <input type="text" class="input" placeholder="Nomor Telepon">
                                        </div>
                                    </div>
                                    <div class="columns-2 is-flex">
                                        <div class="column is-half pt-0">
                                            <input type="text" class="input" placeholder="Alamat">
                                        </div>
                                        <div class="column is-half pt-0 px-0">
                                            <div class="columns-2-a is-flex">
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kota">
                                                </div>
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Provinsi">
                                                </div>
                                            </div>
                                            <div class="columns-2-b is-flex">
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kecamatan">
                                                </div>
                                                <div class="column is-half pt-0">
                                                    <input type="text" class="input" placeholder="Kode Pos">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map" style="height: 40vh;"></div>
                                </form>
                                <div class="columns mt-3">
                                    <div class="column is-flex is-justify-content-center">
                                        <button class="button is-info level">Konfirmasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="modal-close is-large" aria-label="close"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ____________________ MODAL ON OFF ____________________ -->
<script>
    document.addEventListener('DOMContentLoaded', () => {

        // Fungsi on off
        function openModal($el) {
            $el.classList.add('is-active');
        }

        function closeModal($el) {
            $el.classList.remove('is-active');
        }

        function closeAllModals() {
            (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                closeModal($modal);
            });
        }

        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
            const modal = $trigger.dataset.target;
            const $target = document.getElementById(modal);

            $trigger.addEventListener('click', () => {
                openModal($target);
            });
        });

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            if (event.key === "Escape") {
                closeAllModals();
            }
        });
    });
</script>


<!-- ____________________ MAP ____________________ -->
<script>
    let map;

    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -6.200000, lng: 106.816666 },
            zoom: 13,
        });
    }

    document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('mapModal').classList.add('is-active');
        setTimeout(() => {
            google.maps.event.trigger(map, "resize");
        }, 100);
    });

    document.getElementById('closeModal').addEventListener('click', function () {
        document.getElementById('mapModal').classList.remove('is-active');
    });

    document.getElementById('closeModalFooter').addEventListener('click', function () {
        document.getElementById('mapModal').classList.remove('is-active');
    });
</script>

<script>
    document.getElementById('openModal').addEventListener('click', function () {
        document.getElementById('mapModal').classList.add('is-active');
        setTimeout(() => {
            google.maps.event.trigger(map, "resize");
            map.setCenter({ lat: -6.200000, lng: 106.816666 }); // Set ulang pusat peta
        }, 100);
    });
</script>

<!-- Google Maps API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>