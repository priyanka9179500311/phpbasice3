<?php
	//class Declaration
	
	class Db{
		//1. property
		public $hostname='localhost';
		public $mysql_username='root';
		public $mysql_password='';
		public $database='phpbasics_ddb';
		public $con;
		
		
		//2. constructor
		public function __construct(){
			//echo 'hello from constructor';
			//1. DB Connection open
			$this->con = mysqli_connect($this->hostname,$this->mysql_username,$this->mysql_password,$this->database);
		}
		
		//3. method
		public function getContact(){
			//echo 'hello from method';
			//2. build the query
			$sql = "SELECT * FROM details_tbl";
			
			//3. execute the query
			$result = mysqli_query($this->con,$sql);
			
			//4. Display the result
			var_dump($result);
			
			$data = [];
			while ($row = mysqli_fetch_assoc($result)){
				$data[] = $row;
			}
			//5. DB connection closed
			mysqli_close($this->con);
			
			return $data;
			
		}
	}
	//create an object of the class
	$obj = new Db();
	//call the method
	$data = $obj->getContact();

	var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bootstrap 4 Example</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		
	</head>
	<body>

		<div class="container">
			<ul class="list-group">
				<?php
					foreach ($data as $d){
						//var_dump($d);
						echo '<li class="list-group-items">'.$d['fname'].' '.$d['lname'].' '.$d['mobno'].'</li>';
					}
				?>
			
			</ul>
			
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https	://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</body>
</html>