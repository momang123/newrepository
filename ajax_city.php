<?php
// Establish Connection with MYSQL
require_once('Connections/PMS.php');
// Establish Connection with MYSQL
mysqli_select_db($PMS, "pms");
if($_POST['CityName'])
{
$id=$_POST['CityName'];
$sql=mysqli_query($PMS, "select * from area_master where CityName='$id' ");
echo '<option selected="selected">--Select Area--</option>';
while($row=mysqli_fetch_array($sql))
{
echo '<option value="'.$row['AreaName'].'">'.$row['AreaName'].'</option>';
}
}

?>
