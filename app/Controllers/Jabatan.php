<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Jabatan as ModelsJabatan;
use CodeIgniter\HTTP\ResponseInterface;

class Jabatan extends BaseController
{
    protected $jabatan;
    protected $rules;

    public function __construct()
    {
        $this->jabatan = new ModelsJabatan();
        $this->rules = [
            'nama_jabatan'  => 'required',
        ];
    }

    public function index()
    {
        $data = [
            'data'  => $this->jabatan->paginate('5', 'jabatan'),
            'title' => 'List Jabatan',
            'pager' => $this->jabatan->pager,
        ];

        return view('jabatan/index', $data);
    }

    public function create()
    {
        return view('jabatan/create', ['title' => 'Tambah Jabatan']);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jabatan->insert($data);

        return redirect()->route('Jabatan::index')->with('message', 'Sukses tambah data');
    }

    public function edit(int $id)
    {
        $data = [
            'title' => 'Edit Jabatan',
            'jabatan' => $this->jabatan->find($id),
        ];

        return view('jabatan/edit', $data);
    }

    public function update(int $id)
    {
        $data = $this->request->getPost();

        if (!$this->validateData($data, $this->rules)) {
            return redirect()->back()->with('message', $this->validator->getErrors());
        }

        $this->jabatan->update($id, $data);

        return redirect()->route('Jabatan::index')->with('message', 'Sukses ubah data');
    }

    public function destroy(int $id)
    {
        $this->jabatan->delete($id);

        return redirect()->back()->with('message', 'Sukses hapus data');
    }
}
