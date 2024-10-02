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
                <form action="<?= ($BASE) ?>/challenge/login" method="POST">
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
                            <button type="submit" class="button is-fullwidth is-link">
                                Login
                            </button>
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

<section class="section blue level is-hidden-desktop" style="min-height: 80vh;">
    <div class="container column is-9">
        <div class="columns is-vcentered level">
            <div class="column is-5 level-left">
                <figure class="image">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <div class="column is-4 box">
                <h2 class="title is-4">Login</h2>
                <form action="#" method="POST">
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
                            <button type="submit" class="button is-fullwidth is-link">
                                Login
                            </button>
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
                        <p>Baru di Arumi? </p>
                        <a href="<?= ($BASE) ?>/datadiri" class="field help-links ml-1">Daftar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>