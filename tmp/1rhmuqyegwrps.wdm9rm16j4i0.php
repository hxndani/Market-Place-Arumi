<!-- ==================== DESKTOP ==================== -->
<section class="section blue level is-hidden-touch" style="min-height: 80vh;">
    <div class="container column is-9">
        <div class="columns is-vcentered level">
            <div class="column is-5 level-left">
                <figure class="image">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <div class="column box is-4">
                <h2 class="title is-4">Daftar</h2>
                <form action="Registrar/save" method="POST">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="phone" name="telepon" placeholder="Masukkan No.Handphone" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <a href="<?= ($BASE) ?>/datadiri" type="submit" class="button is-info is-fullwidth">Daftar</a>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="control">
                            <a href="#">Lupa Password</a>
                        </div>
                    </div>
                    <div class="columns is-vcentered">
                        <div class="column">
                            <hr class="has-background-grey">
                        </div>
                        <div class="column is-narrow">
                            <label class="has-text-grey">atau</label>
                        </div>
                        <div class="column">
                            <hr class="has-background-grey">
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-facebook icofont-facebook">Facebook</button>
                        </div>
                        <div class="control">
                            <button class="button is-google icofont-google-plus">Google</button>
                        </div>
                    </div>
                    <div class="column is-flex is-justify-content-center">
                            <p>Sudah Punya Akun? </p>
                            <a href="<?= ($BASE) ?>/login" class="field help-links ml-1">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ==================== MOBILE ==================== -->
<section class="section is-hidden-desktop p-0">
    <div class="container">
        <div class="box is-flex p-0 m-0">
            <div class="column is-four-fifths-touch is-flex is-align-items-center">
                <a href="<?= ($BASE) ?>/index">
                    <i class="icofont-arrow-left"></i>
                </a>
                <p class="ml-3">Daftar</p>
            </div>
            <div class="column is-flex is-justify-content-end is-align-items-center">
                <a href="#" >
                    <i class="icofont-question-circle"></i>
                </a>
            </div>
        </div>
        <div class="content-login box px-3">
            <div class="ini-logo is-flex is-justify-content-center mt-6 mb-5">
                <figure class="image is-128x128" style="height: auto;">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <form action="#" method="POST">
                <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="text" placeholder="Nomor Telepon" />
                      <span class="icon is-small is-left">
                        <i class="icofont-phone"></i>
                      </span>
                    </p>
                </div>
                <a href="<?= ($BASE) ?>/datadiri" class="button is-fullwidth is-info mb-2">Berikutnya</a>
                <div class="is-flex is-justify-content-center">
                    <div class="is-flex is-align-items-center">
                        <hr style="width: 30vw;">
                        <p class="mx-4 has-text-grey">ATAU</p>
                        <hr style="width: 30vw;">
                    </div>
                </div>
                <button class="button is-fullwidth px-2 mb-2">
                    <div class="column is-1-touch p-0">
                        <span class="icon is-justify-content-start">
                            <i class="icofont-whatsapp"></i>
                        </span>
                    </div>
                    <div class="column p-0">
                        <span>Log In dengan WhatsApp</span>
                    </div>
                </button>
                <button class="button is-fullwidth px-2 mb-2">
                    <div class="column is-1-touch p-0">
                        <span class="icon is-justify-content-start">
                            <i class="icofont-facebook"></i>
                        </span>
                    </div>
                    <div class="column p-0">
                        <span>Log In dengan Facebook</span>
                    </div>
                </button>
                <button class="button is-fullwidth px-2 mb-2">
                    <div class="column is-1-touch p-0">
                        <span class="icon is-justify-content-start">
                            <i class="icofont-google-plus"></i>
                        </span>
                    </div>
                    <div class="column p-0">
                        <span>Log In dengan Google</span>
                    </div>
                </button>
            </form>
        </div>
    </div>
</section>


<!-- <section class="section blue level is-hidden-desktop" style="min-height: 80vh;">
    <div class="container column is-9">
        <div class="columns is-vcentered level">
            <div class="column is-5 level-left">
                <figure class="image">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <div class="column box is-4">
                <h2 class="title is-4">Daftar</h2>
                <form action="#" method="POST">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="phone" name="username" placeholder="Masukkan No.Handphone"
                                required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <a href="<?= ($BASE) ?>/datadiri" class="button is-info is-fullwidth">Daftar</a>
                        </div>
                    </div>
                    <div class="field is-grouped">
                        <div class="control is-expanded">
                            <label class="checkbox">
                                <input type="checkbox" name="remember"> Remember me
                            </label>
                        </div>
                        <div class="control">
                            <a href="#">Lupa Password</a>
                        </div>
                    </div>
                    <div class="columns is-vcentered">
                        <div class="column is-narrow has-text-centered">
                            <label class="has-text-grey">atau</label>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button class="button is-facebook icofont-facebook">Facebook</button>
                        </div>
                        <div class="control">
                            <button class="button is-google icofont-google-plus">Google</button>
                        </div>
                    </div>
                    <div class="column is-flex is-justify-content-center">
                            <p>Sudah Punya Akun? </p>
                            <a href="<?= ($BASE) ?>/login" class="field help-links ml-1">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->