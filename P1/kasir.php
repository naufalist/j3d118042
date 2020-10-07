<form method="get">
    <input type="text" name="namamenu">
    <input type="number" name="bilangan">
    <input type="submit" value="jumlahkan!">
    <p>
    hasilnya
    <br>
    <?php
        if (isset($_GET['bilangan']) && strlen($_GET['bilangan'])) {
            if(isset($_GET['bilangans']))
                $data = $_GET["bilangans"];
            else 
                $data = array(); 
            array_push($data,$_GET['bilangan']);
            foreach($data as $x) 
                echo  '<input type="hidden" name="bilangans[]" value="'.$x.'">';
        
            //print_r($data);
                $sum = 0;
                foreach($data as $x) {
                    echo "$x<br>";
                    $sum += $x;
                }
                echo "------- +<br>$sum";
            }
    ?>
</form>