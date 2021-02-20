<?php
include "loader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Satuan</title>
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
    <h3 class="page-header">Master Satuan</h3>
    <a href="input_satuan.php" class="btn btn-primary">Add New</a>

    <table class="table table-bordered table-hover table-stripped">
      <tr>
        <th>#</th>
        <th>Nama Kategori</th>
        <th>Pilihan</th>
      </tr>
      <?php
      $no = 1;
      $data = $db->query("SELECT * FROM `satuan`");
      foreach($data as $row):
       ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row["nama"]; ?></td>
        <td>
          <a href="<?php echo "input_satuan.php?id=" . $row["id_satuan"]; ?>" class="btn btn-primary">Edit</a>
          <a href="<?php echo "act_satuan.php?act=delete&id=" . $row["id_satuan"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?');">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>
