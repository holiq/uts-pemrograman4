<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="container-sm min-vh-100 d-flex flex-column">
    <div class="m-auto w-100" style="max-width: 40rem;">
        <?php if (!empty(session()->getFlashdata('message'))) : ?>
            <div class="alert alert-success">
                <span><?= session()->getFlashdata('message') ?></span>
            </div>
        <?php endif ?>

        <?php if (!empty(session()->getFlashdata('errors'))) : ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif ?>

        <div class="card">
            <div class="card-header">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <form method="post" action="<?= route_to('Login::process') ?>">
                    <div class="mb-4">
                        <label for"username">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="mb-4">
                        <label for"password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">LOGIN</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>