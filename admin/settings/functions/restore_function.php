<?php
function restore_archived_year($id){
    require_once "../../../config.php";
    $sql = "UPDATE academic_year SET archived=0 WHERE archived=1 && id='$id'";
    if($stmt = mysqli_prepare($conn, $sql)){
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            echo "Response.Write('<script language='javascript'>window.alert('Restored Successfully');window.location='../../../layout/admin.php';</script>');";
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}

if(isset($_POST['restoreID'])){
    restore_archived_year($_POST['restoreID']);
}
?>