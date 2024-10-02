<!-- ==================== DESKTOP ==================== -->
<section class="section blue level is-hidden-touch" style="min-height: 80vh">
  <div class="container column is-9">
    <div class="columns is-vcentered level">
      <div class="column is-5 level-left">
        <figure class="image">
          <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo" />
        </figure>
      </div>
      <div class="column is-4 box">
        <h2 class="title is-4">Daftar</h2>
        <?php if ($error): ?>
          <span class="has-text-danger is-italic"><?= ($error) ?></span>
        <?php endif; ?>
        <form action="<?= ($BASE) ?>/datadiri" method="POST">
          <!-- <div class="field">
            <div class="control">
              <input
                class="input is-small"
                type="text"
                name="username"
                placeholder="Masukkan Username"
                required
              />
            </div>
          </div> -->
          <div class="field">
            <div class="control">
              <input
                class="input is-small"
                type="text"
                name="email"
                placeholder="Masukkan Email"
                required
              />
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input
                class="input is-small"
                type="password"
                name="password"
                placeholder="Masukkan Password"
                required
              />
            </div>
          </div>
          <div class="field">
            <div class="control">
              <input
                class="input is-small"
                type="password"
                name="password2"
                placeholder="Masukkan Ulang Password"
                required
              />
            </div>
          </div>
          <button
            type="submit"
            class="button is-info is-fullwidth"
            name="submit"
          >
            Daftar
          </button>
          <div class="field is-grouped">
            <div class="control is-expanded">
              <label class="checkbox">
                <input type="checkbox" name="remember" /> Remember me
              </label>
            </div>
            <div class="control">
              <a href="#">Lupa Password</a>
            </div>
          </div>
        </form>
        <div class="columns is-vcentered">
          <div class="column">
            <hr class="has-background-grey" />
          </div>
          <div class="column is-narrow">
            <label class="has-text-grey">atau</label>
          </div>
          <div class="column">
            <hr class="has-background-grey" />
          </div>
        </div>
        <div class="field is-grouped is-grouped-centered">
          <div class="control">
            <button class="button is-facebook icofont-facebook">
              Facebook
            </button>
          </div>
          <div class="control">
            <button class="button is-google icofont-google-plus">Google</button>
          </div>
        </div>
        <div class="is-flex is-justify-content-center">
          <p>Sudah Punya Akun?</p>
          <a href="<?= ($BASE) ?>/login" class="field help-links ml-1">Login</a>
        </div>
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
        <a href="#">
          <i class="icofont-question-circle"></i>
        </a>
      </div>
    </div>
    <div class="content-login box px-3">
      <div class="ini-logo is-flex is-justify-content-center mt-6 mb-5">
        <figure class="image is-128x128" style="height: auto">
          <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo" />
        </figure>
      </div>
      <form action="<?= ($BASE) ?>/reg" method="POST">
        <div class="field">
          <input
            class="input mb-3"
            type="text"
            name="username"
            placeholder="Masukkan Username"
          />
          <input
            class="input mb-3"
            type="email"
            name="email"
            placeholder="Masukkan Email"
          />
          <input
            class="input mb-3"
            type="password"
            id="password"
            name="password"
            placeholder="Masukkan Password"
          />
          <input
            class="input mb-3"
            type="password"
            id="confirm_password"
            name="confirm_password"
            placeholder="Masukkan Ulang Password"
          />
        </div>
        <button type="submit" class="button is-fullwidth is-info mb-2">
          Daftar
        </button>
      </form>
    </div>
  </div>
</section>

<script>
  var password = document.getElementById("password"),
    confirm_password = document.getElementById("confirm_password");

  function validatePassword() {
    if (password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
      confirm_password.setCustomValidity("");
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;
</script>

<!-- <section class="section blue level is-hidden-desktop" style="min-height: 80vh;">
    <div class="container column is-9">
        <div class="columns is-vcentered level">
            <div class="column is-5 level-left">
                <figure class="image">
                    <img src="<?= ($BASE) ?>/public/images/logo.png" alt="Arumi Logo">
                </figure>
            </div>
            <div class="column is-4 box">
                <h2 class="title is-4">Daftar</h2>
                <form action="#" method="POST">
                    <div class="field">
                        <div class="control">
                            <input class="input is-small" type="text" name="username" placeholder="Masukkan Username"
                                required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-small" type="text" name="username" placeholder="Masukkan Email"
                                required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-small" type="password" name="password" placeholder="Masukkan Password" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <input class="input is-small" type="password" name="password" placeholder="Masukkan Ulang Password" required>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <a href="<?= ($BASE) ?>/login" class="button is-info is-fullwidth">Daftar</a>
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
                        <div class="column is-narrow">
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
                    <div class="is-flex is-justify-content-center">
                        <p>Sudah Punya Akun? </p>
                        <a href="<?= ($BASE) ?>/login" class="field help-links ml-1">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> -->
