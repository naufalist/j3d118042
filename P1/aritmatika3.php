<html>
<head>
</head>
<body>
    <form method="GET" action="aritmatika3.php">
        <input type="text" name="bil1" autocomplete="off"
            <?php
                if (isset($_GET['bil1'])) {
                    echo 'value="'.$_GET['bil1'].'"';
                }
            ?>
        >
        <select name="opr">
        <?php

            $opr = array('+', '-', 'x', '*');

            for ($i=0; $i < count($opr); $i++) { 
                if (isset($_GET['opr']) and $_GET['opr'] == $opr[$i]) {
                    echo '<option value="'.$opr[$i].'" selected>'.$opr[$i].'</option>';
                } else {
                    echo '<option value="'.$opr[$i].'">'.$opr[$i].'</option>';
                }
            }
        ?>
            <!-- <option value="+">+</option>
            <option value="-">-</option>
            <option value="/">/</option>
            <option value="x">x</option> -->
        </select>
        <input type="text" name="bil2" autocomplete="off"
            <?php
                if (isset($_GET['bil2'])) {
                    echo 'value="'.$_GET['bil2'].'"';
                }
            ?>
        >
        <input type="submit" name="sub" value="=">
        <?php
            include('pustaka.php');

            if (isset($_GET['sub']) and strlen($_GET['bil1']) and strlen($_GET['bil2'])) {
                $hsl = aksiOperasi($_GET['bil1'], $_GET['bil2'], $_GET['opr']);
                echo $hsl;
                $log = $_GET['log']."<br>".$_GET['bil1']." ".$_GET['opr']." ".$_GET['bil2']." = ".$hsl;
                echo "<h2>Log Perhitungan</h2>";
                echo $log;
            
            }
        ?>
        <input type="hidden" name="log"
        <?php
        if (isset($_GET['sub'])) {
            echo 'value="'.$log.'"';
        }
        ?>
        >
    </form>
</body>
</html>