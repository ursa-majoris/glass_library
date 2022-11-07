<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $RA_str = $_POST["obj_RA"];
    $DEC_str = $_POST["obj_DEC"];
    if ($_POST["telescope"] == '') {
        exit("You did not choose any telescope");
    }
    $telescope = $_POST["telescope"];
    if ($_POST["type_obs1"] == '') {
        exit("You did not choose any telescope");
    }
    $type_obs = $_POST["type_obs1"];
    $start_date_str = $_POST["calend_start"];
    $end_date_str = $_POST["calend_end"];
//
//    $test_RA = $RA_str;
//    $test_DEC = $DEC_str;
//    $test_RA_dec = obj_coord_dec($test_RA)[1];
//    $test_DEC_dec = obj_coord_dec($test_DEC)[1];

    /// Checking of correct input of coordinates
    $array_RA = obj_coord_dec($RA_str);
    if ($array_RA[0]) {
        $RA_dec = obj_coord_dec($RA_str)[1];
    } else {
        echo "Incorrect RA <br>";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<br>";
            echo "<a href='$urlback' class='history-back'> Go back </a><br>";
        }
        exit();
    }
    $array_DEC = obj_coord_dec($DEC_str);
    if ($array_DEC[0]) {
        $DEC_dec = obj_coord_dec($DEC_str)[1];
    } else {
        echo "Incorrect DEC <br>";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<br>";
            echo "<a href='$urlback' class='history-back'> Go back </a><br>";
        }
        exit();
    }


    $ASI_radius_deg = 2.6;
    $Sh_small_radius_deg = 5;
    $Sh_big_radius_deg = 3;
    $RA_max_dec = 0;
    $RA_min_dec = 0;
    $DEC_max_dec = 0;
    $DEC_min_dec = 0;
    $temp_array = array(0, 0);

    $date_start_str = $_POST["calend_start"];
    $date_end_str = $_POST["calend_end"];
    $jd_array = date_to_array($date_start_str, $date_end_str);

    $type_obs_user = $_POST["type_obs1"];
    //echo "type_obs_user $type_obs_user <br>";

//    $db_host = 'localhost'; // ваш хост
//    $db_name = 'glass_lib'; // ваша бд
//    $db_user = 'user1'; // пользователь бд
//    $db_pass = 'Saule'; // пароль к бд

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
    //$search_rez_bool = false;
    $sql = mysqli_query($link, 'SELECT *  FROM `glass_database`');
    while ($result = mysqli_fetch_array($sql)) {
        $test_RA_dec = $result['RA'];
        $test_RA_dec = obj_coord_dec($test_RA_dec)[1];

        $test_DEC_dec = $result['DECL'];
        $test_DEC_dec = obj_coord_dec($test_DEC_dec)[1];

        $temp_type_obs = $result['type_obs'];
        //echo $temp_type_obs."<br>";

        if(($temp_type_obs == $type_obs_user) or $type_obs_user ==2 ){
            if ($telescope == 1) {
                $RA_max_dec = $RA_dec + ($ASI_radius_deg / 15);

                if ($RA_max_dec > 24) {
                    $RA_max_dec = $RA_max_dec - 24;
                }
                //echo "RA_max_dec $RA_max_dec <br>";
                $RA_min_dec = $RA_dec - ($ASI_radius_deg / 15);
                if ($RA_min_dec < 0) {
                    $RA_min_dec = $RA_min_dec + 24;
                }
                //echo "RA_min_dec $RA_min_dec <br>";
                $DEC_max_dec = $DEC_dec + ($ASI_radius_deg);
                $DEC_min_dec = $DEC_dec - ($ASI_radius_deg);
                //echo "test_RA_dec $test_RA_dec <br>";
                if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)) {
                    $temp_array[0] = 1;
                    if (($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)) {

                        if (($jd_array[0] < $result['jd']) and ($jd_array[1] > $result['jd'])){
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
                            $temp_array[1] = 1;
                        }

                    }
                    else {
                        continue;
                    }
                }
                else {
                    continue;
                }
            }
            elseif ($telescope == 2) {
                $RA_max_dec = $RA_dec + ($Sh_small_radius_deg / 15);
                if ($RA_max_dec > 24) {
                    $RA_max_dec = $RA_max_dec - 24;
                }
                $RA_min_dec = $RA_dec - ($Sh_small_radius_deg / 15);
                if ($RA_min_dec < 0) {
                    $RA_min_dec = $RA_min_dec + 24;
                }
                $DEC_max_dec = $DEC_dec + ($Sh_small_radius_deg);
                $DEC_min_dec = $DEC_dec - ($Sh_small_radius_deg);

                if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)) {
                    $temp_array[0] = 1;
                    if (($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)) {
                        //echo "Bingo!! <br>";
                        $temp_array[1] = 1;
                    } else {
                        exit("Unfortunately no DEC <br>");
                    }
                } else {
                    exit("Unfortunately no RA <br>");
                }
            } elseif ($telescope == 2) {
                $RA_max_dec = $RA_dec + ($Sh_big_radius_deg / 15);
                if ($RA_max_dec > 24) {
                    $RA_max_dec = $RA_max_dec - 24;
                }
                $RA_min_dec = $RA_dec - ($Sh_big_radius_deg / 15);
                if ($RA_min_dec < 0) {
                    $RA_min_dec = $RA_min_dec + 24;
                }
                $DEC_max_dec = $DEC_dec + ($Sh_big_radius_deg);
                $DEC_min_dec = $DEC_dec - ($Sh_big_radius_deg);

                if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)) {
                    $temp_array[0] = 1;
                    if (($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)) {

                        if (($jd_array[0] < $result['jd']) and ($jd_array[1] > $result['jd'])) {
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
                            $temp_array[1] = 1;
                        }

                    }
                    else {
                        continue;
                    }
                }
                else {
                    continue;
                }
            }
        }





    }

    if ($temp_array[1] == 0){
        echo "No any files with such coordinates during input period <br>";
        if(isset($_SERVER['HTTP_REFERER'])) {
            $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
            echo "<br>";
            echo "<a href='$urlback' class='history-back'> Go back </a><br>";
        }
        exit();
    }
}
else{
    if(isset($_SERVER['HTTP_REFERER'])) {
        $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
        echo "<br>";
        echo "<a href='$urlback' class='history-back'> Go back </a><br>";
    }
    }


