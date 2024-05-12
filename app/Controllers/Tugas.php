<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Anggota;
use App\Models\Jabatan;
use App\Models\Tugas as ModelsTugas;
use CodeIgniter\HTTP\ResponseInterface;

class Tugas extends BaseController
{
    protected $anggota;
    protected $jabatan;
    protected $tugas;
    protected $rules;

    public function __construct()
    {
        $this->anggota = new Anggota();
        $this->jabatan = new Jabatan();
        $this->tugas = new ModelsTugas();
        $this->rules = [
            'anggota_id'  => 'required',
            'jabatan_id'  => 'required',
            'tugas'  => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->tugas->withAnggota()->withJabatan()
                ->select('tugas.*, anggota.nama_anggota, jabatan.nama_jabatan')->paginate('5', 'tugas'),
            'title' => 'List Tugas',
            'pager' => $this->tugas->pager,
        ];

        return view('tugas/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Tugas',
            'anggota' => $this->anggota->findAll(),
            'jabatan' => $this->jabatan->findAll(),
        ];

        return view('tugas/create', $data);
    }

    public function store()
    {
        $validate = $this->request->getPost();

        if (!$this->validateData($validate, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data = [
            'anggota_id'  => $validate['anggota_id'],
            'jabatan_id'  => $validate['jabatan_id'],
            'tugas'  => json_encode(array_values(array_filter($validate['tugas']))),
        ];

        $this->tugas->insert($data);

        return redirect()->route('Tugas::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Tugas',
            'tugas' => $this->tugas->withAnggota()->withJabatan()
                ->select('tugas.*, anggota.id as anggota_id, jabatan.id as jabatan_id')->find($id),
            'anggota' => $this->anggota->findAll(),
            'jabatan' => $this->jabatan->findAll(),
        ];

        return view('tugas/edit', $data);
    }

    public function update(int $id)
    {
        $validate = $this->request->getPost();

        if (!$this->validateData($validate, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $data = [
            'anggota_id'  => $validate['anggota_id'],
            'jabatan_id'  => $validate['jabatan_id'],
            'tugas'  => json_encode(array_values(array_filter($validate['tugas']))),
        ];

        $this->tugas->update($id, $data);

        return redirect()->route('Tugas::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->tugas->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
