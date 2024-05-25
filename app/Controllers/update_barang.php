<?php

namespace App\Controllers;

use App\Models\Barang_model;
use App\Models\Masuk_model;
use CodeIgniter\Controller;

class CronJob extends Controller
{
    public function updateBarang()
    {
        $barangMasukModel = new Masuk_model();
        $barangModel = new Barang_model();

        // Dapatkan semua data barang masuk yang lebih dari seminggu
        $barangMasukList = $barangMasukModel->getBarangMasukLebihDariSeminggu();

        foreach ($barangMasukList as $barangMasuk) {
            // Update jumlah barang di tb_barang
            $barangModel->updateBarangJumlah($barangMasuk['id_barang'], $barangMasuk['jumlah']);
            // Hapus data di tb_barangmasuk
            $barangMasukModel->deleteBarangMasuk($barangMasuk['id_pengadaan']);
        }

        return "Update and delete process completed.";
    }
}

// Menjalankan fungsi updateBarang
$cronJob = new CronJob();
echo $cronJob->updateBarang();
?>
