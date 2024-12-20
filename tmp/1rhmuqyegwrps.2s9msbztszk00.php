<section class="hero is-small is-hidden-touch">
    <div class="container column is-9">
        <div class="columns is-mobile">
            <div class="column is-7 pr-0 m-0">
                <figure class="image is-3by1">
                    <img id="mainAdImage" src="<?= ($BASE) ?>/public/images/ads4.jpg" alt="Main Ad">
                </figure>
                <div>
                    <span class="active" onclick="setSlide(0)"></span>
                    <span onclick="setSlide(1)"></span>
                    <span onclick="setSlide(2)"></span>
                    <span onclick="setSlide(3)"></span>
                    <span onclick="setSlide(4)"></span>
                </div>
            </div>
            <div class="column pl-1 m-0">
                <div class="p-0">
                    <figure class="ads image mb-1">
                        <img src="<?= ($BASE) ?>/public/images/ads5.jpg" alt="Ad 1">
                    </figure>
                </div>
                <div class="p-0">
                    <figure class="ads image">
                        <img src="<?= ($BASE) ?>/public/images/ads6.jpg" alt="Ad 2">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section p-0 is-hidden-desktop">
    <div class="container column p-0">
        <figure class="image is-3by1">
            <img id="mainAdImage2" src="<?= ($BASE) ?>/public/images/ads4.jpg" alt="Main Ad">
        </figure>
        <div>
            <span class="active" onclick="setSlide(0)"></span>
            <span onclick="setSlide(1)"></span>
            <span onclick="setSlide(2)"></span>
            <span onclick="setSlide(3)"></span>
            <span onclick="setSlide(4)"></span>
        </div>
    </div>
</section>

<script>
        const images = [
        '<?= ($BASE) ?>/public/images/ads1.jpg',
        '<?= ($BASE) ?>/public/images/ads5.jpg',
        '<?= ($BASE) ?>/public/images/ads4.jpg',
        '<?= ($BASE) ?>/public/images/ads1.jpg',
        '<?= ($BASE) ?>/public/images/ads4.jpg',
    ];

    let currentIndex = 0;
    const mainAdImageDesktop = document.getElementById('mainAdImage');
    const mainAdImageMobile = document.getElementById('mainAdImage2');
    const dots = document.querySelectorAll('span[onclick^="setSlide"]');

    function showSlide(index) {
        mainAdImageDesktop.src = images[index];
        mainAdImageMobile.src = images[index];
        dots.forEach(dot => dot.classList.remove('active'));
        dots[index].classList.add('active');
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % images.length;
        showSlide(currentIndex);
    }

    function setSlide(index) {
        currentIndex = index;
        showSlide(index);
    }

    setInterval(nextSlide, 3000);
</script>