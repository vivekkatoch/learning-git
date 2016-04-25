<?php


?>
<!DOCTYPE html>
<html>
<head>
 <script>
   var http;
   http = new XMLHttpRequest();
   function add_record(){
     http.onreadystatechange = function() {
       http.readystate == 4 & http.status == 200;
       document.getElementById("view").innerHTML = http.responseText;
     }
      var btn=document.getElementById("btn");
      var new_name=document.getElementById("name").value;
      var new_e_mail=document.getElementById("e_mail").value;
      var new_city=document.getElementById("city").value;
      var all = "?name=" +new_name;
      all += "&e_mail="+new_e_mail+"&city="+new_city+"&submit="+btn;
      http.open("GET","code.php"+all,true);
      http.send(null);
   }
   function delete_data(uid){
      http.onreadystatechange = function() {
       http.readystate == 4 & http.status == 200;
       document.getElementById("view").innerHTML = http.responseText;
     }
      var del = document.getElementById("delete");
      http.open("GET","code.php?id="+uid+"&del="+del,true);
      http.send(null);
   }

   function edit(uid) {
   	   http.onreadystatechange = function() {
       http.readystate == 4 & http.status == 200;
       document.getElementById(uid).innerHTML= http.responseText;
   }
       var edit = document.getElementById("edit");
       http.open("GET","code.php?id="+uid+"&edit="+edit,true);
       http.send();
   }
      //  var n_name = document.getElementById('name').value;
      //  //document.getElementById("view").innerHTML=name;
      //  var e_mail = document.getElementById("e_mail").value;
      //  var  city = document.getElementById("city").value;
      //  var all = "?name=" +name;
      // all += "&e_mail="+e_mail+"&city="+city;

   //     document.getElementById(uid).innerHTML = '<td><input type = "text"name = "name"></td><td><input type = "text"name="e_mail"></td><td><input type = "text"name="city"></td><td><input type = "text"></td><td><input type = "button" value="update"><input type = "button"value="cancel"onclick="cancel()"></td>';
   // }
   function cancel() {
     http.onreadystatechange = function() {
     	http.readystate == 4 & http.status == 200;
      document.getElementById("view").innerHTML = http.responseText;
      var cancel=document.getElementById("cancel");

     } 
    http.open("GET","code.php?cancel="+cancel,true);
    http.send(null);
   }
   function update_data() {
   	http.onreadystatechange = function() {
     http.readystate == 4 & http.status == 200;	
     
     document.getElementById("view").innerHTML = http.responseText;
 }
     var update = document.getElementById("updatebtn");
     var updated_id  = document.getElementById("newid").value;
     var updated_name = document.getElementById("newname").value;
     var updated_e_mail = document.getElementById("new_email").value;
     var updated_city = document.getElementById("newcity").value;
     
     var data = "?id="+updated_id;
      data += "&name=" +updated_name +"&e_mail="+updated_e_mail+"&city="+updated_city+"&up="+update;
     http.open("GET","code.php" + data,true);
     http.send(); 
   }
  </script> 
</head>
<body>
  <form action = "" method = "post">
    <input type = "textfield" name = "name" placeholder = "Enter name"id="name">
    <input type = "textfield" name = "e_mail" placeholder = "Enter e_mail"id="e_mail">
    <input type = "textfield" name = "city" placeholder = "Enter city"id="city">
    <input type = "button" value = "Add record" name = "submit" onclick ="add_record()" id="btn">
  </form>
  <div id ="view">

  <?php 
    $connection = mysqli_connect("localhost","root","admin123","test");
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
    	
    echo "<td ".$row['name']."</td>";
    echo "<td>".$row['e_mail']."</td>";
    echo "<td>".$row['city']."</td>";
    echo '<td><input type = "button" id = "edit" value = "edit" name = "edit"onclick="edit('.$uid.')"> <input type ="button" value = "delete" onclick="delete_data('.$uid.')"id="delete">
    </td>';                   
    echo "</tr>";
  } 
  echo "</table>";
   ?> 
  </div>
  </body>
</html>
