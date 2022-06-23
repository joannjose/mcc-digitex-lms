<?php
function update_active_year($id){
    require_once "../../../config.php";
    $sql = "UPDATE academic_year SET active=1 WHERE active=0 && id='$id'";
    if($stmt = mysqli_prepare($conn, $sql)){
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            //header("location: academic_year.php");
            $sql = "UPDATE academic_year SET active=0 WHERE active=1 && id!='$id'";
            if($stmt = mysqli_prepare($conn,$sql)){
                if(mysqli_stmt_execute($stmt)){
                    header("location: ../../../layout/admin.php");
                    exit();
                }
            }
    
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

function create_academic_year($name,$yearStart,$yearEnd,$semester){
    require_once "../../../config.php";
            // Prepare an insert statement
            $sql = "INSERT INTO academic_year (name, startYear, endYear, semester) VALUES (?, ?, ?, ?)"; 
            
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_startYear, $param_endYear, $param_semester);
                
                // Set parameters
                $param_name = $name;
                $param_startYear = $yearStart;
                $param_endYear = $yearEnd;
                $param_semester = $semester;
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Redirect to Academic Year page
                    header("location: ../../../layout/admin.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
    
}

function update_academic_year($id,$name,$yearStart,$yearEnd,$semester){
    require_once "../../../config.php";
    $sql = "UPDATE academic_year SET name='$name', startYear='$yearStart', endYear='$yearEnd', semester='$semester' WHERE id='$id'";

    if($stmt = mysqli_prepare($conn, $sql)){
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            echo "Response.Write('<script language='javascript'>window.alert('Update Successful');window.location='../../../layout/admin.php';</script>');";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

function delete_academic_year($id){
    require_once "../../../config.php";
    $sql = "UPDATE academic_year SET archived=1 WHERE archived=0 && id='$id'";
    if($stmt = mysqli_prepare($conn, $sql)){
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            echo "Response.Write('<script language='javascript'>window.alert('Deleted Successfully');window.location='../../../layout/admin.php';</script>');";
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if(isset($_POST['activeID'])){
    update_active_year($_POST['activeID']);
}

if(isset($_POST['startYear'],$_POST['endYear'],$_POST['sem'])){
    if($_POST['endYear']-$_POST['startYear']==1){
        $yearsem = $_POST['startYear']."-".$_POST['endYear']." ".$_POST['sem'];
        create_academic_year($yearsem,$_POST['startYear'],$_POST['endYear'],$_POST['sem']);
    }
    else{
        echo "Response.Write('<script language='javascript'>window.alert('Invalid Academic Year');window.location='../../../layout/admin.php';</script>');";
    }
}
/* else{
    echo "Response.Write('<script language='javascript'>window.alert('Required Fields Missing');window.location='../../../layout/admin.php';</script>');";
} */

if(isset($_POST['delID'])){
    delete_academic_year($_POST['delID']);
}

if(isset($_POST['editID'],$_POST['editStartYear'],$_POST['editEndYear'],$_POST['editSem'])){
    if($_POST['editEndYear']-$_POST['editStartYear']==1){
        $yearsem = $_POST['editStartYear']."-".$_POST['editEndYear']." ".$_POST['editSem'];
        //$year = $_POST['editStartYear']."-".$_POST['editEndYear'];
        update_academic_year($_POST['editID'],$yearsem,$_POST['editStartYear'],$_POST['editEndYear'],$_POST['editSem']);
    }
    else{
        echo "Response.Write('<script language='javascript'>window.alert('Invalid Academic Year');window.location='../../../layout/admin.php';</script>');";
    }
}else{
    echo "Response.Write('<script language='javascript'>window.alert('Required Fields Missing');window.location='../../../layout/admin.php';</script>');";
}
?>