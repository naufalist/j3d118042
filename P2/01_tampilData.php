<h2>Data Mahasiswa</h2>
<form action="02_tambahdata.php">
    <input type="submit" value="Tambah Data Baru">
</form>
<?php 

	include "00_koneksi.php";
	
	$i = 1;
	$r=mysqli_query($kon,"SELECT * FROM mahasiswa");
	while($brs=mysqli_fetch_assoc($r))
	{
        echo "<form action=\"03_aksi.php\">";	
		echo $i++.". ". $brs["nama"];
        echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Edit\">";
        echo " &nbsp;&nbsp;&nbsp;<input type=\"submit\" name=\"aksi\" value=\"Delete\">";
        echo "<br>";
		echo "<input type=\"hidden\" name=\"id\" value=\"".$brs["id"]."\">";
		echo "<input type=\"hidden\" name=\"nm\" value=\"".$brs["nama"]."\">";
		echo "</form>";

	}
 ?>