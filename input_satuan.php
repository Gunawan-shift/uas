<?php
include "loader.php";

$id_satuan = 0;
$nama = "";

if(isset($_GET["id"]))
{
  if($_GET["id"] != 0)
  {
    $data = $db->query("SELECT * FROM SATUAN WHERE id_satuan={$_GET["id"]}");

    if($data)
    {
      $id_satuan = $data[0]["id_satuan"];
      $nama = $data[0]["nama"];
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Satuan - Input</title>
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
    <h3 class="page-header">Master Satuan - Input</h3>
    <a href="tampil_satuan.php" class="btn btn-default">Kembali</a>
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="act_satuan.php?act=save" method="post">
          <input type="hidden" name="id_satuan" value="<?php echo $id_satuan; ?>">
          <div class="form-group">
            <label for="nama" class="control-label col-xs-4">Nama Satuan</label>
            <div class="col-xs-8">
              <input id="nama" name="nama" placeholder="Nama Satuan" type="text" required="required" class="form-control" value="<?php echo $nama; ?>">
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
