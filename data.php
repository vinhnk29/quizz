<?php
    $num1 = rand(1,99);
    $num2 = rand(1,99);

    $operators = array('+', '-', '*');
    $gameOperator = $operators[array_rand($operators)];
    $timeDoing = 30;

//    unset score
    if (!isset($_GET["result"])) {
        unset($_SESSION['score']);
    }

//    check result
    $totalScore = isset($_SESSION['score']) ? $_SESSION['score'] : 0;
    if (isset($_GET["result"])) {
        if ($_GET["result"] == $_SESSION["result"]) {
            $totalScore += 10;
        } else {
            $isWrong = true;
        }
    } else {
        $totalScore = 0;
    }
    $_SESSION['score'] = $totalScore;


//    random result
    switch ($gameOperator) {
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
    }
    $_SESSION["result"] = $result;

    $resultRand = array(rand($num1-$num2, $num1*$num2), rand($num1-$num2, $num1*$num2),
        rand($num1-$num2, $num1*$num2), $result);

    shuffle($resultRand);
    $r1 = array_values($resultRand)[0];
    $r2 = array_values($resultRand)[1];
    $r3 = array_values($resultRand)[2];
    $r4 = array_values($resultRand)[3];


//    $resultRand = array($result);
    //        for ($i=0; $i< 4; $i++) {
    //            $val = rand($num1-$num2, $num1*$num2);
    //            if($val != $resultRand[$i]) {
    //                array_push($resultRand, $val);
    //            }
    //        }
    //        shuffle($resultRand);
