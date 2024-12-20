<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <table class="table">
        <thead>
          <tr>
            <th>Gambar</th>
            <th>Nama Produk</th>
            <th>Harga Satuan</th>
            <th>Kuantitas</th>
            <th>Total Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach (($carts?:[]) as $cart): ?>
                <tr>
                    <td><img src="<?= ($BASE) ?>/public/images/1.jpg" class="image is-64x64" alt="logo"></img></td>
                    <td><br><?= ($cart['name']) ?></td>
                    <td><br>Rp<?= ($cart['price']) ?></td>
                    <td>
                        <div class="quantity column has-text-left level">
                            <div class="field has-addons">
                                <p class="control">
                                    <button
                                    class="button is-light"
                                    type="button"
                                    onclick="changeQty(-1)"
                                    >
                                    -
                                    </button>
                                </p>
                                <p class="control">
                                    <input
                                    class="input"
                                    name="qty"
                                    type="number"
                                    value="<?= ($cart['qty']) ?>"
                                    min="1"
                                    id="quantityInput"
                                    />
                                </p>
                                <p class="control">
                                    <button
                                    class="button is-light"
                                    type="button"
                                    onclick="changeQty(1)"
                                    >
                                    +
                                    </button>
                                </p>
                            </div>
                        </div>
                    </td>
                    <td><br>Rp<?= ($cart['price']*$cart['qty']) ?>.000</td>    
                    <td>
                        <br><a href="<?= ($BASE) ?>/remove/<?= ($cart['id']) ?>">
                            <button class="button is-info is-small">
                            Hapus
                            </button>
                          </a> 
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>        
      </table>
    </div>
  </div>
</div>

<!-- Script atur kuantitas produk  -->
<script>
    function changeQty(amount) {
      const qtyInput = document.getElementById("quantityInput");
      let currentQty = parseInt(qtyInput.value);
      if (!isNaN(currentQty)) {
        let newQty = currentQty + amount;
        if (newQty < 1) newQty = 1; // tidak boleh kurang dari 1
        qtyInput.value = newQty;
      }
    }
  </script>
<!-- ==================== DESKTOP ====================>

<section class="section grey is-hidden-touch">
    <div class="container column is-9">
        <div class="box cart-item">
            <div class="columns">
                <div class="column is-1">
                    <input type="checkbox">
                </div>
                <div class="column is-4">Produk</div>
                <div class="column">Harga Satuan</div>
                <div class="column">Kuantitas</div>
                <div class="column">Total Harga</div>
                <div class="column">Aksi</div>
            </div>
            <hr class="custom-hr">
            <div class="columns">
                <div class="column is-1">
                    <input type="checkbox">
                </div>
                <div class="column is-4">
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong><br>
                                    <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="column">
                    <span class="has-text-grey"><s>Rp8.000.00</s></span> Rp3.069.00
                </div>
                <div class="column">
                    <div class="field has-addons">
                        <p class="control">
                            <button class="button is-static">-</button>
                        </p>
                        <p class="control">
                            <input class="input" type="number" value="1" style="width: 50px;">
                        </p>
                        <p class="control">
                            <button class="button is-static">+</button>
                        </p>
                    </div>
                </div>
                <div class="column">Rp3.069.00</div>
                <div class="column">
                    <a class="button is-info is-small">Hapus</a><br>
                </div>
            </div>
            <hr>
            <div class="columns">
                <div class="column is-1">
                    <input type="checkbox">
                </div>
                <div class="column is-4">
                    <article class="media">
                        <figure class="media-left">
                            <p class="image is-64x64">
                                <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image">
                            </p>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong><br>
                                    <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="column">
                    <span class="has-text-grey"><s>Rp8.000.00</s></span> Rp3.069.00
                </div>
                <div class="column">
                    <div class="field has-addons">
                        <p class="control">
                            <button class="button is-static">-</button>
                        </p>
                        <p class="control">
                            <input class="input" type="number" value="1" style="width: 50px;">
                        </p>
                        <p class="control">
                            <button class="button is-static">+</button>
                        </p>
                    </div>
                </div>
                <div class="column">Rp3.069.00</div>
                <div class="column">
                    <a class="button is-info is-small">Hapus</a><br>
                </div>
            </div>
        </div>

        <div class="box">
            <div class="columns">
                <div class="column is-12">
                    <p>Gratis Ongkir s/d Rp40.000 dengan min. belanja Rp0</p>
                </div>
            </div>
            <div class="columns">
                <div class="column is-12">
                    <p>Gratis Ongkir s/d Rp40.000 dengan min. belanja Rp0</p>
                </div>
            </div>
        </div>
        <div class="box p-0">
            <div class="column-wrapper">
                <div class="column is-flex is-justify-content-end">
                    <p class="has-text-weight-semibold mr-6">Voucher Gratis</p>
                    <a href="" class="has-text-info">Gunakan/ masukkan kode</a>
                </div>
                <hr class="m-0">
                <div class="column is-flex is-justify-content-end">
                    <p class="has-text-weight-medium mr-6">Tidak ada produk yang dipilih</p>
                    <p class="has-text-grey has-text-weight-bold">-Rp0</p>
                </div>
                <hr class="m-0">
                <div class="column is-flex">
                    <div class="column is-half is-flex is-align-items-center p-0">
                        <input type="checkbox">
                        <p class="ml-5">Pilih Semua(2)</p>
                        <p class="ml-5">Hapus</p>
                        <p class="ml-5 has-text-info">Tambahkan ke Favorit</p>
                    </div>
                    <div class="column is-half is-flex is-justify-content-end is-align-items-center p-0">
                        <p class="mr-1">Total (0 Produk)</p>
                        <p class="mr-3 is-size-4 has-text-info">Rp0</p>
                        <a href="<?= ($BASE) ?>/checkout" class="button is-info">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="title is-5 mt-6">Kamu Mungkin Juga Suka</h2>
        <div id="content-desktop" class="column m-0" style="margin: 1rem;">
            
            <div class="row mb-4">
                <div class="is-flex columns is-multiline">
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail" class="href">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/1.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail" class="href">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="is-flex columns is-multiline">
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                    <div class="column box grid-border is-radiusless mb-1 p-0">
                        <div class="is-flex column is-align-items-center p-0">
                            <a href="<?= ($BASE) ?>/detail">
                            <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                            </figure>
                            <div class="nama-produk m-3">
                            <p class="product-title">Tutup Oli Nmax.</p>
                            <div class="product-tags">
                                <span class="tag is-danger">Diskon</span>
                                <span class="tag is-primary">-69%</span>
                            </div>
                            <p class="product-price">Rp1.919.000</p>
                            <p class="product-sold">307 Terjual</p>
                        </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="loading-desktop" class="loader-wrapper column is-4 is-offset-4 my-6">
                <div class="is-flex is-justify-content-center">
                    <div class="loader is-loading"></div>
                </div>
            </div>
        </div>
        <div class="has-text-centered">
            <div>
                <a href="#" class="button is-light">Lihat Lainnya</a>
            </div>
        </div>
    </div>
</section>


<section class="section grey p-0 is-hidden-desktop">
        <div class="container">
            <div class="box is-flex is-sticky-top p-0 m-0" style="z-index: 10;">
                <div class="column is-four-fifths-touch is-flex is-align-items-center">
                    <a href="#" class="button is-info">
                        <i class="icofont-arrow-left"></i>
                    </a>
                    <p class="ml-3">Keranjang Saya</p>
                </div>
                <div class="column is-flex is-justify-content-end is-align-items-center">
                    <p>Ubah</p>
                </div>
            </div>

            <div class="box cart-item pb-2 px-0 mb-2">
                <div class="column p-0">
                    <div class="column is-flex py-0">
                        <div class="column is-one-fifth-touch is-flex is-align-items-center">
                            <input type="checkbox">
                        </div>
                        <div class="column is-four-fifths-touch is-flex is-justify-content-end">
                            <p>Ubah</p>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="column is-flex pb-0">
                        <div class="column is-1-touch" style="padding-top: 2rem;">
                            <input type="checkbox">
                        </div>
                        <div class="column">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong><br>
                                            <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="column pt-0">
                        <div class="column is-offset-4-touch p-0">
                        <span class="has-text-grey"><s>Rp8.000.00</s></span><span class="has-text-info"> Rp3.069.00</span>
                        <div class="field has-addons mt-3">
                            <p class="control">
                                <button class="button is-static">-</button>
                            </p>
                            <p class="control">
                                <input class="input" type="number" value="1" style="width: 50px;">
                            </p>
                            <p class="control">
                                <button class="button is-static">+</button>
                            </p>
                        </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="column px-5 py-3">
                        <p class="has-text-weight-light">Gratis Ongkir s/d Rp15.000 dengan min. belanja RP0; Gratis Ongkir s/d Rp250.000 dengan min. belanja Rp3.000.000</p>
                    </div>
                </div>
            </div>
            <div class="box cart-item pb-2 px-0 mb-2">
                <div class="column p-0">
                    <div class="column is-flex py-0">
                        <div class="column is-one-fifth-touch is-flex is-align-items-center">
                            <input type="checkbox">
                        </div>
                        <div class="column is-four-fifths-touch is-flex is-justify-content-end">
                            <p>Ubah</p>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="column is-flex pb-0">
                        <div class="column is-1-touch" style="padding-top: 2rem;">
                            <input type="checkbox">
                        </div>
                        <div class="column">
                            <article class="media">
                                <figure class="media-left">
                                    <p class="image is-64x64">
                                        <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image">
                                    </p>
                                </figure>
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong>Cover Radiator Vario 255cc Warna Silver Metalis</strong><br>
                                            <p><span class="tag is-success is-light">Bebas Pengembalian</span></p>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="column pt-0">
                        <div class="column is-offset-4-touch p-0">
                        <span class="has-text-grey"><s>Rp8.000.00</s></span><span class="has-text-info"> Rp3.069.00</span>
                        <div class="field has-addons mt-3">
                            <p class="control">
                                <button class="button is-static">-</button>
                            </p>
                            <p class="control">
                                <input class="input" type="number" value="1" style="width: 50px;">
                            </p>
                            <p class="control">
                                <button class="button is-static">+</button>
                            </p>
                        </div>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="column px-5 py-3">
                        <p class="has-text-weight-light">Gratis Ongkir s/d Rp15.000 dengan min. belanja RP0; Gratis Ongkir s/d Rp250.000 dengan min. belanja Rp3.000.000</p>
                    </div>
                </div>
            </div>
    
            <div class="box is-fixed-bottom p-0 m-0" style="z-index: 10;">
                <div class="wrapper">
                    <div class="column is-flex level m-0">
                        <div class="column is-half p-0 is-flex">
                            <p class="has-text-weight-semibold is-size-7">Voucher Gratis</p>
                        </div>
                        <div class="column is-half is-flex is-justify-content-end p-0">
                            <a href="" class="has-text-info is-size-7">Gunakan/ masukkan kode</a>
                        </div>
                    </div>
                    <hr class="m-0">
                    <div class="column">
                        <p class="has-text-weight-medium is-size-7">Tidak ada produk yang dipilih</p>
                    </div>
                    <hr class="m-0">
                    <div class="column is-flex">
                        <div class="column is-half is-flex is-align-items-center p-0">
                            <input type="checkbox">
                            <p class="ml-1 is-size-7">Pilih Semua</p>
                        </div>
                        <div class="column is-half is-flex is-justify-content-end is-align-items-center p-0">
                            <p class="mr-1 is-size-7">Total:</p>
                            <p class="mr-3 is-size-7 has-text-info">Rp0</p>
                            <a href="<?= ($BASE) ?>/checkout" class="button is-info is-size-7">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
    
            <h2 class="title is-5 mt-6 pl-4">Kamu Mungkin Juga Suka</h2>
            <div id="content-mobile" class="column m-1 px-4">
                
                <div class="row mb-4">
                    <div class="is-flex columns is-multiline">
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail" class="href">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                    <p class="product-title">Tutup Oli Nmax.</p>
                                    <div class="product-tags">
                                        <span class="tag is-danger">Diskon</span>
                                        <span class="tag is-primary">-69%</span>
                                    </div>
                                    <p class="product-price">Rp1.919.000</p>
                                    <p class="product-sold">307 Terjual</p>
                                </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/1.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail" class="href">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/2.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="row mb-4">
                    <div class="is-flex columns is-multiline">
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/3.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/4.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                        <div class="column box grid-border is-radiusless mb-1 p-0">
                            <div class="is-flex column is-align-items-center p-0">
                                <a href="<?= ($BASE) ?>/detail">
                                <figure class="image is-fullwidth m-0" style="width: 100%; height: auto;">
                                    <img src="<?= ($BASE) ?>/public/images/5.jpg" alt="Product Image" class="is-fullwidth is-radiusless" style="width: 100%; height: auto;">
                                </figure>
                                <div class="nama-produk m-3">
                                <p class="product-title">Tutup Oli Nmax.</p>
                                <div class="product-tags">
                                    <span class="tag is-danger">Diskon</span>
                                    <span class="tag is-primary">-69%</span>
                                </div>
                                <p class="product-price">Rp1.919.000</p>
                                <p class="product-sold">307 Terjual</p>
                            </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="loading-mobile" class="loader-wrapper column is-4 is-offset-4 my-6">
                    <div class="is-flex is-justify-content-center">
                        <div class="loader is-loading"></div>
                    </div>
                </div>
            </div>
            <div class="has-text-centered">
                <div>
                    <a href="#" class="button is-light">Lihat Lainnya</a>
                </div>
            </div>
        </div>
</section> -->
