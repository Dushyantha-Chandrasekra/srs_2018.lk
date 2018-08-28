<?php require_once("includes/header1.php") ?>
<?php// require_once("includes/header2.php") ?>
<?php require_once("includes/connection.php"); ?>

<!--Write here-->
<tr>
<td>Owner</td>
<td>
<select name="owner">
<?php 

$sql = mysqli_query($connection, "SELECT first_name FROM users");

while ($row = $sql->fetch_assoc()){

?>
<option value="owner1"><?php echo $row['first_name']; ?></option>

<?php
// close while loop 
}
?>
</select>
</td>
</tr>






<?php require_once("includes/footer.php") ?>