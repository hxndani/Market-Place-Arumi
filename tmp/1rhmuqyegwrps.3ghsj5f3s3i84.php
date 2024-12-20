<!-- ==================== DESKTOP ==================== -->
<section class="section blue level is-hidden-touch" style="min-height: 80vh;">
    <div class="container column is-9">
        <div class="columns is-vcentered level">
            <div class="column is-5 level-left">
                <figure class="image">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <div class="column is-4 box">
                <h2 class="title is-4">Login</h2>
                <form action="<?= ($BASE) ?>/challenge/@action" method="POST">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="username" placeholder="No.Handphone/Username/Email"
                                required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input" type="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button type="submit" class="button is-info is-fullwidth">Login</button>
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
                        <p>Baru di Arumi? </p>
                        <a href="<?= ($BASE) ?>/datadiri" class="field help-links ml-1">Daftar</a>
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
                <p class="ml-3">Log in</p>
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
            <form action="<?= ($BASE) ?>/challenge/@action" method="POST">
                <div class="field">
                    <p class="control has-icons-left">
                      <input class="input" type="text" name="username" placeholder="No. Handphone/Email/Username" />
                      <span class="icon is-small is-left">
                        <i class="icofont-ui-user"></i>
                      </span>
                    </p>
                </div>
                <div class="field">
                    <p class="control has-icons-left has-icons-right">
                      <input class="input" type="password" name="password" placeholder="Password" />
                      <span class="icon is-small is-left">
                        <i class="icofont-ui-lock"></i>
                      </span>
                      <span class="icon is-small is-right">
                        <i class="icofont-eye-blocked"></i>
                      </span>
                    </p>
                </div>
                <button type="submit" class="button is-fullwidth is-info mb-2">Log in</button>
                <div class="other-action mb-5">
                    <div class="is-flex is-justify-content-space-between">
                        <a href="<?= ($BASE) ?>/daftar">Daftar</a>
                        <a href="">Lupa password?</a>
                    </div>
                </div>
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