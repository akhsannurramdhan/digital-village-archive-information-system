<?php

namespace App\Controllers;

use App\Models\ArsipModel;
use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;
use Dompdf\Options;

class Arsip extends BaseController
{
    protected $arsipModel;

    public function __construct()
    {
        $this->arsipModel = new ArsipModel();
    }

    public function index()
    {
        $roles = user()->getRoles();  

        $role = in_array('admin', $roles) ? 'admin' : '';

        $fullname = user()->fullname;

        if ($role === 'admin') {
            $arsip = $this->arsipModel->findAll();
        }
        else {
            $arsip = $this->arsipModel->where('penginput', $fullname)->findAll();
        }

        return view('arsip/index', [
            'arsip' => $arsip
        ]);
    }
    public function detail($id)
    {
        $arsip = $this->arsipModel->getArsipById($id);

        if (!$arsip) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Arsip tidak ditemukan.');
        }

        $filePath = WRITEPATH . 'arsip/' . $arsip['file_surat'];

        if (file_exists($filePath) && strtolower(pathinfo($filePath, PATHINFO_EXTENSION)) === 'docx') {
            $phpWord = \PhpOffice\PhpWord\IOFactory::load($filePath);
            $htmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');

            ob_start();
            $htmlWriter->save('php://output');
            $htmlContent = ob_get_clean();
            $htmlContent = '<style>
                            table td {
                                background-color: transparent !important;
                                border: none !important;
                            }
                                table {
                                border-collapse: collapse !important;
                            }
                            td {
                                border: none !important;
                                padding: 0 !important;  /* Menghilangkan padding jika diperlukan */
                            }
                            th {
                                border: none !important;  /* Menghilangkan border pada header tabel jika ada */
                            }
                        </style>' . $htmlContent;

            // Pass HTML to the view
            $arsip['file_surat_html'] = $htmlContent;
        } else {
            $arsip['file_surat_html'] = null;
        }

        return view('arsip/detail', [
            'arsip' => $arsip,
        ]);
    }

    public function addArsip()
    {
        $validation =  \Config\Services::validation();

        $validation->setRules([
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'jenis_surat' => 'required',
            'tipe_surat' => 'required',
            'penginput' => 'required',
            'file_surat' => 'uploaded[file_surat]|max_size[file_surat,10240]|ext_in[file_surat,doc,docx,pdf]'  // Validasi file
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('file_surat');
        $fileName = $file->getRandomName();
        $file->move(WRITEPATH . 'arsip', $fileName);

        $data = [
            'no_surat' => $this->request->getPost('no_surat'),
            'judul_surat' => $this->request->getPost('judul_surat'),
            'jenis_surat' => $this->request->getPost('jenis_surat'),
            'tipe_surat' => $this->request->getPost('tipe_surat'),
            'penginput' => user()->fullname,  
            'file_surat' => $fileName,
        ];

        if ($this->arsipModel->addArsip($data)) {
            return redirect()->to('/arsip')->with('success', 'Arsip berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan arsip.');
        }
    }

    public function download($id)
{
    $arsip = $this->arsipModel->find($id);
    if (!$arsip) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Arsip tidak ditemukan.');
    }

    $filePath = WRITEPATH . 'arsip/' . $arsip['file_surat'];
    return $this->response->download($filePath, null);
}

public function delete($id)
{
    $arsip = $this->arsipModel->find($id);
    if (!$arsip) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException('Arsip tidak ditemukan.');
    }

    $this->arsipModel->delete($id);
    return redirect()->to('/arsip')->with('message', 'Arsip berhasil dihapus.');
}

    public function formArsip()
    {
        return view('arsip/tambah');

    }

    public function edit($id)
    {
        $arsip = $this->arsipModel->find($id);

        if (!$arsip) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data arsip tidak ditemukan.');
        }

        return view('arsip/edit', [
            'arsip' => $arsip,
            'errors' => session()->getFlashdata('errors')
        ]);
    }

    public function update($id)
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'no_surat' => 'required',
            'judul_surat' => 'required',
            'jenis_surat' => 'required',
            'tipe_surat' => 'required',
            'file_surat' => 'permit_empty|uploaded[file_surat]|max_size[file_surat,2048]|ext_in[file_surat,doc,docx,pdf]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'no_surat' => $this->request->getPost('no_surat'),
            'judul_surat' => $this->request->getPost('judul_surat'),
            'jenis_surat' => $this->request->getPost('jenis_surat'),
            'tipe_surat' => $this->request->getPost('tipe_surat'),
            'penginput' => user()->fullname
        ];

        if ($file = $this->request->getFile('file_surat')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $newFileName = $file->getRandomName();
                $file->move(WRITEPATH . 'arsip', $newFileName);
                $data['file_surat'] = $newFileName;
            }
        }

        $this->arsipModel->update($id, $data);

        return redirect()->to('/arsip')->with('message', 'Data arsip berhasil diperbarui.');
    }

    }
