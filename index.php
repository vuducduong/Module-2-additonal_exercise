<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post">
    <h2>Taxi fee</h2>
    Km: <input style="text" name="Km" placeholder="enter km">
    <input type="submit" value="ENTER">
    <h2>RESULT:</h2>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kilometer = $_REQUEST["Km"];
    function taxiFee($kilometer)
    {
        if (is_numeric($kilometer)=== FALSE) {
            throw new Exception("Hãy nhập số");
        } else {
            if ($kilometer <= 1) {
                $total = 15000;
                return $total . "VND";
            } else if ($kilometer <= 5 && $kilometer >= 2) {
                $total = ($kilometer - 1) * 13500 + 15000;
                return $total . "VND";
            } elseif ($kilometer > 5 && $kilometer <= 120) {
                $total = 15000 + (4 * 13500) + ($kilometer - 5) * 11000;
                return $total . "VND";
            } else {
                $total = (15000 + (4 * 13500) + ($kilometer - 5) * 11000) * 0.9;
                return $total;
            }
        }

    }

    try {
        $result = taxiFee($kilometer);
        echo $result;
    }
    catch (Exception $e){
        echo $e->getMessage();
    }

}



?>
</body>
</html>
