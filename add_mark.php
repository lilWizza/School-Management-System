<?php
	include"database.php";
	session_start();
	if(!isset($_SESSION["TID"]))
	{
		echo"<script>window.open('index.php?mes=Access Denied...','_self');</script>";
		
	}	
	
	
	$sql="SELECT * FROM staff WHERE TID={$_SESSION["TID"]}";
		$res=$db->query($sql);

		if($res->num_rows>0)
		{
			$row=$res->fetch_assoc();
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
				<div class="content">
				
					<h3>Add Marks</h3><br>
				
					
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
							<th>Terms</th>
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
									?>
									<tr>

										<td><?php echo $i ?></td>
										<td><?php echo $r["CLA"] ?></td>
										<td><?php echo $r["SEC"] ?></td>
										<td><?php echo $r["SUB"] ?></td>
										<td>
											<select id='<?php echo 'term' .$i ?>'>
											<option value='I-Term'>I-Term</option>
											<option value='II-Term'>II-Term</option>
											<option value='III-Term'>III-Term</option>
											</select>
										<td><p style="cursor: pointer; color: blue" onClick="hehe('<?php echo $r['CLA'] ?>', '<?php echo $r['SUB'] ?>','<?php echo 'term' .$i ?>')"> View Students </p> </td>
									</tr>
									<?php
									
								}
							}
						
						
						
						?>
						
						</table>
					</div>
				</div>
		<?php include"footer.php";?>
		<script>
			let hehe = (cla, sub, termId) =>{
				term = document.querySelector(`#${termId}`).value;
				location.href=`studentdetailsok.php?class=${cla}&sub=${sub}&term=${term}`;
			}
		</script>
	</body>
</html>