<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>List Jabatan</h3>
    </div>

    <?php if (! empty(session()->getFlashdata('message'))) : ?>
        <div class="alert alert-success alert-dismissible show fade">
            <?= session()->getFlashdata('message'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <a href="<?= route_to('Jabatan::create') ?>" class="btn btn-success mb-3">Tambah Data</a>

    <div class="card">
        <div class="table-responsive">
            <table class="table text-nowrap table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nama Jabatan</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($data as $jabatan) : ?>
                        <tr>
                            <td><?= $jabatan->nama_jabatan ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('Jabatan::edit', $jabatan->id); ?>" class="btn-link">Edit</a>
                                <a href="<?= route_to('Jabatan::destroy', $jabatan->id); ?>" class="btn-link text-danger" onclick="destroy(event)">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        <?= $pager->links('jabatan', 'pagination') ?>
    </div>
</div>
<?= $this->endSection() ?>
