<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('teacher_login.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title>ASMT PROJECT</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<?php include"navbar.php";?><br>
	
			<div id="section">
				<?php include"sidebar.php";?><br>
					<h3 class="text">Welcome <?php echo $_SESSION["TNAME"]; ?></h3><br><hr><br>
			
					
					</div>
					<div class="rbox1">
					<h3> Details</h3><br>
						<?php
						if(isset($_GET["mes"]))
						{
							echo"<div class='error'>{$_GET["mes"]}</div>";	
						}
					
					?>
					<table border="1px" >
						<tr>
							<th>S.No</th>
							<th>Class Name</th>
							<th>Section</th>
							<th>Subject</th>
							<th>Students</th>
							
						</tr>
						<?php
							$s="select * from hclass where TID = {$_SESSION["TID"]}";
							$res=$db->query($s);
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
									<tr>
										<td>{$i}</td>
										<td>{$r["CLA"]}</td>
										<td>{$r["SEC"]}</td>
										<td>{$r["SUB"]}</td>
										<td><a href='studentdetails.php?class={$r["CLA"]}'> View Students </a> </td>
									
									</tr>
									
									";
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
			</div>
	
				<?php include"footer.php";?>
	</body>
</html>