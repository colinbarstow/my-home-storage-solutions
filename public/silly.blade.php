<?php
/*
 * All of this section is defining the details required to connect to the database
 * if you use pure php you need to call this everytime you want to get to the database
 * in laravel we store the details in .env file and that's it
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";
 */

// here we Create the connection -> again in laravel this is all handled however pure php we need
// to do this every time
//$conn = new mysqli($servername, $username, $password, $dbname);
// Now we have to check the conenction, make sure we actually got conencted, laravel handles all of this shit
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

/*
 * Now we get what we want from the database and instantiate an empty array
 

$sql = "SELECT id, title, description FROM Products";
$result = $conn->query($sql);
$results = array();

*/
/*
 * Now we loop through the results as push them into an array ready to use within the document

if ($result->num_rows > 0) {

    // output data of each row
    while($row = $result->fetch_assoc()) {
        array_push($array, "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]);
    }
}
$conn->close();
?>
 */

<html>
<body>
    <div class="row">
            @foreach($results as $result)
                <div class='col-lg-4'>
                    <span>{{ $result->title }}</span>
                </div>
            @endforeach

    </div>
</body>
</html>
