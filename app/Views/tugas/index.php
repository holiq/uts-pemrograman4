<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>List Tugas</h3>
    </div>

    <?php if (!empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Tugas::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered">
                <thead>
                    <tr>
                        <th>Nama Anggota</th>
                        <th>Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $tugas) : ?>
                        <tr>
                            <td><?= $tugas->nama_anggota ?></td>
                            <td><?= $tugas->nama_jabatan ?></td>
                            <td class="text-center">
                                <button class="btn-link bg-transparent border-0 text-dark p-0" type="button" data-bs-toggle="collapse" data-bs-target="#coll-<?= $tugas->id ?>" aria-expanded="false" aria-controls="coll-<?= $tugas->id ?>">Detail</button>
                                <a href="<?= route_to('Tugas::edit', $tugas->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Tugas::destroy', $tugas->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                        <tr class="collapse multi-collapse" id="coll-<?= $tugas->id ?>">
                            <td colspan="3">
                                <h6>Tugas</h6>
                                <?php foreach (json_decode($tugas->tugas) as $detail) : ?>
                                    <input type="text" class="form-control mb-2" value="<?= $detail ?>" readonly>
                                <?php endforeach ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('tugas', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>