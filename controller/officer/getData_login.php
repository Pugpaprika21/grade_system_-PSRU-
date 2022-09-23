<?php

require_once("../../controller/officer/function_officer.php");

if (isset($_POST)) {
    //print_r($_POST);
    //
    $officer_id = $_POST['officer_id'];
    $officer_fname = $_POST['officer_fname'];
    $officer_lname = $_POST['officer_lname'];

    if (select_officer($officer_id, $officer_fname, $officer_lname)) {
        echo json_encode(select_officer($officer_id, $officer_fname, $officer_lname));
        exit;
    } 
}

?>