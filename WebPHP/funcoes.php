<?php
function datetobr($data){
    $data = explode("-", $data);
    return $data[2]."/".$data[1]."/".$data[0];
}

function datetoen($data){
    $data = explode("/", $data);
    return $data[2]."-".$data[1]."-".$data[0];
}
?>
