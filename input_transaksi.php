<?php
include "loader.php";

$id_transaksi = 0;
$nama_transaksi = "";
$tgl_transaksi = date("Y-m-d");
$harga = 0;
$qty = 0;
$id_barang = 0;
$diskon = 0;
$id_pelanggan = 0;

if(isset($_GET["id"]))
{
  if($_GET["id"] != 0)
  {
    $data = $db->query("SELECT * FROM transaksi WHERE id_transaksi={$_GET["id"]}");

    if($data)
    {
      $id_transaksi = $data[0]["id_transaksi"];
      $nama_transaksi = $data[0]["nama_transaksi"];
      $tgl_transaksi = $data[0]["tgl_transaksi"];
      $harga = $data[0]["harga"];
      $qty = $data[0]["qty"];
      $id_barang = $data[0]["id_barang"];
      $diskon = $data[0]["diskon"];
      $id_pelanggan = $data[0]["id_pelanggan"];
    }
  }
}

$data_kategori = $db->query("SELECT * FROM kategori");
$data_satuan = $db->query("SELECT * FROM satuan");
$data_barang = $db->query("SELECT * FROM barang");
$data_pelanggan = $db->query("SELECT * FROM pelanggan");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transaksi - Input</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" crossorigin="anonymous"></script>
</head>
<body>
  <?php
  include "nav.php"; ?>


  <div class="container">
    <h3 class="page-header">Transaksi - Input</h3>
    <a href="tampil_transaksi.php" class="btn btn-default">Kembali</a>
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="act_transaksi.php?act=save" method="post">
          <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>">
          <div class="form-group">
            <label for="nama_transaksi" class="control-label col-xs-4">Nama Transaksi</label>
            <div class="col-xs-8">
              <input id="nama_transaksi" name="nama_transaksi" type="text" class="form-control" value="<?php echo $nama_transaksi; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="tgl_transaksi" class="control-label col-xs-4">Tanggal Transaksi</label>
            <div class="col-xs-8">
              <input id="tgl_transaksi" readonly name="tgl_transaksi" type="text" class="form-control" value="<?php echo $tgl_transaksi; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="id_pelanggan" class="control-label col-xs-4">Pelanggan</label>
            <div class="col-xs-8">
              <select id="id_pelanggan" name="id_pelanggan" class="select form-control">
                <?php foreach($data_pelanggan as $row): ?><option value="<?php echo $row["id_pelanggan"] ?>" <?php if($row["id_pelanggan"] == $id_pelanggan) echo "selected"; ?>><?php echo $row['nama_pelanggan'] ?></option><?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="id_barang" class="control-label col-xs-4">Barang</label>
            <div class="col-xs-8">
              <select id="id_barang" name="id_barang" class="select form-control">
                <?php foreach($data_barang as $row): ?><option value="<?php echo $row["id_barang"] ?>" <?php if($row["id_barang"] == $id_barang) echo "selected"; ?>><?php echo $row['nama'] ?></option><?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="harga" class="control-label col-xs-4">Harga</label>
            <div class="col-xs-8">
              <input id="harga" name="harga" type="number" class="form-control" value="<?php echo $harga; ?>" required>
            </div>
          </div>
          <div class="form-group">
            <label for="qty " class="control-label col-xs-4">Quantity</label>
            <div class="col-xs-8">
              <input id="qty " name="qty" type="number" class="form-control" value="<?php echo $qty; ?>" required>
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
<script>
  $(document).ready(function(){
    $("#tgl_transaksi").datepicker({
      format:'yyyy-mm-dd'
    });
  })
</script>
</body>
</html>
