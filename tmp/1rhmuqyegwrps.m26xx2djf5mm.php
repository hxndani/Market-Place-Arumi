        <div class="column">
            <div class="box" style="margin-bottom: 1vh;">
                <div class="control has-icons-left">
                    <span class="icon is-small is-left">
                        <i class="icofont-search"></i>
                    </span>
                    <input class="input" type="text" placeholder="Kamu bisa mencari berdasarkan No.Pesanan atau Nama Produk" />
                </div>
            </div>

            <div class="box" style="margin-bottom: 1vh;">
                <div class="tabs is-boxed">
                    <ul>
                        <li class="is-active"><a>Semua</a></li>
                        <li><a>Belum Bayar</a></li>
                        <li><a>Sedang Dikemas</a></li>
                        <li><a>Dikirim</a></li>
                        <li><a>Selesai</a></li>
                        <li><a>Dibatalkan</a></li>
                        <li><a>Pengembalian Barang</a></li>
                    </ul>
                </div>
            </div>

            <div class="box" style="margin-bottom: 1vh;">
                <div class="information level-right is-flex" style="height: 1rem; max-height: max-content;">
                    <a href="<?= ($BASE) ?>/detail_pengiriman" class="has-text-primary is-size-7">
                        <i class="icofont-fast-delivery"></i>
                        Pesanan telah sampai diterima oleh Yang bersangkutan</a>
                    <hr class="vertical-hr">
                    <p class="is-size-7 has-text-info">SELESAI</p>
                </div>
                <hr class="mt-3">
                <a class="columns">
                    <div class="column is-2">
                        <figure class="image is-100%x100% is-flex is-align-items-center">
                            <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                        </figure>
                    </div>
                    <div class="column is-6 is-flex">
                        <div class="order-description">
                            <p class="is-size-5 has-text-black">Cover Radiator Vario 255cc Warna Silver Metalis</p>
                            <p class="is-size-7 has-text-grey">Variasi: Merah</p>
                            <p class="is-size-7 has-text-black">x1</p>
                            <span class="tag is-danger is-size-7 has-text-white">Bebas Pengembalian</span>
                        </div>
                    </div>
                    <div class="column is-flex is-align-items-center level-right">
                        <p class="has-text-link is-size-5">Rp3.069.00</p>
                    </div>
                </a>
                <hr>
                <div class="columns">
                    <div class="column is-10 is is-flex level-right">
                        <p class="is-size-6">Total Pesanan:</p>
                    </div>
                    <div class="column is-flex level-right">
                        <p class="has-text-link is-size-4">Rp3.069.00</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column level-right is-flex">
                        <a class="button is-info">Beli Lagi</a>
                    </div>
                </div>
            </div>

            <div class="box" style="margin-bottom: 1vh;">
                <div class="information level-right is-flex" style="height: 1rem; max-height: max-content;">
                    <p class="is-size-7 has-text-info">DIBATALKAN</p>
                </div>
                <hr class="mt-3">
                <a class="columns">
                    <div class="column is-2">
                        <figure class="image is-100%x100% is-flex is-align-items-center">
                            <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                        </figure>
                    </div>
                    <div class="column is-6 is-flex">
                        <div class="order-description">
                            <p class="is-size-5 has-text-black">Cover Radiator Vario 255cc Warna Silver Metalis</p>
                            <p class="is-size-7 has-text-grey">Variasi: Biru</p>
                            <p class="is-size-7 has-text-black">x1</p>
                            <span class="tag is-danger is-size-7 has-text-white">Bebas Pengembalian</span>
                        </div>
                    </div>
                    <div class="column is-flex is-align-items-center level-right">
                        <p class="has-text-link is-size-5">Rp3.069.00</p>
                    </div>
                </a>
                <hr>
                <div class="columns">
                    <div class="column is-10 is-flex level-right">
                        <p class="is-size-6">Total Pesanan:</p>
                    </div>
                    <div class="column is-flex level-right">
                        <p class="has-text-link is-size-4">Rp3.069.00</p>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-two-third is-flex level-left">
                        <span class="is-size-7">Dibatalkan Anda</span>
                    </div>
                    <div class="column is-half level-right is-flex">
                        <a class="button is-info">Beli Lagi</a>
                    </div>
                    <div class="column is-flex level-right">
                        <a class="button ml-3">Tampilkan Rincian Pembatalan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>