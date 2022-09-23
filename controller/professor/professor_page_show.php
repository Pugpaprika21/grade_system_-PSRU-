<?php

require_once("../../controller/professor/function_professor.php");
//
$professor_id = $_POST['professor_id'];
$professor_fname = $_POST['professor_fname'];
$professor_lname = $_POST['professor_lname'];
//
if (select_professor($professor_id, $professor_fname, $professor_lname)) {
    echo json_encode(select_professor($professor_id, $professor_fname, $professor_lname));
    exit;
} 
