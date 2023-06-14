<?php
	include"database.php";
	session_start();
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
        <div class="content">
					
               
                    <h3 style="display:inline"> Student Details</h3>
                    <input type="button" value="Back" style ="margin-right: 740px; font-family: roboto; font-size:15px; border: 2px solid black;border-radius:10%; padding: 2px; float:right; font-weight:bold; color: #663b95;" onClick="history.back(-1)"/>

                

		
    <table border="1px" >
						<tr>
							<th>Roll No</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Class</th>
                            <th>Section</th>
                            <th>Subjects</th>
                            <th>Marks</th>

                            

							
						</tr>
						<?php
                            $class = $_GET["class"];
                            
                            
							$s="select * from student where SCLASS = '$class'";
							$res=$db->query($s);
                            
							if($res->num_rows>0)
							{
								$i=0;
								while($r=$res->fetch_assoc())
								{
									$i++;
									echo"
										<tr>
											
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}"." {$r["FNAME"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td>{$r["SSEC"]}</td>

										</tr>
									
									
									
									";
								}
							}
							else
							{
								echo "No Record Found";
							}
						
						?>
						
					</table>
                    </div>
        </div>
        <?php include"footer.php";?>
</body>
</html>