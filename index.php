<?php
$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=personal_data", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; 
    // echo "<br>";

    // foreach ($conn->query('SELECT * FROM personal_data') as $row) {
    // 	// echo $row['id'] . ' ' . $row['first_name'] . '<br>';
    // 	// echo $row[0].' '.$row[1].' '.$row[2].' '.$row[3].' '.$row[4].'<br>';
    // 	}
    }
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery-3.3.1.min.js" charset="utf-8"></script>
    <!-- <link rel="stylesheet" href="bootstrap.min.css"> -->
    <link rel="stylesheet" css" href="mystyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<title>Contact List</title>
</head>

<header>
    <h1 class="shadow">C O N T A C T</h1>
</header>

<body>
	<div class="container">
	    <div class="form-group">
	        <input type="text" class="form-control" placeholder="search" id="searchBar">
	        <button type="button" class="btn btn-primary" id="searchBtn">Search</button>
	        <input type="checkbox" id="advSearchCheckBox"> Advance Search
	    </div>
	
	    <div class="form-check" id="advCheckBox" style="display: none">
	        <input type="checkbox" name="name" id="checkBoxName"> First Name &nbsp;&nbsp;
	        <input type="checkbox" name="name" id="checkBoxName"> Last Name &nbsp;&nbsp;
	        <input type="checkbox" name="gender" id="checkBoxGender"> Gender &nbsp;&nbsp;
	        <input type="checkbox" name="email" id="checkBoxEmail"> E-mail
	        <br>
	        <br>
	    </div>

	</div>
	    <!-- Table -->
	<div class="container" style="margin-left: 13%">
	    <div class="row">
	        <table class="table table-hover">
	            <thead>
	            <tr>
	                <th scope="col">No.</th>
	                <th scope="col">First Name</th>
	                <th scope="col">Last Name</th>
	                <th scope="col">Gender</th>
	                <th scope="col">E-mail</th>
	            </tr>
	            </thead>
	            <tbody class="table-light" id="table">
	            	<tr>
	            		<?php
	            		foreach ($conn->query('SELECT * FROM personal_data') as $row) {
	            			echo '<tr>
	            			<td>'. $row['id'] . '</td>
	            			<td>'. $row['first_name'] . '</td>
	            			<td>'. $row['last_name'] . '</td>
	            			<td>'. $row['gender'] . '</td>
	            			<td>'. $row['email'] . '</td>
	            			</tr>';
	            		}
	            		?>
	            	</tr>
	            </tbody>
	        </table>
	    </div>
	</div>
</body>

<footer>
<div style="margin-left: 41.5%;">
  <ul class="pagination">
    <li class="page-item disabled">
      <a class="page-link" href="#">&laquo;</a>
    </li>
    <li class="page-item active">
      <a class="page-link" href="#">1</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">2</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">3</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">4</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">5</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">&raquo;</a>
    </li>
  </ul>
</div>

    Collect data from <a href="https://mockaroo.com/schemas/new">mockaroo</a><br>
    Create by Nanthicha Kritveeranant 5810450768
</footer>
</html>

<script>
    var status = false;

    $(document).ready(function () {
        //search
        // $('#searchBar').on('keypress', function (e) {
        //     if (e.which === 13) {
        //         $('#table').text('')
        //         let val = $(this).val()
        //         val = val.toLowerCase()
        //         searchData(val)
        //     }
        // })

        // $('#searchBtn').on('click', function () {
        //     $('#table').text('')
        //     let val = $('#searchBar').val()
        //     val = val.toLowerCase()
        //     searchData(val)
        // })

        //advance search
        $('#advSearchCheckBox').on('click', function () {
            if ($(this).is(':checked')) {
                status = true
                $('#advCheckBox').show()
            } else {
                status = false
                $('#advCheckBox input:checked').prop('checked', false)
                $('#advCheckBox').hide()
            }
        })
    })
</script>