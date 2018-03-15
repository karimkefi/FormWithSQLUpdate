<?php

$addDbAdultName = $_POST['formInputAdultName'];
$addDbAdultDOB = $_POST['formInputAdultDOB'];
$addDbAdultGender = $_POST['formAdultGender'];


$addDbChildName = $_POST['formInputChildName'];
$addDbchildDOB = $_POST['formInputChildDOB'];


$db = new PDO('mysql:host=127.0.0.1; dbname=exercise2', 'root');




//SQL adding information to the adults table

$query1 = $db->prepare("INSERT INTO `adults` (`name`,`DOB`, `gender`) VALUES (:name, :DOB, :gender);");

$query1->bindParam(':name', $addDbAdultName);
$query1->bindParam(':DOB', $addDbAdultDOB);
$query1->bindParam(':gender', $addDbAdultGender);

$query1->execute();
$lastAdultInsertId = $db->lastInsertId();
echo $lastAdultInsertId . "<br>";




//SQL adding information to the children table

$query2 = $db->prepare("INSERT INTO `children` (`name`,`DOB`) VALUES (:name, :DOB);");

$query2->bindParam(':name', $addDbChildName);
$query2->bindParam(':DOB', $addDbchildDOB);

$query2->execute();
$lastChildInsertId = $db->lastInsertId();
echo $lastChildInsertId . "<br>";




//SQL adding information to the children table

$query3 = $db->prepare("INSERT INTO `parent_of` (`adults_id`,`children_id`) VALUES (:AdultID, :ChildID);");

$query3->bindParam(':AdultID', $lastAdultInsertId);
$query3->bindParam(':ChildID', $lastChildInsertId);

if($query1 && $query2) {
    $query3->execute();
}



header("Location: addAdultForm.html");

?>


