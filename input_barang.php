<?php
include "loader.php";

$id_barang = 0;
$nama = "";
$kategori_id = 0;
$satuan_id = 0;

if(isset($_GET["id"]))
{
  if($_GET["id"] != 0)
  {
    $data = $db->query("SELECT * FROM barang WHERE id_barang={$_GET["id"]}");

    if($data)
    {
      $id_barang = $data[0]["id_barang"];
      $nama = $data[0]["nama"];
      $kategori_id = $data[0]["kategori_id"];
      $satuan_id = $data[0]["satuan_id"];

    }
  }
}

$data_kategori = $db->query("SELECT * FROM kategori");
$data_satuan = $db->query("SELECT * FROM satuan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Barang - Input</title>
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
    <h3 class="page-header">Master Barang - Input</h3>
    <a href="tampil_barang.php" class="btn btn-default">Kembali</a>
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="act_barang.php?act=save" method="post">
          <input type="hidden" name="id_barang" value="<?php echo $id_barang; ?>">
          <div class="form-group">
            <label for="nama" class="control-label col-xs-4">Nama Barang</label>
            <div class="col-xs-8">
              <input id="nama" name="nama" type="text" class="form-control" value="<?php echo $nama; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="kategori_id" class="control-label col-xs-4">Kategori</label>
            <div class="col-xs-8">
              <select id="kategori_id" name="kategori_id" class="select form-control">
                <?php foreach($data_kategori as $row): ?><option value="<?php echo $row["id_kategori"] ?>" <?php if($row["id_kategori"] == $kategori_id) echo "selected"; ?>><?php echo $row['nama'] ?></option><?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="satuan_id" class="control-label col-xs-4">Satuan</label>
            <div class="col-xs-8">
              <select id="satuan_id" name="satuan_id" class="select form-control">
                <?php foreach($data_satuan as $row): ?><option value="<?php echo $row["id_satuan"] ?>" <?php if($row["id_satuan"] == $satuan_id) echo "selected"; ?>><?php echo $row['nama'] ?></option><?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-xs-offset-4 col-xs-8">
              <button name="submit" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
