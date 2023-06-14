<?php
	include"database.php";
	session_start();
	if(isset($_POST["allStudents"])){
		unset($_POST['allStudents']);
		foreach($_POST as $key => $value){
			
			$searchQuery = "SELECT * FROM mark WHERE REGNO = '" . filter_var($key, FILTER_SANITIZE_STRING) . "' AND SUB = '" . filter_var($_GET['sub'], FILTER_SANITIZE_STRING) . "' and TERM = '" . $_GET['term'] . "'";
			$found = $db->query($searchQuery);
			$found = $found->num_rows;
			$sq = "INSERT INTO mark(REGNO, SUB, MARK,TERM,CLASS) VALUE('{$key}', '{$_GET['sub']}', '{$value}', '{$_GET['term']}', '{$_GET['class']}')";
			
			if($found){
				$sq = "UPDATE mark SET MARK = '" . filter_var($value, FILTER_SANITIZE_STRING) . "' WHERE REGNO = '" . filter_var($key, FILTER_SANITIZE_STRING) . "' AND SUB = '" . filter_var($_GET['sub'], FILTER_SANITIZE_STRING) . "'";
			}

			$result = $db->query($sq);
			if($result){
				echo '<script>alert("Data inserted");</script>';
			}
		}
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
        <div class="content" style="float:none">
					
               
                    <h3 style="display:inline"> Student Details</h3>
                    <input type="button" value="Back" style ="margin-right: 740px; font-family: roboto; font-size:15px; border: 2px solid black;border-radius:10%; padding: 2px; float:right; font-weight:bold; color: #663b95;" onClick="history.back(-1)"/>

                

	<form method = "POST">	
    <table border="1px" >
						<tr>
							<th>Roll No</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Class</th>
                            <th>Section</th>
                            <th>Insert Marks</th>

                            

							
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
									$s="select * from mark where REGNO = '".$r["RNO"]."' and sub = '" . $_GET['sub'] . "' and TERM = '" . $_GET['term'] . "'";
									$restt=$db->query($s);
									$marks = $restt->fetch_assoc();
									$mark = $restt->num_rows == 0 ? 0 : $marks['MARK'];

									// echo $marks["MARK"]; 


									$i++;
									echo"
										<tr>
											
											<td>{$r["RNO"]}</td>
											<td>{$r["NAME"]}</td>
											<td>{$r["GEN"]}</td>
											<td>{$r["SCLASS"]}</td>
											<td>{$r["SSEC"]}</td>";
											
											// if(!isset($marks["MARK"])){
											// 	echo "<td><input name = '{$r["RNO"]}' type = 'text'> </td>";
											// }
											// else{
											// 	echo "<td><input value = '{$marks["MARK"]}' name = '{$r["RNO"]}' type = 'text'> </td>";

											// }
											echo "<td><input value = '". $mark . "' name = '{$r["RNO"]}' type = 'text'> </td>";


											

									echo "</tr>";
									
									
									
									// ";
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
		<input style="margin-left:5%" name ="allStudents" type = "submit" value = "Submit"> 
	</form>
        <?php include"footer.php";?>
</body>
</html>