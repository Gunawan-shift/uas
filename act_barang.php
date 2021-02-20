<?php
include 'loader.php';
if(isset($_GET["act"]))
{
  switch ($_GET["act"]) {
    case 'save':
      // Jika id=0 ---- Insert
      // Jika id!=0 ---- Update
      if(isset($_POST["id_barang"]))
      {
        if($_POST["id_barang"] == 0)
        {
          $db->query("INSERT INTO `barang`( `nama`, `kategori_id`, `satuan_id`) VALUES ('".$_POST["nama"]."',{$_POST["kategori_id"]},{$_POST["satuan_id"]})");

          redirect("tampil_barang.php");
        }
        else
        {
          $q =  " UPDATE `barang` SET ";
          $q .= " `nama`='".$_POST["nama"]."',";
          $q .= " `kategori_id`='".$_POST["kategori_id"]."',";
          $q .= " `satuan_id`='".$_POST["satuan_id"]."' ";
          $q .= " WHERE `id_barang`={$_POST["id_barang"]}";
          $db->query($q);

          redirect("tampil_barang.php");
        }
      }
      break;

    case 'delete':
      if(isset($_GET["id"]))
      {
        if($_GET["id"] != 0)
        {
          $q = "DELETE FROM `barang` WHERE `id_barang`={$_GET["id"]}";
          $db->query($q);
          $data = $db->query("SELECT * FROM barang WHERE id_barang={$_GET["id"]}");


          redirect("tampil_barang.php");

        }
      }
      break;
    default:
      // code...
      break;
  }
}
