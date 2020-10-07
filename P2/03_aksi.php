<?php 
	
	if($_GET['aksi']=='Edit'){
	//	echo "Tombol yang ditekan Edit ";
		?>

		<h2>Form Edit Data</h2>
		<form>
			 nama : <input type="text" name="nm" value="<?php echo $_GET['nm']; ?>">
    		<input type="submit" name="sub" value="Simpan Perubahan Data">
    		<input type="submit" name="sub" value="Kembali ke Tampil Data">
			<input type="hidden" name="aksi" value="<?php echo "Edit";?>">
			<input type="hidden" name="idedit" value="<?php 
															if (isset($_GET['idedit']))
																echo $_GET['idedit'];
															else
																echo $_GET['id']; ?>">
		</form>
		<?php
		if (isset($_GET['sub'])){
			if ($_GET['sub']=='Kembali ke Tampil Data')
				header("location:01_tampilData.php");
			else{
				include "00_koneksi.php";
				mysqli_query($kon, "UPDATE `mahasiswa` SET `nama` = '". $_GET['nm'] ."' WHERE `mahasiswa`.`id` = ". $_GET['idedit']);				
				
				echo "Nama baru ". $_GET['nm'] ." sudah diubah";

			}
		}
	}
	else {
		//aksi delete
		echo "<form>";
		echo "Apakah Anda ingin menghapus data <b>". $_GET['nm']."</b>?";
		?>
		
			<input type="submit" name="keputusan" value="ya">
			<input type="submit" name="keputusan" value="tidak">
			<input type="hidden" name="iddelete" value="<?php echo $_GET['id']; ?>">
			<input type="hidden" name="aksi" value="<?php echo "Delete";?>">
			<input type="hidden" name="nm" value="<?php echo $_GET['nm'];?>">
		</form>
		<?php
		if (isset($_GET['keputusan'])){
			if($_GET['keputusan']=='ya'){
				include '00_koneksi.php';
				mysqli_query($kon, "DELETE FROM `mahasiswa` WHERE `mahasiswa`.`id` = ".$_GET['iddelete']);
			//	echo "DELETE FROM `mahasiswa` WHERE `mahasiswa`.`id` = ".$_GET['iddelete'];
			}
			header("location:01_tampilData.php");
		}
	} 


 ?>