<?php
include "loader.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Pelanggan</title>
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
    <h3 class="page-header">Master Pelanggan</h3>
    <a href="input_pelanggan.php" class="btn btn-primary">Add New</a>

    <table class="table table-bordered table-hover table-stripped">
      <tr>
        <th>#</th>
        <th>Nama pelanggan</th>
        <th>No Telpon</th>
        <th>Status</th>
      </tr>
      <?php
      $no = 1;
      $data = $db->query("SELECT * FROM `pelanggan`");
      foreach($data as $row):
       ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row["nama_pelanggan"]; ?></td>
        <td><?php echo $row["no_tlp"]; ?></td>
        <td><?php echo ucfirst($row["status"]); ?></td>

        <td>
          <a href="<?php echo "input_pelanggan.php?id=" . $row["id_pelanggan"]; ?>" class="btn btn-primary">Edit</a>
          <a href="<?php echo "act_pelanggan.php?act=delete&id=" . $row["id_pelanggan"]; ?>" class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data?');">Hapus</a>
        </td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>
</body>
</html>
