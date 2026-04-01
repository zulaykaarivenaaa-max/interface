<?php
require_once 'Pembayaran.php';
require_once 'Cetak.php';

#Penggunaan Class EWallet
class EWAllet extends Pembayaran implements Cetak {

    public function prosesPembayaran() {
        if ($this->validasi()) {
            return "Pembayaran E-Wallet Rp {$this->jumlah} berhasil";
        }
        return "jumlah tidak valid";
    }

    public function cetakStruk() {
        return "Struk E-Wallet: Rp {$this->jumlah}";
    }
}
?>