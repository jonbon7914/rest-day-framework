<?php 

include("connection/transact.php");

$transact = new Transact();

// $qry = $transact->insert("INSERT INTO student (ID,name,last_ame,email) VALUES ( :id, :name, :lastname, :email)", array(':id' => 0 , ':name' => 'Saquib' , ':lastname' => 'Rizwan' , ':email' => 'saquib.rizwan@cloudways.com'));
// echo $qry;

// $qry = $transact->select("select * from student");

// foreach ($qry as $row) {
//     echo " ID: ".$row['ID'] . "<br>";
//     echo " Name: ".$row['name'] . "<br>";
//     echo " Last Name: ".$row['last_ame'] . "<br>";
//     echo " Email: ".$row['email'] . "<br>";
//     }

$qry = $transact->select("select * from role_information limit 1");
print_r($qry);
foreach ($qry as $value) {

	echo $value['role_id'];
	
}

// foreach ($qry as $row) {
//     echo " ID: ".$row['description'] . "<br>";

//     }

// $qry = $transact->update("UPDATE `student` SET `name`= 'yourname' , `last_ame` = 'your lastname' , `email` = 'your email' WHERE `id` = 1");

// echo $qry;

// $qry = $transact->delete("DELETE FROM `student` WHERE `id` = 2");

// echo $qry;

?>