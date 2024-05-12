<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Edit Anggota</h3>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-danger alert-dismissible show fade">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('message') as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Anggota::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Anggota::update', $anggota->id) ?>">
                <input type="hidden" name="_method" value="PUT">

                <div class="mb-4">
                    <label for"nama_anggota">Nama Anggota</label>
                    <input type="text" name="nama_anggota" id="nama_anggota" class="form-control" value="<?= $anggota->nama_anggota ?>">
                </div>

                <div class="mb-4">
                    <label for"ttl_anggota">Tempat Tanggal Lahir</label>
                    <input type="text" name="ttl_anggota" id="ttl_anggota" class="form-control" value="<?= $anggota->ttl_anggota ?>">
                </div>

                <div class="mb-4">
                    <label for"alamat_anggota">Alamat Anggota</label>
                    <input type="text" name="alamat_anggota" id="alamat_anggota" class="form-control" value="<?= $anggota->alamat_anggota ?>">
                </div>

                <div class="mb-4">
                    <label for"status_anggota">Status Anggota</label>
                    <select name="status_anggota" id="status_anggota" class="form-control">
                        <option value="">--Pilih--</option>
                        <option value="0" <?= (!$anggota->status_anggota) ? 'selected' : '' ?>>Tidak Aktif</option>
                        <option value="1" <?= ($anggota->status_anggota) ? 'selected' : '' ?>>Aktif</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>