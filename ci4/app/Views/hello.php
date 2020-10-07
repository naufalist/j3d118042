<form action="<?php echo site_url('Mahasiswa/ucapan'); ?> " method="get">
    <input type="text" name="nama" autocomplete="off">
    <input type="submit" name="kirim" value="kirim">
</form>
Selamat Malam <b> <?php echo $n; ?> </b>
<?php
    echo date("d-m-Y")."<br>";
    echo base_url()."<br>";
    echo site_url()."<br>";
    echo site_url('Mahasiswa/ucapan');
?>
