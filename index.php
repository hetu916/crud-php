<?php
include'header.php';
?>

    <h3 class="p-4">All Records</h3>
<?php
$conn=mysqli_connect("localhost","root","","crud") or die("conn failed");
$sql="SELECT* FROM student JOIN studentclass WHERE student.sclass=studentclass.cid";
$result=mysqli_query($conn,$sql)or die("unsussesfull");
if(mysqli_num_rows($result)>0){

?>
<!-- </div> -->
<table class="table container"cellpadding="7px">
  <thead class="table-primary">
    <tr>
      <th scope="col ">ID</th>
      <th scope="col">NAME</th>
      <th scope="col">ADDRESS</th>
      <th scope="col">CLASS</th>
      <th scope="col">PHONE</th>
      <th scope="col">ACTION</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
while ($row=mysqli_fetch_assoc($result)) {
   

    ?>
    <tr>
      <th scope="row"><?php echo $row['sid'] ;  ?></th>
      <td><?php echo $row['sname'] ;  ?></td>
      <td><?php echo $row['saddress'] ;  ?></td>
      <td><?php echo $row['cname'] ;  ?></td>
      <td><?php echo $row['sphone'] ;  ?></td>
      <td><a  href='edit.php?id=<?php echo $row['sid'] ;?>' type="button" class="btn btn-primary">Edite</a></td>
      <td><a  href='delete-inline.php?id=<?php echo $row['sid'] ;?>' type="button" class="btn btn-primary">Delete</a></td>
    </tr>
   <?php
}
?>
  </tbody>
</table> 
<?php
}else{
    echo"no record found";
}
mysqli_close($conn);
?>
</body>
</html>