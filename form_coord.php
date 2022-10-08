<?php
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    session_start();
    $RA_str = $_POST["obj_RA"];
    $DEC_str = $_POST["obj_DEC"];
    if ($_POST["telescope"]==''){
        exit("You did not choose any telescope");
    }
    $telescope = $_POST["telescope"];
    if ($_POST["type_obs1"]==''){
        exit("You did not choose any telescope");
    }
    $type_obs = $_POST["type_obs1"];
    $start_date_str = $_POST["calend_start"];
    $end_date_str = $_POST["calend_end"];

    $test_RA = "21:45:32";
    $test_DEC = "7:24:15";
    $test_RA_dec = obj_coord_dec($test_RA)[1];
    $test_DEC_dec = obj_coord_dec($test_DEC)[1];

    /// Checking of correct input of coordinates
    $array_RA = obj_coord_dec($RA_str);
    if ($array_RA[0]){
        $RA_dec = obj_coord_dec($RA_str)[1];
    }
    else{
        exit("Incorrect RA");
    }
    $array_DEC = obj_coord_dec($DEC_str);
    if ($array_DEC[0]){
        $DEC_dec = obj_coord_dec($DEC_str)[1];
    }
    else{
        exit("Incorrect DEC");
    }



    $ASI_radius_deg = 2.6;
    $Sh_small_radius_deg = 5;
    $Sh_big_radius_deg = 3;
    $RA_max_dec = 0;
    $RA_min_dec = 0;
    $DEC_max_dec = 0;
    $DEC_min_dec = 0;
    $temp_array = array(0,0);

    if ($telescope == "ASI-2"){
        $RA_max_dec = $RA_dec + ($ASI_radius_deg/15);
        if ($RA_max_dec > 24){
            $RA_max_dec = $RA_max_dec - 24;
        }
        $RA_min_dec = $RA_dec - ($ASI_radius_deg/15);
        if ($RA_min_dec < 0){
            $RA_min_dec = $RA_min_dec + 24;
        }
        $DEC_max_dec = $DEC_dec + ($ASI_radius_deg);
        $DEC_min_dec = $DEC_dec - ($ASI_radius_deg);

        if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)){
            $temp_array[0] = 1;
            if(($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)){
                echo "Bingo!! <br>";
                $temp_array[1] = 1;
            }
            else{
                exit("Unfortunately no DEC <br>");
            }
        }
        else{
            exit("Unfortunately no RA <br>");
        }
    }
    elseif ($telescope == "Shmidt_small"){
        $RA_max_dec = $RA_dec + ( $Sh_small_radius_deg/15);
        if ($RA_max_dec > 24){
            $RA_max_dec = $RA_max_dec - 24;
        }
        $RA_min_dec = $RA_dec - ( $Sh_small_radius_deg/15);
        if ($RA_min_dec < 0){
            $RA_min_dec = $RA_min_dec + 24;
        }
        $DEC_max_dec = $DEC_dec + ($Sh_small_radius_deg);
        $DEC_min_dec = $DEC_dec - ( $Sh_small_radius_deg);

        if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)){
            $temp_array[0] = 1;
            if(($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)){
                echo "Bingo!! <br>";
                $temp_array[1] = 1;
            }
            else{
                exit("Unfortunately no DEC <br>");
            }
        }
        else{
            exit("Unfortunately no RA <br>");
        }
    }
    elseif ($telescope == "Shmidt_big"){
        $RA_max_dec = $RA_dec + ($Sh_big_radius_deg/15);
        if ($RA_max_dec > 24){
            $RA_max_dec = $RA_max_dec - 24;
        }
        $RA_min_dec = $RA_dec - ($Sh_big_radius_deg/15);
        if ($RA_min_dec < 0){
            $RA_min_dec = $RA_min_dec + 24;
        }
        $DEC_max_dec = $DEC_dec + ($Sh_big_radius_deg);
        $DEC_min_dec = $DEC_dec - ($Sh_big_radius_deg);

        if (($RA_min_dec < $test_RA_dec) and ($RA_max_dec > $test_RA_dec)){
            $temp_array[0] = 1;
            if(($DEC_min_dec < $test_DEC_dec) and ($DEC_max_dec > $test_DEC_dec)){
                echo "Bingo!! <br>";
                $temp_array[1] = 1;
            }
            else{
                exit("Unfortunately no DEC <br>");
            }
        }
        else{
            exit("Unfortunately no RA <br>");
        }
    }



}
else{
    exit();
}