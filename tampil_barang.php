<?php
include "loader.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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
  <h3 class="page-header">Master Barang</h3>
<a href="input_barang.php" class="btn btn-primary">Add New</a>
<table class="table table-bordered table-hover table-stripped">
  <tr>
    <th>#</th>
    <th>Nama barang</th>
    <th>Kategori</th>
    <th>satuan</th>
    <th>Pilihan</th>
  </tr>
  <?php
  $no = 1;
  $q = "SELECT barang.id_barang, barang.nama, kategori.nama AS nama_kategori, satuan.nama AS nama_satuan  FROM `barang` INNER JOIN `kategori` ON (`kategori`.id_kategori=barang.kategori_id) INNER JOIN satuan ON (satuan.id_satuan=barang.satuan_id)";
  $data = $db->query($q);
  foreach($data as $row):
   ?>
  <tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $row["nama"]; ?></td>
    <td><?php echo $row["nama_kategori"]; ?></td>
    <td><?php echo ucfirst($row["nama_satuan"]); ?></td>

    <td>
      <a href="<?php echo "input_barang.php?id=" . $row["id_barang"]; ?>" class="btn btn-primary">Edit</a>
      <a href="<?php echo "act_barang.php?act=delete&id=" . $row["id_barang"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?');">Hapus</a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
</div>
<input type="hidden" name="id_barang" value="2">
</body>
</html>
<?php
