<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ozge</title>
    <style>
        body{
            max-width: 40%;
            margin-left: auto;
            margin-right: auto;
        }
        .container form{
            margin-top: 25px;
            position: relative;
            display: flex;
            justify-content: space-between;
            height: 100px;
        }
        .container .button{
            position: absolute;
            top: 50px;
            right: 0;
        }

    </style>
</head>
<body>

    <?php
    $ratesUsd = array("usd"=>1,"cad"=>1.25,"eur"=>0.91);
    $ratesCad = array("cad"=>1,"usd"=>0.8,"eur"=>0.72);
    $ratesEur = array("eur"=>1,"cad"=>1.38,"usd"=>1.1);
    $from = 0;
    $to = 0;
    (float)$newMoney = 0;

    if ($_GET['currency1'] == "usd") {
        (float)$newMoney = (float)$ratesUsd[$_GET['currency1']] * (float)$_GET['from'] * (float)$ratesUsd[$_GET['currency2']];
    }
    elseif($_GET['currency1'] == "cad"){
        (float)$newMoney = (float)$ratesCad[$_GET['currency1']] * (float)$_GET['from'] * (float)$ratesCad[$_GET['currency2']];
    }
    else {
        (float)$newMoney = (float)$ratesEur[$_GET['currency1']] * (float)$_GET['from'] * (float)$ratesEur[$_GET['currency2']];
    }

    ?>


    <div class="container">
        <form action="" method='GET'>
            <div class="input-box">
                <label for="">From:</label>
                <input type="text" name="from" value=<?php if (isset($_GET['from'])) {
                                                                    echo $_GET['from'];
                                                                }  ?>>

                <br>

                <label for="">To:</label>
                <input type="text" name="to" value=<?php echo $newMoney ?>>
            </div>
            <div class="combo-box">
                <label for="Currency">Currency:</label>
                <select id="currency1" name="currency1">
                    <option value="usd">US Dollar</option>
                    <option value="cad">Canadian Dollar</option>
                    <option value="eur">Euro</option>
                </select>

                <br>

                <label for="Currency">Currency:</label>
                <select id="currency2" name="currency2">
                    <option value="usd">US Dollar</option>
                    <option value="cad">Canadian Dollar</option>
                    <option value="eur">Euro</option>
                </select>
            </div>
            <input class="button" type="submit" value="Convert"/>
           
        </form>
    </div>
</body>
</html>