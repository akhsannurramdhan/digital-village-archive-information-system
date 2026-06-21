<?php

namespace App\Controllers;

use App\Models\UserModel as UserModel;
use Myth\Auth\Models\GroupModel as GroupModel;
use App\Models\AuthGroupModel as AuthGroupModel;
use Myth\Auth\Config\Auth as AuthConfig;
use App\Models\LoginActivityModel;
use Myth\Auth\Password as Password;
use PhpOffice\PhpWord\Element\TextRun as TextRun;
use PhpOffice\PhpWord\TemplateProcessor as TemplateProcessor;

class Surat extends BaseController
{
    protected $db, $builder, $authGroupModel;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('users');
        $this->authGroupModel = new AuthGroupModel();
    }
    public function index(): string
    {
        return view('surat/daftarSurat');
    }
    public function SKTM(): string
    {
        $builder = $this->db->table('users');
        $builder->select('id, jabatan');
        $query = $builder->get();

        $data['jabatanList'] = $query->getResult();
        return view('surat/formSKTM', $data);
    }
    public function NamaSama(): string
    {
        $builder = $this->db->table('users');
        $builder->select('id, jabatan');
        $query = $builder->get();

        $data['jabatanList'] = $query->getResult();
        return view('surat/formNamaSama', $data);
    }
    public function getJabatan($jabatanName)
    {
        $builder = $this->db->table('users');
        $builder->select('fullname');
        $builder->where('jabatan', $jabatanName);
        $query = $builder->get();
        $user = $query->getRow();

        if ($user) {
            return $this->response->setJSON(['name' => $user->fullname]);
        }

        return $this->response->setJSON(['name' => '']);
    }

    public function cetakSKTM()
    {

        $validation = \Config\Services::validation();
        $tahunSekarang = date('Y');
        $validation->setRules([
            'no_surat'                => 'required|numeric|max_length[7]',
            'tanggal_cetak'           => 'required',
            'jabatan_penanda_tangan'  => 'required',
            'nama_penanggung_jawab'   => 'required',
            'nik_penanggung_jawab'    => 'required|numeric',
            'tempat_lahir_penanggung_jawab' => 'required',
            'tanggal_lahir_penanggung_jawab' => 'required',
            'jenis_kelamin_penanggung_jawab' => 'required',
            'pekerjaan'               => 'required',
            'alamat_penanggung_jawab' => 'required',
            'nama_pemohon'            => 'required',
            'nik_pemohon'             => 'required|numeric',
            'tempat_lahir_pemohon'    => 'required',
            'tanggal_lahir_pemohon'  => 'required',
            'jenis_kelamin_pemohon'   => 'required',
            'alamat_pemohon'          => 'required',
            'keperluan'               => 'required',
            'permohonan'              => 'required',

        ]);
        if (!$this->validate($validation->getRules())) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Data yang valid
        $data = $this->request->getPost();

        $jabatanPenandaTangan = $data['jabatan_penanda_tangan'];

        if ($jabatanPenandaTangan == 'Kepala Desa') {
            $templatePath = WRITEPATH . 'surat/SKTM_KADES.docx';
        } elseif ($jabatanPenandaTangan == 'Sekretaris Desa') {
            $templatePath = WRITEPATH . 'surat/SKTM.docx';
        } else {
            $templatePath = WRITEPATH . 'surat/SKTM.docx';
        }

        // Memastikan file template ada
        if (!file_exists($templatePath)) {
            throw new \Exception("Template surat tidak ditemukan untuk jabatan: " . $jabatanPenandaTangan);
        }
        $templateProcessor = new TemplateProcessor($templatePath);

        // Format text untuk keperluan
        $keperluanText = new TextRun();
        $jabatanText = new TextRun();
        $jabatanText->addText(strtoupper($data['nama_penanda_tangan']), ['bold' => true]);
        $keperluanText->addText(strtoupper($data['keperluan']), ['bold' => true]);

        $templateProcessor->setComplexValue('nama_penanda_tangan_ttd', $jabatanText);
        $templateProcessor->setComplexValue('keperluan', $keperluanText);

        // Isi template dengan data
        $templateProcessor->setValue('no_surat', $data['no_surat']);
        $templateProcessor->setValue('kode_tahun', $tahunSekarang);
        $templateProcessor->setValue('jabatan_penanda_tangan', $data['jabatan_penanda_tangan']);
        $templateProcessor->setValue('nama_penanda_tangan', $data['nama_penanda_tangan']);
        $templateProcessor->setValue('nama_penanggung_jawab', $data['nama_penanggung_jawab']);
        $templateProcessor->setValue('nik_penanggung_jawab', $data['nik_penanggung_jawab']);
        $templateProcessor->setValue('tempat_lahir_penanggung_jawab', $data['tempat_lahir_penanggung_jawab']);
        $templateProcessor->setValue('tanggalLahirPenanggungJawabFormatted', $data['tanggalLahirPenanggungJawabFormatted']);
        $templateProcessor->setValue('jenis_kelamin_penanggung_jawab', $data['jenis_kelamin_penanggung_jawab']);
        $templateProcessor->setValue('agama_penanggung', $data['agama_penanggung']);
        $templateProcessor->setValue('status_perkawinan_penanggung', $data['status_perkawinan_penanggung']);
        $templateProcessor->setValue('kewarganegaraan_penanggung', $data['kewarganegaraan_penanggung']);
        $templateProcessor->setValue('pekerjaan', $data['pekerjaan']);
        $templateProcessor->setValue('alamat_penanggung_jawab', $data['alamat_penanggung_jawab']);
        $templateProcessor->setValue('nama_pemohon', $data['nama_pemohon']);
        $templateProcessor->setValue('nik_pemohon', $data['nik_pemohon']);
        $templateProcessor->setValue('tempat_lahir_pemohon', $data['tempat_lahir_pemohon']);
        $templateProcessor->setValue('tanggalLahirPemohonFormatted', $data['tanggalLahirPemohonFormatted']);
        $templateProcessor->setValue('jenis_kelamin_pemohon', $data['jenis_kelamin_pemohon']);
        $templateProcessor->setValue('alamat_pemohon', $data['alamat_pemohon']);
        $templateProcessor->setValue('permohonan', $data['permohonan']);
        $templateProcessor->setValue('tanggalCetakFormatted', $data['tanggalCetakFormatted']);

        // Simpan dokumen sementara
        $penginput = user()->fullname;
        $fileName = 'SKTM_' . time() . '.docx';
        $tempFilePath = WRITEPATH . 'arsip/' . $fileName;
        $templateProcessor->saveAs($tempFilePath);

        // Simpan arsip ke database
        $this->db->table('arsip')->insert([
            'no_surat' => $data['no_surat'],
            'judul_surat' => 'SKTM ' . $data['nama_pemohon'],
            'jenis_surat' => 'SKTM',
            'tipe_surat' => 'Surat Keluar',
            'penginput' => $penginput,
            'file_surat' => $fileName,
        ]);

        // Redirect ke halaman unduhan
        return redirect()->to("/surat/{$fileName}")
            ->with('success', 'Surat berhasil dicetak!')
            ->with('showModal', true);
    }


    public function cetakNamaSama()
{
    $validation = \Config\Services::validation();
    $tahunSekarang = date('Y');

    // Aturan validasi
    $validation->setRules([
        'no_surat'                => 'required|numeric|max_length[7]',
        'tanggal_cetak'           => 'required',
        'jabatan_penanda_tangan'  => 'required',
        'nama_penanda_tangan'     => 'required',
        'perbedaan1'              => 'required',
        'perbedaan2'              => 'required',
        'detail_perbedaan'        => 'required',
        'nama1'                   => 'required',
        'nik1'                    => 'required|numeric',
        'tempat1'                 => 'required',
        'tanggal1'                => 'required',
        'alamat1'                 => 'required',
        'nama2'                   => 'required',
        'nik2'                    => 'required|numeric',
        'tempat2'                 => 'required',
        'tanggal2'                => 'required',
        'alamat2'                 => 'required',
    ]);

    if (!$this->validate($validation->getRules())) {
        return redirect()->back()->withInput()->with('errors', $validation->getErrors())->with('showModal', false);
    }

    // Data yang valid
    $data = $this->request->getPost();

    // Pilih template berdasarkan jabatan penanda tangan
    $jabatanPenandaTangan = $data['jabatan_penanda_tangan'];
    
    $jabatanPenandaTangan = $data['jabatan_penanda_tangan'];

    if ($jabatanPenandaTangan == 'Kepala Desa') {
        $templatePath = WRITEPATH . 'surat/NAMA_SAMA_KADES.docx';
    } elseif ($jabatanPenandaTangan == 'Sekretaris Desa') {
        $templatePath = WRITEPATH . 'surat/NAMA_SAMA.docx';
    } else {
        $templatePath = WRITEPATH . 'surat/NAMA_SAMA.docx';
    }


    // Memastikan file template ada
    if (!file_exists($templatePath)) {
        throw new \Exception("Template surat tidak ditemukan untuk jabatan: " . $jabatanPenandaTangan);
    }

    $templateProcessor = new TemplateProcessor($templatePath);
    $keperluanText = new TextRun();
    $jabatanText = new TextRun();
    $jabatanText->addText(strtoupper($data['nama_penanda_tangan']), ['bold' => true]);

    $templateProcessor->setComplexValue('nama_penanda_tangan_ttd', $jabatanText);


    // Isi template dengan data
    $templateProcessor->setValue('no_tahun', $tahunSekarang);
    $templateProcessor->setValue('no_surat', $data['no_surat']);
    $templateProcessor->setValue('kode_tahun', $tahunSekarang);
    $templateProcessor->setValue('jabatan_penanda_tangan', $data['jabatan_penanda_tangan']);
    $templateProcessor->setValue('nama_penanda_tangan', $data['nama_penanda_tangan']);
    $templateProcessor->setValue('perbedaan1', $data['perbedaan1']);
    $templateProcessor->setValue('perbedaan2', $data['perbedaan2']);
    $templateProcessor->setValue('detail_perbedaan', $data['detail_perbedaan']);
    $templateProcessor->setValue('nama1', $data['nama1']);
    $templateProcessor->setValue('nik1', $data['nik1']);
    $templateProcessor->setValue('tempat1', $data['tempat1']);
    $templateProcessor->setValue('tanggal1', $data['tanggal1Formatted']);
    $templateProcessor->setValue('alamat1', $data['alamat1']);
    $templateProcessor->setValue('nama2', $data['nama2']);
    $templateProcessor->setValue('nik2', $data['nik2']);
    $templateProcessor->setValue('tempat2', $data['tempat2']);
    $templateProcessor->setValue('tanggal2', $data['tanggal2Formatted']);
    $templateProcessor->setValue('alamat2', $data['alamat2']);
    $templateProcessor->setValue('tanggalCetakFormatted', $data['tanggalCetakFormatted']);

    // Simpan dokumen sementara
    $penginput = user()->fullname;
    $fileName = 'NamaSama_' . time() . '.docx';
    $tempFilePath = WRITEPATH . 'arsip/' . $fileName;
    $templateProcessor->saveAs($tempFilePath);

    // Simpan arsip ke database
    $this->db->table('arsip')->insert([
        'no_surat' => $data['no_surat'],
        'judul_surat' => 'Nama Sama - ' . $data['nama1'],
        'jenis_surat' => 'Surat Keterangan Nama Sama',
        'tipe_surat' => 'Surat Keluar',
        'penginput' => $penginput,
        'file_surat' => $fileName,
    ]);

    // Redirect ke halaman unduhan
    return redirect()->to("/surat/{$fileName}")
        ->with('success', 'Surat berhasil dicetak!')
        ->with('showModal', true);
}


    public function unduhDokumen($fileName)
    {
        $tempFilePath = WRITEPATH . 'arsip/' . $fileName;

        if (file_exists($tempFilePath)) {
            return $this->response->download($tempFilePath, null)->setFileName($fileName);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
        return redirect()->to("/arsip");
    }
}
