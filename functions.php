<?php
function obj_coord_dec($time_input):array{
    $first_position_sep = mb_strpos($time_input, ':'); // To find a place of first position ":" in $time_input
    $first = mb_substr($time_input, 0, $first_position_sep); // Trim $time_input to find first digits of time (horus)
    $flag_first = 0;
    if (is_numeric($first)){
        $first = (int)$first;
        $flag_first = 1;
    }

    $second_position_sep = strpos($time_input, ':', $first_position_sep + 1); // to find second input ":" in text time
    $minutes = mb_substr($time_input, $first_position_sep +1, $second_position_sep - $first_position_sep -1); // To find minutes in time
    $flag_min = 0;
    if (is_numeric($minutes)){
        $minutes = (int)$minutes;
        $flag_min = 1;
    }
    $seconds = mb_substr($time_input, $second_position_sep +1, strlen($time_input) - $second_position_sep - 1);// to find seconds in time
    $flag_sec = 0;
    if (is_numeric($seconds)){
        $seconds = (float)$seconds;
        $flag_sec = 1;
    }
    if($first >= 0){
        $total_coord_decimal = $first + ($minutes / 60) + ($seconds / 3600); // a time recalculated in decimal system
    }
    else{
        $total_coord_decimal = (abs($first)+ ($minutes / 60) + ($seconds / 3600)) * (-1);
    }
    if ($flag_first and $flag_min and $flag_sec){
        return array(1, $total_coord_decimal);

    }
    else{
        return array(0, 0);
    }
}