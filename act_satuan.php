<?php
include 'loader.php';
if(isset($_GET["act"]))
{
  switch ($_GET["act"]) {
    case 'save':
      // Jika id=0 ---- Insert
      // Jika id!=0 ---- Update
      if(isset($_POST["id_satuan"]))
      {
        if($_POST["id_satuan"] == 0)
        {
          $db->query("INSERT `satuan` (`nama`) VALUES ('".$_POST["nama"]."')");

          redirect("tampil_satuan.php");
        }
        else
        {
          $q = "UPDATE `satuan` SET `nama`='".$_POST["nama"]."' WHERE `id_satuan`={$_POST["id_satuan"]}";
          $db->query($q);

          redirect("tampil_satuan.php");
        }
      }
      break;

    case 'delete':
      if(isset($_GET["id"]))
      {
        if($_GET["id"] != 0)
        {
          $q = "DELETE FROM `satuan` WHERE `id_satuan`={$_GET["id"]}";
          $db->query($q);
          $data = $db->query("SELECT * FROM satuan WHERE id_satuan={$_GET["id"]}");


          redirect("tampil_satuan.php");

        }
      }
      break;
    default:
      // code...
      break;
  }
}
