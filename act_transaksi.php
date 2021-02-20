<?php
include 'loader.php';
if(isset($_GET["act"]))
{
  switch ($_GET["act"]) {
    case 'save':
      // Jika id=0 ---- Insert
      // Jika id!=0 ---- Update
      if(isset($_POST["id_transaksi"]))
      {
        if($_POST["id_transaksi"] == 0)
        {
          $pelanggan = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan={$_POST["id_pelanggan"]}");

          if($pelanggan[0]["status"] == "member"){
            $diskon = 5;
          }else{
            $diskon = 0;
          }

          $q = "INSERT INTO transaksi(nama_transaksi, tgl_transaksi, harga, qty, id_barang, diskon, id_pelanggan) ";
          $q .= "VALUES ('{$_POST["nama_transaksi"]}', '{$_POST["tgl_transaksi"]}', {$_POST["harga"]}, {$_POST["qty"]}, {$_POST["id_barang"]}, {$diskon}, {$_POST["id_pelanggan"]})";
          $db->query($q);

          redirect("tampil_transaksi.php");
        }
        else
        {
          $pelanggan = $db->query("SELECT * FROM pelanggan WHERE id_pelanggan={$_POST["id_pelanggan"]}");

          if($pelanggan[0]["status"] == "member"){
            $diskon = 5;
          }else{
            $diskon = 0;
          }

          $q =  " UPDATE `transaksi` SET ";
          $q .= " `nama_transaksi`='".$_POST["nama_transaksi"]."',";
          $q .= " `tgl_transaksi`='".$_POST["tgl_transaksi"]."',";
          $q .= " `harga`='".$_POST["harga"]."', ";
          $q .= " `qty`='".$_POST["qty"]."', ";
          $q .= " `id_barang`='".$_POST["id_barang"]."', ";
          $q .= " `diskon`='".$diskon."', ";
          $q .= " `id_pelanggan`='".$_POST["id_pelanggan"]."' ";
          $q .= " WHERE `id_transaksi`={$_POST["id_transaksi"]}";
          $db->query($q);

          redirect("tampil_transaksi.php");
        }
      }
      break;

    case 'delete':
      if(isset($_GET["id"]))
      {
        if($_GET["id"] != 0)
        {
          $q = "DELETE FROM `transaksi` WHERE `id_transaksi`={$_GET["id"]}";
          $db->query($q);
          $data = $db->query("SELECT * FROM transaksi WHERE id_transaksi={$_GET["id"]}");


          redirect("tampil_transaksi.php");

        }
      }
      break;
    default:
      // code...
      break;
  }
}
