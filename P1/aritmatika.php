<html>
<head>
</head>
<body>
    <form method="GET" action="aritmatika.php">
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
            if (isset($_GET['sub']) and strlen($_GET['bil1']) and strlen($_GET['bil2'])) {
                $n1 = $_GET['bil1'];
                $n2 = $_GET['bil2'];

                switch ($_GET['opr']) {
                    case '+':
                        $hsl = $n1 + $n2;
                        break;
                    case '-':
                        $hsl = $n1 - $n2;
                        break;
                    case '/':
                        $hsl = $n1 / $n2;
                        break;
                    case 'x':
                        $hsl = $n1 * $n2;
                        break;
                }
                echo $hsl;
            }
        ?>
    </form>
</body>
</html>