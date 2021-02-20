<?php
include "loader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laporan</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
  include "nav.php"; ?>

  <div class="container">
    <h3 class="page-header">Laporan</h3>

    <table class="table table-bordered table-hover table-stripped">
      <tr>
        <th>#</th>
        <th>Pelanggan</th>
        <th>Status</th>
        <th>Kategori</th>
        <th>Barang</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Diskon</th>
        <th>Total</th>
      </tr>
      <?php
      $no = 1;
      $q = "SELECT
        transaksi.id_transaksi,
        transaksi.nama_transaksi,
        transaksi.tgl_transaksi,
        transaksi.harga,
        transaksi.qty,
        transaksi.id_barang,
        transaksi.diskon,
        transaksi.id_pelanggan,
        pelanggan.nama_pelanggan,
        pelanggan.status,
        barang.nama AS nama_barang,
        kategori.nama AS nama_kategori,
        satuan.nama AS nama_satuan,
        (transaksi.harga * transaksi.qty) - ((transaksi.harga * transaksi.qty) * (transaksi.diskon/100)) AS total
      FROM transaksi
      INNER JOIN pelanggan ON (pelanggan.id_pelanggan=transaksi.id_pelanggan)
      INNER JOIN barang ON (barang.id_barang=transaksi.id_barang)
      INNER JOIN satuan ON (satuan.id_satuan=barang.satuan_id)
      INNER JOIN kategori ON (kategori.id_kategori=barang.kategori_id)
      ";
      $data = $db->query($q);
      $gt = 0;
      foreach($data as $row):
        $gt = $gt+$row["total"];
       ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row["nama_pelanggan"]; ?></td>
        <td><?php echo ucfirst($row["status"]); ?></td>
        <td><?php echo $row["nama_kategori"]; ?></td>
        <td><?php echo $row["nama_barang"]; ?></td>
        <td class="text-right"><?php echo number_format($row["qty"], 2); ?></td>
        <td class="text-right"><?php echo number_format($row["harga"], 2); ?></td>
        <td class="text-right"><?php echo number_format($row["diskon"], 2); ?> <?php if($row["diskon"] != 0) echo "%"; ?></td>
        <td class="text-right"><?php echo number_format($row["total"], 2); ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td style="font-weight:bold" class="text-right" colspan="8">Grand Total</td>
        <td style="font-weight:bold" class="text-right"><?php echo number_format($gt, 2); ?></td>
      </tr>
    </table>
  </div>
</body>
</html>
