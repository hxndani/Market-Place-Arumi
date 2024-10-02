<div class="container">
    <div class="columns">
        <div class="column is-4 is-offset-4 panel-left">
            <h3 class="title is-3">
                Login
            </h3>
            <br />
            <form action="<?= ($BASE) ?>/admin/challenge/login" method="POST">
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
            </form>
        </div>
    </div>
</div>