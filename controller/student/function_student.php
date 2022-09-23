<?php

session_start();
//
require_once("../../model/DbConnection.php");
//
function insert_student(
    $student_id,
    $student_fname,
    $student_lname,
    $student_gender,
    $student_date,
    $student_class,
    $student_phone,
    $student_email,
    $student_img
) {

    $insert_register = "INSERT INTO tbl_student(
        student_id, student_fname, student_lname, student_gender,
        student_date, student_class, student_phone, student_email,
        student_img
    ) VALUES(
        '$student_id', '$student_fname', '$student_lname', '$student_gender',
        '$student_date', '$student_class', '$student_phone', '$student_email', 
        '$student_img'
    )";

    if (mysqli_query(connectionString(), $insert_register)) {
        return true;
    }
}
//
function select_student($student_id, $student_fname, $student_lname)
{
    $student_login = array();
    $select_student = "SELECT * FROM tbl_student 
        WHERE student_id = '$student_id' 
        AND student_fname = '$student_fname' 
        AND student_lname = '$student_lname'";
    //
    $select_login = mysqli_query(connectionString(), $select_student);
    //
    while ($row = mysqli_fetch_array($select_login)) { 
        array_push($student_login, $row);
    }
    return $student_login;
}
function select_subject_id($student_id) {
    $student_subject_id = array();
    $SQL = "SELECT * FROM tbl_grades WHERE student_id = '$student_id'";
    $select_id = mysqli_query(connectionString(), $SQL);
    //
    while ($row = mysqli_fetch_array($select_id )) { 
        array_push($student_subject_id, $row);
    }
    return $student_subject_id;
}
