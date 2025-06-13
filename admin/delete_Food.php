<?php

include('./session_manager.php');

if(!isset($login_session)){
header('Location: ./managerlogin.php'); 
}

$cheks = implode("','", $_POST['checkbox']);
$sql = "UPDATE FOOD SET `options` = 'DISABLE' WHERE F_ID in ('$cheks')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('Location: deletefood_Items.php');
$conn->close();


?>