<?php
function echoToConsole($data)
{
    $output = "Debug Objects: ";
    if (is_array($data)) {
        if (is_array($data[0])){
            foreach ($data as $d){
                $output .= implode(',', $d) . ',';
            }
        } else {
            echo "here";
            $output .= implode(',', $data);
        }
    } else {
        $output .= $data;
    }
    print_r("<script>console.log('$output');</script>");
}

function move($location)
{
    echo "<script>document.location='$location';</script>";
}