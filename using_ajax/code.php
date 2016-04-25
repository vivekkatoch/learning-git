<?php

 $connection = mysqli_connect("localhost","root","admin123","test"); 
if(isset($_GET['submit'])){
 $name =$_GET['name'];
 $e_mail =$_GET['e_mail'];
 $city =$_GET['city'];
 $sql = "INSERT INTO info (id,name,e_mail,city)VALUES(' ','$name','$e_mail','$city')";
 $pass = mysqli_query($connection,$sql);
 table($connection);
}
 //delete data
if(isset($_GET['del'])){
  $id = $_GET['id'];
  $delete = "DELETE FROM info WHERE id = ". $id ."";
  $ro = mysqli_query($connection,$delete);
  table($connection);
}
//edit data
if(isset($_GET['edit'])){
  $id = $_GET['id'];
   $query1 = "SELECT * FROM info WHERE id = $id";
   $pass1 = mysqli_query($connection,$query1);
   echo '<table id = "table" style = "border:2px solid black";"box-shadow:0px 0px 3px  2px black" border= 1;>';
   echo '<tr>';
   while ($row = mysqli_fetch_array($pass1)) {
    echo "<td><input  type = 'text'value='".$row['id']."' id='newid'></td><td><input  type = 'text'value='".$row['name']."' id='newname'></td><td><input  type = 'text'value='".$row['e_mail']."'id='new_email'></td><td><input  type = 'text'value='".$row['city']."'id='newcity'></td><td><input  type = 'button'value='update' id='updatebtn'onclick='update_data()'><input  type = 'button'value='cancal'onclick='cancel()'id='cancel'></td>";
    echo "</tr>";
}
echo "</table>";

}
//update data
if(isset($_GET['up'])){
  $up_id =$_GET['id'];
  $up_name=$_GET['name'];
  $up_e_mail=$_GET['e_mail'];
  $up_city=$_GET['city'];
  $update = " UPDATE info SET name = '$up_name',e_mail = '$up_e_mail',city ='$up_city' WHERE id =$up_id";
  mysqli_query($connection,$update);
  table($connection);
}

//cancel data 
if(isset($_GET['cancel'])){
  table($connection); 
}

 // //view data
function table($connection){
  $query = "SELECT * FROM info";
  $pass = mysqli_query($connection,$query);
  echo '<table id = "table" style = "border:2px solid black";"box-shadow:0px 0px 3px  2px black" border= 1;>'	;   
  echo "<th>id</th>";
  echo "<th>name</th>";
  echo "<th>e_mail</th>";
  echo "<th>city</th>";
  echo "<th>edit & delete</th>";
    while ($row = mysqli_fetch_array($pass)) {
    $uid = $row['id'];
    echo "<tr id = $uid>";
    echo "<td>".$row['id']."</td>";	
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['e_mail']."</td>";
    echo "<td>".$row['city']."</td>";
    echo '<td><input type = "button" id = "edit" value = "edit" name = "edit"onclick="edit('.$uid.')"> <input type ="button" value = "delete" onclick="delete_data('.$uid.')"name="delete">
    </td>';
                       
    echo "</tr>";
  } 
  echo "</table>";
}
?>