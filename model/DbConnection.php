<?php
//
/* function connectionString()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "grade_system_psru";
    //
    $connectionString = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($connectionString, "UTF8");
    return $connectionString;
} */

function connectionString()
{
    $servername = "localhost";
    $username = "6012231021";
    $password = "1021";
    $database = "6012231021";
    //
    $connectionString = mysqli_connect($servername, $username, $password, $database);
    mysqli_set_charset($connectionString, "UTF8");
    return $connectionString;
}

