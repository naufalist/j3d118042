<h2>FORM ISI DATA BARU</h2>
<form>
    nama : <input type="text" name="nm">
    <input type="submit" name="sub" value="Simpan Data Baru">
    <input type="submit" name="sub" value="Kembali ke Tampil Data">
</form>

<?php
        if (isset($_GET['sub'])) { //mengecek udah ditekan atau belum	
			if ($_GET['sub']=="Kembali ke Tampil Data"){
			  header("location:01_tampildata.php");
			}
			else{
			    //mulai sini
			  if (strlen($_GET['nm'])) { //strlen mengukur panjang string || Tujuannya mengecek data kosong atau tidak
                    include "00_koneksi.php";
                    mysqli_query($kon,"INSERT INTO `mahasiswa` (`id`, `nama`)
                                       VALUES (NULL, '".$_GET['nm']."')");
					
					#echo "INSERT INTO `mahasiswa` (`id`, `nama`)
                      #                 VALUES (NULL, '".$_GET['nm']."')" ;				   
                    
					echo "<br>Data <b>".$_GET['nm']."</b> Telah Disimpan di Database";
                }
                else
                    echo "<br>Data Nama Tidak Boleh Kosong";
			}
			//sampe sini
			
		}
?>