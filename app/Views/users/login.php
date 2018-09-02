<?php require_once APP_ROOT . '/Views/inc/header.php' ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <?php flash('register_success') ?>
                <h2>Login</h2>
                <p>Please fill in your credentials to log in</p>
                <form action="<?= URL_ROOT ?>/users/login" method="post">
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="text" name="email" class="form-control form-control-lg <?= (!empty($data['email_error'])) ? 'is-invalid' : '' ?>" value="<?= $data['email'] ?>">
                        <span class="invalid-feedback"><?= $data['email_error'] ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control form-control-lg <?= (!empty($data['password_error'])) ? 'is-invalid' : '' ?>" value="<?= $data['password'] ?>">
                        <span class="invalid-feedback"><?= $data['password_error'] ?></span>
                    </div>

                    <div class="row">
                        <div class="col mt-3">
                            <input type="submit" value="Login" class="btn btn-success btn-block">
                        </div>
                        <div class="col mt-3">
                            <a href="<?= URL_ROOT ?>/users/register" class="btn btn-light btn-block">No account? Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require_once APP_ROOT . '/Views/inc/footer.php' ?>