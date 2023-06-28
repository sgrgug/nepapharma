
<?php
error_reporting(0);
$conn = mysqli_connect("localhost","root","","nepapharma");
if(count($_POST)>0) {
$roll_no=$_POST[roll_no];
$result = mysqli_query($conn,"SELECT * FROM items");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> Retrive data</title>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
<table>
<tr>
<td>Name</td>
<td>Email</td>
<td>Roll No</td>

</tr>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
<td><?php echo $row["Name"]; ?></td>
<td><?php echo $row["Image"]; ?></td>
<td><?php echo $row["id"]; ?></td>
</tr>
<?php
$i++;
}
?>
</table>
</body>
</html>