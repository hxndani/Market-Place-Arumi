<!-- for desktop -->
<section class="hero size-gap grey is-hidden-touch">
    <div class="container column is-9">
        <div class="columns is-vcentered">
            <div class="column">
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
        </div>
</section>

<!-- for mobile -->
<section class="section p-0 is-hidden-desktop">
    <div class="container column p-0">
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
</section>

<!-- <script>
    const images = [
        '<?= ($BASE) ?>/public/images/ads1.jpg',
        '<?= ($BASE) ?>/public/images/ads2.jpg',
        '<?= ($BASE) ?>/public/images/ads1.jpg',
        '<?= ($BASE) ?>/public/images/ads3.jpg',
        '<?= ($BASE) ?>/public/images/ads2.jpg',
    ];

    let currentIndex = 0;
    const mainAdImage = document.getElementById('mainAdImage');

    function showSlide(index) {
        mainAdImage.src = images[index];
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
</script> -->