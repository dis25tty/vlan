<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    $query = "DELETE FROM ap WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "AP Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "AP Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $apip = mysqli_real_escape_string($con, $_POST['apip']);
    $apname = mysqli_real_escape_string($con, $_POST['apname']);

    $query = "UPDATE ap SET name='$name', email='$email', apip='$apip', apname='$apname' WHERE id='$student_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "AP Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "AP Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $apip = mysqli_real_escape_string($con, $_POST['apip']);
    $apname = mysqli_real_escape_string($con, $_POST['apname']);

    $query = "INSERT INTO ap (name,email,apip,apname) VALUES ('$name','$email','$apip','$apname')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "AP Created Successfully";
        header("Location: ap-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "AP Not Created";
        header("Location: ap-create.php");
        exit(0);
    }
}

?>