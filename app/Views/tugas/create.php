<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="page-heading">
    <div class="page-title-headings mb-4">
        <h3>Tambah Tugas</h3>
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

    <a href="<?= route_to('Tugas::index') ?>" class="btn btn-md btn-warning mb-3">Kembali</a>

    <div class="card">
        <div class="card-body">
            <form method="post" action="<?= route_to('Tugas::store') ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="anggota_id">Anggota</label>
                            <select name="anggota_id" id="anggota_id" class="form-control">
                                <option value="">--Pilih--</option>
                                <?php foreach ($anggota as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->nama_anggota ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jabatan_id">Jabtan</label>
                            <select name="jabatan_id" id="jabatan_id" class="form-control">
                                <option value="">--Pilih--</option>
                                <?php foreach ($jabatan as $row) : ?>
                                    <option value="<?= $row->id ?>"><?= $row->nama_jabatan ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <div class="form-group table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Tugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic_rows">
                                    <tr id="row_1" class="dynamic_row">
                                        <td><input type="text" name="tugas[]" class="form-control"></td>
                                        <td><button type="button" class="btn btn-primary" onclick="addRow()">Tambah</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>

<script>
    let rowNumber = 1;

    function addRow() {
        let newRow = document.querySelector('#row_1').cloneNode(true);

        newRow.id = `row_${++rowNumber}`;

        newRow.querySelector('input[name="tugas[]"]').value = '';

        newRow.querySelector('button').classList.remove('btn-primary');
        newRow.querySelector('button').classList.add('btn-danger');
        newRow.querySelector('button').innerHTML = 'Hapus';
        newRow.querySelector('button').setAttribute('onclick', `removeRow(${rowNumber})`);

        document.getElementById('dynamic_rows').appendChild(newRow);
    }

    function removeRow(rowNum) {
        document.getElementById(`row_${rowNum}`).remove();
    }
</script>
<?= $this->endSection() ?>