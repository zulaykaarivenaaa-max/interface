<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

class VirtualAccount extends Pembayaran implements Cetak {
    public function prosesPembayaran() {
        if ($this->validasi()) {
            // Tugas 2: Diskon 10% dan Pajak 11%
            $diskon = $this->jumlah * 0.10;
            $setelahDiskon = $this->jumlah - $diskon;
            $pajak = $setelahDiskon * 0.11;
            $total = $setelahDiskon + $pajak;

            return "VA Berhasil: Harga Rp " . number_format($this->jumlah) . 
                   ", Diskon (10%): Rp " . number_format($diskon) . 
                   ", Pajak (11%): Rp " . number_format($pajak) . 
                   ". Total Bayar: **Rp " . number_format($total) . "**";
        }
        return "Jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk Virtual Account: Pembayaran Digital Terverifikasi.";
    }
}