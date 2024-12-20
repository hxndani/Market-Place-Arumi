<section class="section grey is-hidden-touch">
    <div class="container column is-9">
        <div class="box is-sticky-top p-0 m-0 header-3">
            <div class="has-text-centered pt-4">
                <h2 class="title is-5 ">REKOMENDASI</h2>
            </div>
            <hr class="footer-line blue">
        </div>
        <div id="content-desktop" class="box m-0 column">

        </div>
        <div id="loading-desktop" class="loader-wrapper column is-4 is-offset-4 my-6">
            <div class="is-flex is-justify-content-center">
                <div class="loader is-loading"></div>
            </div>
        </div>
        <div class="has-text-centered">
            <div>
                <!-- <a href="#" class="button is-light">Lihat Lainnya</a> -->
                <?php if ($SESSION): ?>
                    
                        <a href="<?= ($BASE) ?>/semua_barang" class="button is-light has-text-weight-medium mt-6">Lihat Lainnya</a>
                    
                    <?php else: ?>
                        <a href="<?= ($BASE) ?>/login" class="button is-light has-text-weight-medium mt-6">Login untuk Lihat Lainnya</a>
                    
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>

<!-- for mobile -->
<section class="section is-hidden-desktop px-0">
    <div class="box p-0 m-0 ">
        <div class="has-text-centered pt-4"> 
            <h2 class="title is-5 ">REKOMENDASI</h2>
        </div>
        <hr class="footer-line blue">
    </div>
            <div id="content-mobile" class="column m-1 px-1">
                
            </div>
            <div id="loading-mobile" class="loader-wrapper column is-4 is-offset-4 my-6">
                <div class="is-flex is-justify-content-center">
                    <div class="loader is-loading"></div>
                </div>
            </div>
            <div class="has-text-centered">
                <div>
                    <!-- <a href="#" class="button is-light">Lihat Lainnya</a> -->
                    <?php if ($SESSION): ?>
                        
                            <a href="<?= ($BASE) ?>/semua_barang" class="button is-light">Lihat Lainnya</a>
                        
                        <?php else: ?>
                            <a href="<?= ($BASE) ?>/login" class="button is-light">Login untuk Lihat Lainnya</a>
                        
                    <?php endif; ?>

                </div>
            </div>
        </div>
</section>

<script>
    if (window.matchMedia("(max-width: 1023px)").matches) {
        // MOBILE
        const itemContainer = document.getElementById('content-mobile');
        const loadingElement = document.getElementById('loading-mobile');
        const limitRow = 1;
        let totalRowsLoaded = 0;
        let currentPage = 1;
        let isLoading = false;
      
        async function loadItems(page) {
            if (isLoading || totalRowsLoaded >= limitRow) return;
            isLoading = true;
            
            loadingElement.style.display = 'block';
      
            try {
                const response = await fetch(`/api/allproducts`);
                const products = await response.json();
                
                let row = document.createElement('div');
                row.classList.add('row', 'm-2');
                
                let columns = document.createElement('div');
                columns.classList.add('columns', 'is-1-touch', 'is-multiline', 'is-mobile');
                row.appendChild(columns);
                
                products.forEach((product, index) => {
                    let column = document.createElement('div');
                    column.classList.add('column', 'is-half-touch', 'p-0', 'mb-3');
                    console.log(product.id)
                    column.innerHTML = `
                    <div class="grid-border">
                        <a href="/detail/${product.id}">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-1by1">
                                        <img src="/public/images/${product.image}" alt="${product.name} - ${product.motor}" class="product-image">
                                    </figure>
                                </div>
                                <div class="card-content p-3">
                                    <div class="nama-produk">
                                        <div class="product-title-wrapper mb-2">
                                            <p class="product-title">${product.name} - ${product.motor}</p>
                                        </div>
                                        <div class="product-tags mb-1">
                                            <span class="tag is-danger">Diskon</span>
                                            <span class="tag is-primary">-69%</span>
                                        </div>
                                        <div class="price-sold is-flex is-justify-content-space-between is-align-items-center">
                                            <p class="product-price has-text-info has-text-weight-medium is-size-6">${product.price}</p>
                                            <p class="product-sold is-size-7">${product.stock}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    `;
                    columns.appendChild(column);
                    
                    if ((index + 1) % 2 === 0) {
                        itemContainer.appendChild(row);
                        row = document.createElement('div');
                        row.classList.add('row', 'm-2');
                        columns = document.createElement('div');
                        columns.classList.add('columns', 'is-1', 'is-multiline', 'is-mobile');
                        row.appendChild(columns);
                    }
                });
                
                if (row.children.length > 0) {
                    itemContainer.appendChild(row);
                }
      
                loadingElement.style.display = 'none';
                isLoading = false;
      
                totalRowsLoaded++;
      
                if (totalRowsLoaded < limitRow) {
                    const rows = document.querySelectorAll('.row');
                    observer.observe(rows[rows.length - 1]);
                }
                
            } catch (error) {
                console.error('Error loading products:', error);
                isLoading = false;
            }
        }
      
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    console.log('Row terakhir terlihat, memuat row berikutnya...');
                    loadItems(currentPage++);
                }
            });
        }, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });
      
        loadItems(currentPage);
    } else {
        // DESKTOP
        const itemContainer = document.getElementById('content-desktop');
        const loadingElement = document.getElementById('loading-desktop');
        const limitRow = 1;
        let totalRowsLoaded = 0;
        let currentPage = 1;
        let isLoading = false;
      
        async function loadItems(page) {
            if (isLoading || totalRowsLoaded == limitRow) return;
            isLoading = true;
            
            loadingElement.style.display = 'block';
      
            try {
                const response = await fetch(`/api/allproducts`);
                const products = await response.json();
                
                let row = document.createElement('div');
                row.classList.add('row', 'm-2');
                
                let columns = document.createElement('div');
                columns.classList.add('columns', 'is-1', 'is-multiline', 'is-mobile');
                row.appendChild(columns);
                
                products.forEach((product, index) => {
                    let column = document.createElement('div');
                    column.classList.add('column', 'is-2', 'p-0', 'mb-3');
                    console.log(product.id)
                    column.innerHTML = `
                    <div class="grid-border">
                        <a href="/detail/${product.id}">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-1by1">
                                        <img src="/public/images/${product.product_img}" alt="${product.name} - ${product.motor}" class="product-image">
                                    </figure>
                                </div>
                                <div class="card-content p-3">
                                    <div class="nama-produk">
                                        <div class="product-title-wrapper mb-2">
                                            <p class="product-title">${product.name} - ${product.motor}</p>
                                        </div>
                                        <div class="product-tags mb-1">
                                            <span class="tag is-danger">Diskon</span>
                                            <span class="tag is-primary">-69%</span>
                                        </div>
                                        <div class="price-sold is-flex is-justify-content-space-between is-align-items-center">
                                            <p class="product-price has-text-info has-text-weight-medium is-size-6">${product.price}</p>
                                            <p class="product-sold is-size-7">${product.sold} Terjual</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    `;
                    columns.appendChild(column);
                    
                    if ((index + 1) % 6 === 0) {
                        itemContainer.appendChild(row);
                        row = document.createElement('div');
                        row.classList.add('row', 'm-2');
                        columns = document.createElement('div');
                        columns.classList.add('columns', 'is-1', 'is-multiline', 'is-mobile');
                        row.appendChild(columns);
                    }
                });
                
                if (row.children.length > 0) {
                    itemContainer.appendChild(row);
                }
      
                loadingElement.style.display = 'none';
                isLoading = false;
      
                totalRowsLoaded++;
      
                if (totalRowsLoaded < limitRow) {
                    const rows = document.querySelectorAll('.row');
                    observer.observe(rows[rows.length - 1]);
                }
                
            } catch (error) {
                console.error('Error loading products:', error);
                isLoading = false;
            }
        }
      
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    console.log('Row terakhir terlihat, memuat row berikutnya...');
                    loadItems(currentPage++);
                }
            });
        }, {
            root: null,
            rootMargin: '0px',
            threshold: 0
        });
      
        loadItems(currentPage);
    }
</script>

