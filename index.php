<!DOCTYPE html>
<html>
	<head>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
		<script type="text/javascript" src="showTable.js"></script>
		<title>eBASE Developer Application Test</title>
		<style> <!-- Simple CSS settings make the table more attractive -->
			* {
				margin: 0;
				padding: 0;
				box-sizing: border-box;
				-webkit-box-sizing: border-box;
				-moz-box-sizing: border-box;
				-webkit-font-smoothing: antialiased;
				-moz-font-smoothing: antialiased;
				-o-font-smoothing: antialiased;
				font-smoothing: antialiased;
				text-rendering: optimizeLegibility;
			}
			#people {
				font-family:"Open Sans", Helvetica, Arial, sans-serif;
				border-collapse: collapse;
				width: 75%;
				text-align: center;
				margin: 0 auto;
				margin-top: 50px;
			}
			#people td, #people th {
				border: 1px solid #DDD;
				padding: 10px;
			}
			#people tr:nth-child(even){background-color: #e7e7e7;}
			#people th {
				padding-top: 10px;
				padding-bottom: 10px;
				text-align: center;
				background-color: #1A8CCB;
				color: #F96;
			}
			#people button {
				cursor:pointer;
				width:75%;
				border:none;
				border-radius: 8px;
				background: #1A8CCB;
				color: #FFF;
				margin: 0 0 5px;
				padding: 10px;
				font-size: 15px;
			}
			#people button:hover {
				background: #09C;
				-webkit-transition:background 0.3s ease-in-out;
				-moz-transition:background 0.3s ease-in-out;
				transition:background-color 0.3s ease-in-out;
			}
			#people button:active { box-shadow:inset 0 1px 3px rgba(0, 0, 0, 0.5); }
			
		</style>
	</head>
	<body>
		<?php
  			$people = array(
			array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
			array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
			array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
			array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
			array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
			);
		?>
			
		<table id ='people'>
			<thead>
				<tr>
					<th>ID</th><th>First Name</th><th>Last Name</th><th>E-Mail</th><th></th>
				</tr>
			</thead>
			<tbody>
				<script>
					var people = <?php echo json_encode($people); //JSON encode the provided table and pass to javascript?>;
					var peopleTable = "";
					//Iterate through elements and build table
					$.each(people, function(index, row) { 
						peopleTable += "<tr>";
						$.each(row, function(key, value) {
							peopleTable += "<td>" + value + "</td>";
						});
						peopleTable += "<td><button class='show-info'>Show Info</button></td>";
						peopleTable += "</tr>";
					});
					
					//Output table
					document.write(peopleTable);
					
					//Output info in alert window when button is clicked
					$(".show-info").click(function() {
						var info = "Name: " + $(this).closest("tr").find("td:nth-child(2)").text() + " " + $(this).closest("tr").find("td:nth-child(3)").text() + "\nEmail: " + 
						$(this).closest("tr").find("td:nth-child(4)").text();
						
						alert(info);
					});
				</script>	
			</tbody>
		</table>		
	</body>
</html>
