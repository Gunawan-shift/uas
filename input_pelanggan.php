<?php
include "loader.php";

$id_pelanggan = 0;
$nama_pelanggan = "";
$no_tlp = "";
$status = "nonmember";

if(isset($_GET["id"]))
{
  if($_GET["id"] != 0)
  {
    $data = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan={$_GET["id"]}");

    if($data)
    {
      $id_pelanggan = $data[0]["id_pelanggan"];
      $nama_pelanggan = $data[0]["nama_pelanggan"];
      $no_tlp = $data[0]["no_tlp"];
      $status = $data[0]["status"];

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Master Pelanggan - Input</title>
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
    <h3 class="page-header">Master Pelanggan - Input</h3>
    <a href="tampil_pelanggan.php" class="btn btn-default">Kembali</a>
    <div class="row">
      <div class="col-md-12">
        <form class="form-horizontal" action="act_pelanggan.php?act=save" method="POST">
          <input type="hidden" name="id_pelanggan" value= "<?php echo $id_pelanggan; ?>">
          <div class="form-group">
            <label for="nama_pelanggan" class="control-label col-xs-4">Nama Pelanggan</label>
            <div class="col-xs-8">
              <input id="nama_pelanggan" name="nama_pelanggan" type="text" class="form-control" value="<?php echo $nama_pelanggan; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="no_tlp" class="control-label col-xs-4">No Telpon</label>
            <div class="col-xs-8">
              <input id="no_tlp" name="no_tlp" type="text" class="form-control" value="<?php echo $no_tlp; ?>">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="control-label col-xs-4">Status</label>
            <div class="col-xs-8">
              <label class="radio-inline">
                <input type="radio" name="status" value="member" <?php if($status=="member") echo "checked" ?>>
                      Member
              </label>
              <label class="radio-inline">
                <input type="radio" name="status" value="nonmember" <?php if($status=="nonmember") echo "checked" ?>>
                      Non Member
              </label>
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
