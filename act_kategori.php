<?php
include 'loader.php';
if(isset($_GET["act"]))
{
  switch ($_GET["act"]) {
    case 'save':
      // Jika id=0 ---- Insert
      // Jika id!=0 ---- Update
      if(isset($_POST["id_kategori"]))
      {
        if($_POST["id_kategori"] == 0)
        {
          $db->query("INSERT `kategori` (`nama`) VALUES ('".$_POST["nama"]."')");

          redirect("tampil_kategori.php");
        }
        else
        {
          $q = "UPDATE `kategori` SET `nama`='".$_POST["nama"]."' WHERE `id_kategori`={$_POST["id_kategori"]}";
          $db->query($q);

          redirect("tampil_kategori.php");
        }
      }
      break;

    case 'delete':
      if(isset($_GET["id"]))
      {
        if($_GET["id"] != 0)
        {
          $q = "DELETE FROM `kategori` WHERE `id_kategori`={$_GET["id"]}";
          $db->query($q);
          $data = $db->query("SELECT * FROM kategori WHERE id_kategori={$_GET["id"]}");


          redirect("tampil_kategori.php");

        }
      }
      break;
    default:
      // code...
      break;
  }
}
