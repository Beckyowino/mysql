<?= $this->extend(config('Auth')->views['layout']) ?>

<?= $this->section('title') ?><?= lang('Auth.login') ?> <?= $this->endSection() ?>

<?= $this->section('main') ?>

    <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php base_url() ?>assets/images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <?php if (session('error') !== null) : ?>
                    <div class="alert alert-danger" role="alert"><?= session('error') ?></div>
                <?php elseif (session('errors') !== null) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php if (is_array(session('errors'))) : ?>
                            <?php foreach (session('errors') as $error) : ?>
                                <?= $error ?>
                                <br>
                            <?php endforeach ?>
                        <?php else : ?>
                            <?= session('errors') ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if (session('message') !== null) : ?>
                <div class="alert alert-success" role="alert"><?= session('message') ?></div>
                <?php endif ?>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form action="<?= url_to('login') ?>" class="pt-3" method="post">
              <?= csrf_field() ?>

                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" inputmode="text" autocomplete="current-password" placeholder="<?= lang('Auth.password') ?>" required>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary btn-block font-weight-medium auth-form-btn"><?= lang('Auth.login') ?></button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" <?php if (old('remember')): ?> checked<?php endif ?>>
                        <?= lang('Auth.rememberMe') ?>

                    </label>
                  </div>

                  <?php if (setting('Auth.allowMagicLinkLogins')) : ?>
                    <?= lang('Auth.forgotPassword') ?>
                    <a href="<?= url_to('magic-link') ?>" class="auth-link text-black"><?= lang('Auth.useMagicLink') ?></a>
                    <?php endif ?>

                </div>

                <div class="text-center mt-4 font-weight-light">
                <?php if (setting('Auth.allowRegistration')) : ?>
                        <p class="text-center"><?= lang('Auth.needAccount') ?> <a href="<?= url_to('register') ?>"><?= lang('Auth.register') ?></a></p>
                    <?php endif ?>
                </div>
              </form>
            </div>
          </div>
        </div>

<?= $this->endSection() ?>
