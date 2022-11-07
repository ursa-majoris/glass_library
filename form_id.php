<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $obj_id = $_POST["obj_id"];
    //$_SESSION["id"] = $id;

//    $db_host='localhost'; // ваш хост
//    $db_name='glass_lib'; // ваша бд
//    $db_user='user1'; // пользователь бд
//    $db_pass='Saule'; // пароль к бд

    $db_host='db.fai.kz'; // ваш хост
    $db_name='votest'; // ваша бд
    $db_user='vo'; // пользователь бд
    $db_pass='LongLiveVO!'; // пароль к бд


    //mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    //echo "$mysqli";
    //$mysqli->set_charset("utf8_general_ci");
    $link = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$link) {
        echo 'Can not connect with database: ' . mysqli_connect_errno() . ', error: ' . mysqli_connect_error();

        if(isset($_SERVER['HTTP_REFERER'])) {
            $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<br>";
            echo "<a href='$urlback' class='history-back'> Go back </a><br>";
        }

        exit;
    }
    $search_rez_bool = false;
    $sql = mysqli_query($link, 'SELECT *  FROM `glass_database`');
    while ($result = mysqli_fetch_array($sql)) {
        if($result['id'] == $obj_id){
            echo "Astroplate id: ".$result['id']. "<br>";
            echo "Object name: ".$result['name']. "<br>";
            echo "Object type: ".$result['type']. "<br>";
            echo "Center RA: ".$result['RA']. "<br>";
            echo "Center DEC: ".$result['DECL']. "<br>";
            echo "JD: ".$result['jd']. "<br>";
            echo "Date: ".$result['date']. "<br>";
            echo "UT time: ".$result['time_ut']. "<br>";
            echo "Exptime: ".$result['exptime']." s". "<br>";
            echo "Telescope: ".$result['telescope']. "<br>";
            echo "Observer: ".$result['observer']. "<br>";
            echo "FITS: ".$result['url']. "<br>";
            echo "<br>";
            $search_rez_bool = true;
        }

        //echo "itteraton <br>";



    }
    if (!$search_rez_bool){
        echo "Unfortunately there is no astroplate with such id <br>";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<br>";
            echo "<a href='$urlback' class='history-back'> Go back </a><br>";
        }
        exit();


    }

    if(isset($_SERVER['HTTP_REFERER'])) {
        $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<br>";
        echo "<a href='$urlback' class='history-back'> Go back </a><br>";
    }


}
