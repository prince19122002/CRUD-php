<html>
  <head>
      <!--Required meta tags-->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!--Bootstrap CSS,js,jquery-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="//cdn.datatables.net/2.0.1/css/dataTables.dataTables.min.css">
  </head>
<body>
<?php
   if($_SERVER['REQUEST_METHOD'] == 'POST'){
     $name = $_POST['name'];
     $fathername = $_POST['fathername'];
     $phoneno = $_POST['phoneno'];
     $email = $_POST['email'];
     $class = $_POST['class'];
     $gender = $_POST['gender'];
     $note = $_POST['note'];
     $DOB = $_POST['DOB'];
     $AccCreatedOn = $_POST['AccCreatedOn'];
     $status = $_POST['status'];
     $createdby = $_POST['createdby'];
// Connecting to the DB
$servername = "localhost";
$username = "root";
$password = "";
$database = "records";
// Creating a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// if connection was not successful
if (!$conn){
    die("Failed to connect". mysqli_connect_error());
}else{
    echo "Connection successful";
}
//submit data to DB
// Sql query
$sql = "INSERT INTO `users` (`name`, `fathername`, `phoneno`, `email`, `class`, `gender`, `note`, `DOB`, `AccCreatedOn`, `status`, `CreatedBy`)
                          VALUES ('$name','$fathername','$phoneno','$email','$class','$gender','$note','$DOB','$AccCreatedOn','$status','$createdby')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Successfully data inserted";
}
else{
    echo "Your data  not inserted successfully ". mysqli_error($conn);
}
}
?>
  <div class="container mt-4">
  <h1> Details</h1>
<form action="registration.php" method="post">
    <div class="form-group">
      <label for="name" class="form-label">Student Name</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="Enter your Name">
    </div>
    <div class="form-group">
      <label for="fathername" class="form-label">Father Name</label>
      <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Enter your Father'sName">
    </div>
    <div class="form-group">
      <label for="phoneno" class="form-label">Phone.No</label>
      <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Enter your Phone No.">
    </div>
    <div class="form-group">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Enter your Email">
    </div>
    <div class="form-group">
      <label for="class" class="form-label">Select Class</label>
      <select id="class" name="class" class="form-select">
        <option value="Select Class">Select Class</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
        <option value="5th">5th</option>
        <option value="6th">6th</option>
        <option value="7th">7th</option>
        <option value="8th">8th</option>
        <option value="9th">9th</option>
        <option value="10th">10th</option>
        <option value="11th">11th</option>
        <option value="12th">12th</option>
      </select>
    </div>
    <label for="gender" class="form-label">Select Gender</label>
      <div name="gender" id="gender" class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male">
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="other" value="Other">
          <label class="form-check-label" for="gridRadios3">
          Other
          </label>
        </div>
        <div class="form-group">
         <label for="note" class="form-label">Note</label>
         <textarea class="form-control" name="note" id="note" rows="5" placeholder="Add your Note Here"></textarea>
        </div>
        <div class="form-group">
         <label for="DOB" class="form-label">Date of Birth</label>
         <input type="date" class="form-control" name="DOB" id="DOB">
        </div>
        <div class="form-group">
         <label for="Acc.CreatedOn" class="form-label">Account Created On</label>
         <input type="datetime-local" class="form-control" name="AccCreatedOn" id="AccCreatedOn">
        </div>
        <div class="form-group">
         <label for="status" class="form-label">Status</label>
         <select id="status" name="status" class="form-select">
          <option value="Select Status">Select Status</option>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
         </select>
        </div>
        <div class="cform-group">
         <label for="createdby" class="form-label">CreatedBy</label>
         <input type="text" class="form-control" name="createdby" id="createdby">
        </div>
        <div class="form-group">
        <div class="form-check">
         <input class="form-check-input" type="checkbox" id="termandcondition">
         <label class="form-check-label" for="gridCheck">Terms and Conditions</label>
        </div>
         <button type="submit" class="btn btn-primary">Submit</button>
        </div>

</form>
   <?php
   // Sql query
     $sql = "SELECT * FROM `users`";
     $result = mysqli_query($conn, $sql);
   // Find the number of records returned
     $num = mysqli_num_rows($result);
     echo "<span style='color:black;font-weight:bold'>Total $num Datas are found in DB.</span>";
     echo "<br>";
     /*
      // Display the data returned by the sql query from DB
       while($row = mysqli_fetch_assoc($result)){
        echo $row['ID'] . $row['Name'] . $row['FathersName'] . $row['Phone.no'] . $row['Email'] . $row['Class'] . $row['Gender'] . $row['Note'] . $row['DOB'] . $row['Acc.CreatedOn'] . $row['Status'] . $row['Acc.CreatedBy'];
         echo "<br>";
      }
     */
   ?>
<!--Table of DB data on web page-->
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">FatherName</th>
      <th scope="col">Phone.no</th>
      <th scope="col">Email</th>
      <th scope="col">Class</th>
      <th scope="col">Gender</th>
      <th scope="col">Note</th>
      <th scope="col">DOB</th>
      <th scope="col">Acc.CreatedOn</th>
      <th scope="col">Status</th>
      <th scope="col">Acc.CreatedBy</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
 <tbody>
  <?php
    $sql = "SELECT * FROM `users`";
    $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
           <th scope='row'>" . $row['ID'] . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['fathername'] . "</td>
            <td>" . $row['phoneno'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['class'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['note'] . "</td>
            <td>" . $row['DOB'] . "</td>
            <td>" . $row['AccCreatedOn'] . "</td>
            <td>" . $row['status'] . "</td>
            <td>" . $row['createdby'] . "</td>
            <td>
             <a href='edit.php?id=" . $row['ID'] ."' class='btn btn-primary'>Edit</a>
            </td>
            <td>
             <a href='delete.php?id=" . $row['ID'] ."' class='btn btn-danger'>Delete</a>
            </td>
          </tr>";
        }
        
  ?>
 </tbody>
</table>
  </div>
    <!--ptional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>