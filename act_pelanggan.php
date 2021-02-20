<?php
include 'loader.php';
if(isset($_GET["act"]))
{
  switch ($_GET["act"]) {
    case 'save':
      // Jika id=0 ---- Insert
      // Jika id!=0 ---- Update
      if(isset($_POST["id_pelanggan"]))
      {
        if($_POST["id_pelanggan"] == 0)
        {
          $db->query("INSERT INTO `pelanggan`( `nama_pelanggan`, `no_tlp`, `status`) VALUES ('".$_POST["nama_pelanggan"]."','".$_POST["no_tlp"]."','".$_POST["status"]."')");

          redirect("tampil_pelanggan.php");
        }
        else
        {
          $q = "UPDATE `pelanggan` SET `nama_pelanggan`='".$_POST["nama_pelanggan"]."',`no_tlp`='".$_POST["no_tlp"]."',`status`='".$_POST["status"]."' WHERE `id_pelanggan`={$_POST["id_pelanggan"]}";
          $db->query($q);

          redirect("tampil_pelanggan.php");
        }
      }
      break;

    case 'delete':
      if(isset($_GET["id"]))
      {
        if($_GET["id"] != 0)
        {
          $q = "DELETE FROM `pelanggan` WHERE `id_pelanggan`={$_GET["id"]}";
          $db->query($q);
          $data = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan={$_GET["id"]}");


          redirect("tampil_pelanggan.php");

        }
      }
      break;
    default:
      // code...
      break;
  }
}
