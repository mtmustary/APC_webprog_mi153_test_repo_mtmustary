<?php
	include_once 'dbconfig.php';
	// delete condition
	if(isset($_GET['delete_id']))
		{
		$sql_query="DELETE FROM users WHERE user_id=".$_GET['delete_id'];
		mysqli_query($con,$sql_query);
		header("Location: $_SERVER[PHP_SELF]");
		}
	// delete condition
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>DBHITS</title>
			<script type="text/javascript">
				function edt_id(id)
					{
					window.location.href='edit_data.php?edit_id='+id;
					}
				function delete_id(id)
					{
					window.location.href='index.php?delete_id='+id;
					}
				</script>
			<style>
				label{
					font-family: simplifica;
					font-size: 48px;
				}
				
				table{
					font-family: simplifica;
					font-size: 23px;	
				}
				
				a:link{
					color: black;
					background-color: transparent;
					text-decoration: none;
					
				}
				
				a:hover{
					color: red;
					background-color: transparent;
					text-decoration: none;
				}
				
				th{
					padding:0 35px 0 35px;
				}
				
				tr{
					text-align: center;
				}
				
				.link{
					font-family: simplifica;
					font-size: 20px;
					text-align: right;
				}
				
			</style>
		</head>
		<body>
			<center>
			<div class="link">
				<a href="index.php">MAIN PAGE</a>
			</div>
			<label>MESSAGES ARE STORED HERE!</label>
			<br><br>
			
			<table align="center">
				<th>NAME</th>
				<th>NICKNAME</th>
				<th>EMAIL</th>
				<th>ADDRESS</th>
				<th>GENDER</th>
				<th>CELLPHONE NUMBER</th>
				<th>COMMENT</th>
				<th colspan="2">OPERATIONS</th>		
    
				<?php
					// WHAT'S INSIDE THE TABLE
					$sql_query="SELECT * FROM users";
					$result_set=mysqli_query($con, $sql_query);
					while($row=mysqli_fetch_row($result_set))
					{
				?>
					<tr>
					<td><?php echo $row[1]; ?></td>
					<td><?php echo $row[2]; ?></td>
					<td><?php echo $row[3]; ?></td>
					<td><?php echo $row[4]; ?></td>
					<td><?php echo $row[5]; ?></td>
					<td><?php echo $row[6]; ?></td>
					<td><?php echo $row[7]; ?></td>
					<td align="center"><a href="javascript:edt_id('<?php echo $row[0]; ?>')">EDIT</a></td>
					<td align="center"><a href="javascript:delete_id('<?php echo $row[0]; ?>')">DELETE</a></td>
					</tr>
				<?php
					}
				?>
			</table>
			</center>
		</body>
	</html>
	</html>