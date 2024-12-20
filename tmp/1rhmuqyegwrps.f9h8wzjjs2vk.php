<!-- for desktop -->
<section class="hero blue is-hidden-touch is-sticky-top header-2">
    <div class="container column is-9">
        <div class="container">
            <div class="columns is-vcentered level-item">
                <div class="column is-2">
                    <a href="<?= ($BASE) ?>/index">
                        <figure class="image is-128x96">
                            <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                        </figure>
                    </a>
                </div>
                <div class="column">
                    <div class="navbar-item search-bar">
                        <input class="input" type="text" placeholder="Search...">
                        <button class="button"><i class="icofont-search"></i></button>
                    </div>
                </div>
                <div class="column is-2 has-text-centered pl-6">
                    <div class="navbar-item is-vcentered">
                        <a class="is-size-2 has-text-white" href="<?= ($BASE) ?>/cart">
                            <i class="icofont-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="hero blue is-hidden-desktop is-sticky-top header-2">
    <div class="container column is-9">
        <div class="container">
            <div class="columns is-vcentered is-mobile">
                <div class="column">
                    <div class="navbar-item search-bar">
                        <input class="input" type="text" placeholder="Search...">
                        <button class="button"><i class="icofont-search"></i></button>
                    </div>
                </div>
                <div>
                    <div class="navbar-item is-vcentered">
                        <a class="is-size-2 has-text-white is-size-5" href="<?= ($BASE) ?>/cart">
                            <i class="icofont-shopping-cart"></i>
                        </a>
                    </div>
                </div>
                <div>
                    <div class="navbar-item is-vcentered">
                        <a class="is-size-2 has-text-white is-size-5" id="chat-button-mobile">
                            <i class="icofont-wechat"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>