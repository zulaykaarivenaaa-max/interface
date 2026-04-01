<?php
require_once 'TransferBank.php';
require_once 'EWallet.php';
require_once 'QRIS.php';
require_once 'COD.php';
require_once 'VirtualAccount.php';

$hasil = "";
$struk = "";

if (isset($_POST['bayar'])) {
    $nominal = $_POST['nominal'];
    $metode = $_POST['metode'];

    switch ($metode) {
        case 'TransferBank': $obj = new TransferBank($nominal); break;
        case 'EWallet':      $obj = new EWallet($nominal); break;
        case 'QRIS':         $obj = new QRIS($nominal); break;
        case 'COD':          $obj = new COD($nominal); break;
        case 'VA':           $obj = new VirtualAccount($nominal); break;
    }

    if (isset($obj)) {
        $hasil = $obj->prosesPembayaran();
        $struk = $obj->cetakStruk();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Sistem Pembayaran</title>
    <style>
        body { font-family: sans-serif; margin: 40px; background: #f4f4f4; }
        .container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); max-width: 500px; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #28a745; color: white; border: none; cursor: pointer; font-weight: bold; }
        .result { background: #e9ecef; padding: 15px; margin-top: 20px; border-left: 5px solid #28a745; }
    </style>
</head>
<body>

<div class="container">
    <h2>Form Pembayaran</h2>
    <form method="POST">
        <label>Nominal Pembayaran (Rp):</label>
        <input type="number" name="nominal" placeholder="Contoh: 100000" required>

        <label>Metode Pembayaran:</label>
        <select name="metode">
            <option value="TransferBank">Transfer Bank</option>
            <option value="EWallet">E-Wallet</option>
            <option value="QRIS">QRIS</option>
            <option value="COD">COD (Cash on Delivery)</option>
            <option value="VA">Virtual Account</option>
        </select>

        <button type="submit" name="bayar">Proses Bayar</button>
    </form>

    <?php if ($hasil): ?>
        <div class="result">
            <strong>Status:</strong> <br> <?php echo $hasil; ?>
            <hr>
            <strong>Struk:</strong> <br> <?php echo $struk; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
