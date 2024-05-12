<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Anggota as ModelsAnggota;
use CodeIgniter\HTTP\ResponseInterface;

class Anggota extends BaseController
{
    protected $anggota;
    protected $rules;

    public function __construct()
    {
        $this->anggota = new ModelsAnggota();
        $this->rules = [
            'nama_anggota'  => 'required',
            'ttl_anggota'  => 'required',
            'alamat_anggota'  => 'required',
            'status_anggota'  => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->anggota->paginate('5', 'anggota'),
            'title' => 'List Anggota',
            'pager' => $this->anggota->pager,
        ];

        return view('anggota/index', $data);
    }

    public function create()
    {
        return view('anggota/create', ['title' => 'Tambah Anggota']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->anggota->insert($data);

        return redirect()->route('Anggota::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Anggota',
            'anggota' => $this->anggota->find($id),
        ];

        return view('anggota/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->anggota->update($id, $data);

        return redirect()->route('Anggota::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->anggota->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
