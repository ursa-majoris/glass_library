<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $obj_id = $_POST["obj_id"];
    $date_start_str = $_POST["calend_start"];
    //echo $date_start_str."<br>";
    //echo substr($date_start_str, 8,2)."<br>";
    $date_end_str = $_POST["calend_end"];
    //echo $date_end_str."<br>";
    //echo (int)"01 <br>";
    $jd_array = date_to_array($date_start_str, $date_end_str);
    if(empty($_POST["obj_name"])){
        exit("You did not input any object name to search");
    }
    $obj_name = $_POST["obj_name"];
    $obj_name = str_replace(' ','', $obj_name);
    $obj_name = strtoupper($obj_name);

    $type_obs_user = $_POST["type_obs1"];


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
    $sql = mysqli_query($link, 'SELECT *  FROM `glass_database`');

    //// Amount of elements
    $rez = mysqli_query($link, 'SELECT COUNT(*)   FROM `glass_database`');
    $count = mysqli_fetch_row($rez);
    //echo $count [0]."<br>";
    $flag_yes_bull = 0;

    while ($result = mysqli_fetch_array($sql)) {
        $temp_name = $result['name'];
        $temp_name = str_replace(' ','', $temp_name);
        $temp_name = strtoupper($temp_name);
        $temp_type_obs = $result['type_obs'];

        if(($temp_type_obs == $type_obs_user) or ($type_obs_user ==2) ){
            if($temp_name == $obj_name){
                if (($jd_array[0] < $result['jd']) and ($jd_array[1] > $result['jd'])){
                    echo "Astroplate id: ".$result['id']. "<br>";
                    echo "<b>Object name: </b>".$result['name']. "<br>";
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
                    $flag_yes_bull = 1;
                    echo "<br>";
                }
            }
        }


    }
    if ($flag_yes_bull == 0){
        echo "No files with such object name <br>";
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
