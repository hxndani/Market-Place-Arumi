<!-- for desktop -->
<section class="section size-gap grey is-hidden-touch">
  <div class="container column is-9 box mb-0">
    <div class="product-container">
      <div class="product-image columns">
        <div class="column">
          <div class="">
            <figure class="image is-1by1 slider-img-product">
              <img
                id="img-1-desktop"
                class="gambar-produk-desktop"
                src=""
                alt="Product Image"
              />
              <img id="img-2-desktop" src="" alt="Product Image" />
              <img id="img-3-desktop" src="" alt="Product Image" />
              <img id="img-4-desktop" src="" alt="Product Image" />
              <img id="img-5-desktop" src="" alt="Product Image" />
            </figure>
          </div>

          <div class="columns mt-2 px-1 navigation-button">
            <div class="column dot p-2 active">
              <img
                class="gambar-produk-desktop"
                src=""
                onclick="changeSlide(0)"
                alt="Product Thumbnail"
              />
            </div>
            <div class="column dot p-2">
              <img
                src="<?= ($BASE) ?>/public/images/2.jpg"
                onclick="changeSlide(1)"
                alt="Product Thumbnail"
              />
            </div>
            <div class="column dot p-2">
              <img
                src="<?= ($BASE) ?>/public/images/3.jpg"
                onclick="changeSlide(2)"
                alt="Product Thumbnail"
              />
            </div>
            <div class="column dot p-2">
              <img
                src="<?= ($BASE) ?>/public/images/4.jpg"
                onclick="changeSlide(3)"
                alt="Product Thumbnail"
              />
            </div>
            <div class="column dot p-2">
              <img
                src="<?= ($BASE) ?>/public/images/5.jpg"
                onclick="changeSlide(4)"
                alt="Product Thumbnail"
              />
            </div>
          </div>
          <div class="columns">
            <div class="column">
              <p>
                Share:
                <a href="#"><i class="icofont-facebook"></i></a>
                <a href="#"><i class="icofont-twitter"></i></a>
                <a href="#"><i class="icofont-pinterest"></i></a>
              </p>
            </div>
            <div class="column">
              <p>
                <a href="#"><i class="icofont-heart"></i> Favorit (100)</a>
              </p>
            </div>
          </div>
        </div>

        <div class="column">
          <div class="product-details has-text-left">
            <!-- <h1 class="title is-size-4">Cover Radiator Vario 125 arm</h1> -->
            <h1 class="title is-size-4"><?= ($product['name']) ?></h1>
            <p>
              <span class="icon-text">
                <span class="icon">
                  <i class="icofont-star has-text-warning"></i>
                </span>
                <span>4.5</span>
              </span>
              | 73 Penilaian | 200 Terjual
            </p>

            <p>
              <span class="price-old has-text-dark"
                ><del>$1,322.99</del> <?= ($product['price']) ?></span
              >
              <span
                id="harga-desktop"
                class="price-new has-text-danger is-size-3 title"
              ></span>
            </p>
            <table class="table is-fullwidth is-size-6">
              <tbody>
                <tr>
                  <th>Return:</th>
                  <td>Bebas Pengembalian</td>
                </tr>
                <tr>
                  <th>Cicilan:</th>
                  <td>24xRp123.456(Bunga 0%)</td>
                </tr>
                <tr>
                  <th>Protection:</th>
                  <td>
                    Melindungi Barangmu dari kerusakan akibat benturan atau hal
                    yang tidak disengaja
                  </td>
                </tr>
                <tr>
                  <th>Pengiriman:</th>
                  <td>Gratis Ongkir dengan min belanja Rp1000.000</td>
                </tr>
                <tr>
                  <th>Pengiriman Ke:</th>
                  <td>KOTA JAKARTA PUSAT</td>
                </tr>
                <tr>
                  <th>Variasi:</th>
                </tr>
              </tbody>
            </table>
            <div class="columns is-multiline is-mobile mx-1">
              <div class="column is-narrow">
                <div class="variant-item selected has-background-white">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/dda15e" alt="Varian 1"> -->
                  </figure>
                </div>
              </div>

              <div class="column is-narrow">
                <div class="variant-item has-background-warning">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/ffd700" alt="Varian 2"> -->
                  </figure>
                </div>
              </div>

              <div class="column is-narrow">
                <div class="variant-item has-background-info">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/cccccc" alt="Varian 3"> -->
                  </figure>
                </div>
              </div>

              <div class="column is-narrow">
                <div class="variant-item has-background-success">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/a9a9a9" alt="Varian 4"> -->
                  </figure>
                </div>
              </div>

              <div class="column is-narrow">
                <div class="variant-item has-background-dark">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/b5651d" alt="Varian 5"> -->
                  </figure>
                </div>
              </div>

              <div class="column is-narrow">
                <div class="variant-item has-background-danger">
                  <figure class="image is-48x48">
                    <!-- <img src="https://via.placeholder.com/48x48/000000" alt="Varian 6"> -->
                  </figure>
                </div>
              </div>
            </div>
            <form
              action="<?= ($BASE) ?>/addProduct/<?= ($product['id']) ?>"
              method="POST"
            >
              <div class="quantity column has-text-left level">
                <label class="label">Kuantitas:</label>
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
                      value="1"
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
                  <div>
                    <p class="pl-3">Tersisa 250 buah</p>
                  </div>
                </div>
              </div>
              <div
                class="product-actions column has-text-right buttons are-normal"
              >
                <button
                  type="submit"
                  class="button is-info is-outlined icofont-shopping-cart py-3"
                  onclick="Swal.fire('Produk telah ditambahkan ke keranjang')"
                >
                  Masukkan Keranjang
                </button>
                <a href="<?= ($BASE) ?>/checkout" class="button is-info"
                  >Beli Sekarang</a
                >
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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

<!-- for mobile -->
<section class="section is-hidden-desktop">
  <div class="container">
    <div class="product-container">
      <figure class="image is-square slider-img-product">
        <img
          id="img-1-mobile"
          class="gambar-produk-mobile"
          src=""
          alt="Product Image"
        />
        <img id="img-2-mobile" src="" alt="Product Image" />
        <img id="img-3-mobile" src="" alt="Product Image" />
        <img id="img-4-mobile" src="" alt="Product Image" />
        <img id="img-5-mobile" src="" alt="Product Image" />
      </figure>
    </div>
    <div class="product-thumbnails navigation-button">
      <div class="thumbnail-container dot">
        <figure class="image is-96x96">
          <img
            src=""
            class="gambar-produk-mobile"
            onclick="changeSlide(0)"
            alt="Thumbnail 1"
          />
        </figure>
      </div>
      <div class="thumbnail-container dot">
        <figure class="image is-96x96">
          <img
            src="<?= ($BASE) ?>/public/images/2.jpg"
            onclick="changeSlide(1)"
            alt="Thumbnail 1"
          />
        </figure>
      </div>
      <div class="thumbnail-container dot">
        <figure class="image is-96x96">
          <img
            src="<?= ($BASE) ?>/public/images/3.jpg"
            onclick="changeSlide(2)"
            alt="Thumbnail 1"
          />
        </figure>
      </div>
      <div class="thumbnail-container dot">
        <figure class="image is-96x96">
          <img
            src="<?= ($BASE) ?>/public/images/4.jpg"
            onclick="changeSlide(3)"
            alt="Thumbnail 1"
          />
        </figure>
      </div>
      <div class="thumbnail-container dot">
        <figure class="image is-96x96">
          <img
            src="<?= ($BASE) ?>/public/images/5.jpg"
            onclick="changeSlide(4)"
            alt="Thumbnail 1"
          />
        </figure>
      </div>
      <!-- Add more thumbnails as needed -->
    </div>
    <div class="columns">
      <div class="column">
        <p>
          Share:
          <a href="#"><i class="icofont-facebook"></i></a>
          <a href="#"><i class="icofont-twitter"></i></a>
          <a href="#"><i class="icofont-pinterest"></i></a>
        </p>
      </div>
      <div class="column">
        <p>
          <a href="#"><i class="icofont-heart"></i> Favorit (100)</a>
        </p>
      </div>
    </div>
  </div>

  <div class="column is-mobile">
    <div class="product-details">
      <h1 id="nama-produk-mobile" class="title"></h1>
      <p>
        <span class="icon-text">
          <span class="icon">
            <i class="icofont-star"></i>
          </span>
          <span>4.5</span>
        </span>
        | 73 Penilaian | 200 Terjual
      </p>
      <!-- <p>
                <span class="price-old"><del>$1,322.99</del></span>
                <span class="price-new">$999.99</span>
            </p> -->
      <table class="table is-fullwidth">
        <tbody>
          <tr>
            <th>Return:</th>
            <td>Bebas Pengembalian</td>
          </tr>
          <tr>
            <th>Cicilan:</th>
            <td>24xRp123.456(Bunga 0%)</td>
          </tr>
          <tr>
            <th>Protection:</th>
            <td>
              Melindungi Barangmu dari kerusakan akibat benturan atau hal yang
              tidak disengaja
            </td>
          </tr>
          <tr>
            <th>Pengiriman:</th>
            <td>Gratis Ongkir dengan min belanja Rp1000.000</td>
          </tr>
          <tr>
            <th>Pengiriman Ke:</th>
            <td>KOTA JAKARTA PUSAT</td>
          </tr>
          <tr>
            <th>Variasi:</th>
          </tr>
        </tbody>
      </table>
      <div class="columns is-multiline is-mobile mx-1">
        <div class="column is-narrow">
          <div class="variant-item selected has-background-white">
            <figure class="image is-48x48"></figure>
          </div>
        </div>

        <div class="column is-narrow">
          <div class="variant-item has-background-warning">
            <figure class="image is-48x48"></figure>
          </div>
        </div>

        <div class="column is-narrow">
          <div class="variant-item has-background-info">
            <figure class="image is-48x48"></figure>
          </div>
        </div>

        <div class="column is-narrow">
          <div class="variant-item has-background-success">
            <figure class="image is-48x48"></figure>
          </div>
        </div>

        <div class="column is-narrow">
          <div class="variant-item has-background-dark">
            <figure class="image is-48x48"></figure>
          </div>
        </div>

        <div class="column is-narrow">
          <div class="variant-item has-background-danger">
            <figure class="image is-48x48"></figure>
          </div>
        </div>
      </div>

      <div class="quantity column">
        <label class="label">Kuantitas</label>
        <div class="field has-addons">
          <p class="control">
            <button class="button is-light">-</button>
          </p>
          <p class="control">
            <input class="input" type="number" value="1" min="1" />
          </p>
          <p class="control">
            <button class="button is-light">+</button>
          </p>
          <div class="is-vcentered">
            <p class="ml-2">Tersisa 250 buah</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="box is-fixed-bottom p-0 m-0 is-hidden-desktop" style="z-index: 10">
  <div class="wrapper">
    <div class="column">
      <p class="is-flex is-align-items-center is-justify-content-space-between">
        <span class="price-old has-text-dark"><del>$1,322.99</del></span>
        <span
          id="harga-mobile"
          class="price-new has-text-danger is-size-3 title"
        ></span>
      </p>
    </div>
    <hr class="m-0" />
    <div class="column is-flex">
      <div class="column is-half is-flex is-align-items-center p-0">
        <a
          class="button is-info is-outlined icofont-shopping-cart py-3"
          onclick="Swal.fire('Produk telah ditambahkan ke keranjang')"
          >Masukkan Keranjang</a
        >
      </div>
      <div class="product-actions column has-text-right buttons are-normal">
        <a href="<?= ($BASE) ?>/checkout" class="button is-info">Beli Sekarang</a>
      </div>
    </div>
  </div>
</div>
<script src="/dist/sweetalert2.all.min.js"></script>

<style>
  /* Custom styles to achieve the desired layout */
  .product-image {
    border-radius: 8px;
    /* Adding corner radius */
    overflow: hidden;
  }

  .thumbnail-container img {
    border-radius: 8px;
  }

  .product-thumbnails {
    display: flex;
    overflow-x: auto;
    margin-top: 15px;
    padding-bottom: 10px;
  }

  .thumbnail-container {
    margin-right: 10px;
    flex-shrink: 0;
  }

  .product-container {
    text-align: center;
    margin-bottom: 20px;
  }

  .product-container img {
    width: 100%;
  }

  .product-variations {
    margin-top: 10px;
    font-size: 0.9rem;
    color: #4a4a4a;
  }
</style>

<script>
  document.querySelectorAll(".variant-image").forEach((item) => {
    item.addEventListener("click", (event) => {
      const mainImage = document.getElementById("main-image");
      mainImage.src = event.target.src;
    });
  });

  if (window.matchMedia("(max-width: 1023px)").matches) {
    // MOBILE
    const pathArray = window.location.pathname.split("/");
    const productId = pathArray[pathArray.length - 1];

    if (productId) {
      fetch(`/show_detail/${productId}`)
        .then((response) => response.json())
        .then((detail) => {
          console.log(detail);

          const product = detail[0];
          if (product) {
            const nama = document.getElementById("nama-produk-mobile");
            // const gambar = document.getElementById('gambar-produk');
            const gambar = document.querySelectorAll(".gambar-produk-mobile");
            const harga = document.getElementById("harga-mobile");

            console.log(gambar);

            nama.innerText = `${product.name}`;
            gambar[0].src = `<?= ($BASE) ?>/public/images/${product.product_img}`;
            gambar[1].src = `<?= ($BASE) ?>/public/images/${product.product_img}`;
            harga.innerText = `${product.price}`;
          } else {
            console.error("Product not found");
          }
        })
        .catch((error) =>
          console.error("Error fetching product detail:", error)
        );
    } else {
      console.error("Product ID not found");
    }

    var currentImg = 0;
    var imgs = document.querySelectorAll(".slider-img-product img");
    let dots = document.querySelectorAll(".dot");

    document.getElementById(
      "img-2-mobile"
    ).src = `<?= ($BASE) ?>/public/images/2.jpg`;
    document.getElementById(
      "img-3-mobile"
    ).src = `<?= ($BASE) ?>/public/images/3.jpg`;
    document.getElementById(
      "img-4-mobile"
    ).src = `<?= ($BASE) ?>/public/images/4.jpg`;
    document.getElementById(
      "img-5-mobile"
    ).src = `<?= ($BASE) ?>/public/images/5.jpg`;

    function changeSlide(n) {
      for (var i = 0; i < imgs.length; i++) {
        imgs[i].style.display = "none";
        dots[i].className = dots[i].className.replace(" active", "");
      }

      currentImg = (n + imgs.length) % imgs.length;
      imgs[currentImg].style.display = "block";
      dots[currentImg].className += " active";
    }

    dots.forEach((dot, index) => {
      dot.addEventListener("click", function () {
        changeSlide(index);
      });
    });
  } else {
    // DESKTOP
    const pathArray = window.location.pathname.split("/");
    const productId = pathArray[pathArray.length - 1];

    if (productId) {
      fetch(`/show_detail/${productId}`)
        .then((response) => response.json())
        .then((detail) => {
          console.log(detail);

          const product = detail[0];
          if (product) {
            //const nama = document.getElementById("nama-produk-desktop");
            // const gambar = document.getElementById('gambar-produk');
            const gambar = document.querySelectorAll(".gambar-produk-desktop");
            //const harga = document.getElementById("harga-desktop");

            console.log(gambar);

            nama.innerText = `${product.name}`;
            gambar[0].src = `<?= ($BASE) ?>/public/images/${product.product_img}`;
            gambar[1].src = `<?= ($BASE) ?>/public/images/${product.product_img}`;
            harga.innerText = `${product.price}`;
          } else {
            console.error("Product not found");
          }
        })
        .catch((error) =>
          console.error("Error fetching product detail:", error)
        );
    } else {
      console.error("Product ID not found");
    }

    var currentImg = 0;
    var imgs = document.querySelectorAll(".slider-img-product img");
    let dots = document.querySelectorAll(".dot");

    document.getElementById(
      "img-2-desktop"
    ).src = `<?= ($BASE) ?>/public/images/2.jpg`;
    document.getElementById(
      "img-3-desktop"
    ).src = `<?= ($BASE) ?>/public/images/3.jpg`;
    document.getElementById(
      "img-4-desktop"
    ).src = `<?= ($BASE) ?>/public/images/4.jpg`;
    document.getElementById(
      "img-5-desktop"
    ).src = `<?= ($BASE) ?>/public/images/5.jpg`;

    function changeSlide(n) {
      for (var i = 0; i < imgs.length; i++) {
        imgs[i].style.display = "none";
        dots[i].className = dots[i].className.replace(" active", "");
      }

      currentImg = (n + imgs.length) % imgs.length;
      imgs[currentImg].style.display = "block";
      dots[currentImg].className += " active";
    }

    dots.forEach((dot, index) => {
      dot.addEventListener("click", function () {
        changeSlide(index);
      });
    });
  }
</script>
