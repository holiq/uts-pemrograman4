<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>List Anggota</h3>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Anggota::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Tempat Tanggal Lahir</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $anggota) : ?>
                        <tr>
                            <td><?= $anggota->nama_anggota ?></td>
                            <td><?= $anggota->ttl_anggota ?></td>
                            <td><?= $anggota->alamat_anggota ?></td>
                            <td class="text-center">
                                <span class="badge bg-<?= $anggota->status_anggota ? 'success' : 'warning' ?>"><?= $anggota->status_anggota ? 'Aktif' : 'Tidak Aktif' ?></span>
                            </td>
                            <td class="text-center">
                                <a href="<?= route_to('Anggota::edit', $anggota->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Anggota::destroy', $anggota->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('anggota', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>