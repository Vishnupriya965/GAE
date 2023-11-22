<?php
//We need the connect to database function.
include("connection.php");

//Get a connection to the database. The way we are calling it recycles already existing connections.
$conn = connectToDatabase();

//Get the query entered by the user in the query box. 

$query = $_POST["queryBox"];






if ($conn->multi_query($query)) {
	echo "<style>" . "table, th, td {" . "border: 1px solid black;" . "border-collapse: collapse;" . "th, td {" . 
		"padding: 15px;" . "}" . "</style>";
	do {
		echo "<table style=\"width:100%\">"; //Open an html table
		if ($result = $conn->store_result()) {
			//Fetch all of the fields (corresponds to "columns") objects as an array
			$fields = $result->fetch_fields();
			echo "<tr>"; //Begin creating a row for the column headers
			//Iterate over the fields array. 
			foreach ($fields as &$field){
				
			
				switch($field->type){
					case '254':
						$fieldtype = 'char';
						break;
					case '3':
						$fieldtype ='int';
						break;
					case '10':
						$fieldtype = 'date';
						break;
					case '4':
						$fieldtype = 'float';
						break;
				}

				

				echo "<th>" . $field->name . " (" . $fieldtype. ")</th>";
			}
			echo "</tr>"; 

			//Print out the actual table data. Fetch each table row.
			while ($row = $result->fetch_row()) {
				echo "<tr>"; //Begin creating a row for table data as opposed to header.
				foreach ($row as &$rowData){
					echo "<td>" . $rowData ."</td>";
				}
				echo "</tr>"; //Finished a row
			}
			$result->free(); 
		}
		echo "</table>"; //Close the html table	
		/* print divider */
		if ($conn->more_results()) {
			echo "<br /> <br />"; //Print new lines after this query result
		}
		else{
			break; //Done looping
		}
	} while ($conn -> next_result());
}
else {//An error occurred
	die("Error running your query."  . $conn->error);		
}
?>