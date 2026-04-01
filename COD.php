<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class COD extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            // Tugas 2: Hitung Pajak 11% (COD biasanya tidak diskon, tapi kena biaya layanan/pajak)
            $pajak = $this->jumlah * 0.11;
            $total = $this->jumlah + $pajak;
            return "Pembayaran COD: Rp " . number_format($this->jumlah) . " + Pajak (11%): Rp " . number_format($pajak) . ". Total: *Rp " . number_format($total) . "*";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk COD: Menunggu Pembayaran di Tempat.";
    }
}