  <?php
  $u_id = $_GET["u_id"];
  
  $connect = mysqli_connect("localhost","root","");
  $db_con = mysqli_select_db($connect, "front");
 
  $sql="select * from members where u_id='$u_id'";
  $result=mysqli_query($connect, $sql);
  $num_match=mysqli_num_rows($result);

  if(!$num_match){
	echo "N";
  } else{
	 echo "Y";
  }
?>