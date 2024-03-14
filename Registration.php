<?php
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
$limit =5;
$page=isset($_GET['page']) ? $_GET['page'] : 1;
$start=($page-1) * $limit;
$result=$conn->query("SELECT * FROM users LIMIT $start, $limit");
$users=$result->fetch_all(MYSQLI_ASSOC);

$result1=$conn->query("SELECT count(id) as id FROM users");
$usercount=$result1->fetch_all(MYSQLI_ASSOC);
$total=$usercount[0]['id'];
$pages= ceil($total / $limit); 

$Previous = $page - 1;
$Next = $page + 1;
?>
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

//submit data to DB
// Sql query
$sql = "INSERT INTO `users` (`Name`, `FathersName`, `Phone.no`, `Email`, `Class`, `Gender`, `Note`, `DOB`, `Acc.CreatedOn`, `Status`, `Acc.CreatedBy`) 
                          VALUES ('$name','$fathername','$phoneno','$email','$class','$gender','$note','$DOB','$AccCreatedOn','$status','$createdby')";
$result = mysqli_query($conn, $sql);
if($result){
    echo "Your details has been added successfully";
}
else{
    echo "Your data not inserted successfully". mysqli_error($conn);
}
}
?>
  <div class="container mt-4">
  <h1> Details</h1>
  <form action="registeration.php" method="post">
    <div class="form-group">
      <label for="name" class="form-label"><span style="color:black;font-weight:bold"> Name</span></label>
      <input type="text" class="form-control" name="name" id="name" placeholder= "Name" required>
    </div>
    <div class="form-group">
      <label for="fathername" class="form-label"><span style="color:black;font-weight:bold">Father's Name</span></label>
      <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Father'sName"required>
    </div>
    <div class="form-group">
      <label for="phoneno" class="form-label"><span style="color:black;font-weight:bold">Phone.No</span></label>
      <input type="text" class="form-control" name="phoneno" id="phoneno" placeholder="Phone No." required>
    </div>
    <div class="form-group">
      <label for="email" class="form-label"><span style="color:black;font-weight:bold">Email:-</span></label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Email address" required>
    </div>
    <div class="form-group">
      <label for="class" class="form-label"><span style="color:black;font-weight:bold">Select Class</span></label>
      <select id="class" name="class" class="form-select" required>
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
    <label for="gender" class="form-label"><span style="color:black;font-weight:bold">Select Gender</span></label>
      <div name="gender" id="gender" required class="form-check">
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
         <label for="note" class="form-label"><span style="color:black;font-weight:bold">Note</span></label>
         <textarea class="form-control" name="note" id="note" rows="5" placeholder="Feedback" required></textarea>
        </div>
        <div class="form-group">
         <label for="DOB" class="form-label"><span style="color:black;font-weight:bold">Date of Birth</span></label>
         <input type="date" class="form-control" name="DOB" id="DOB" required>
        </div>
        <div class="form-group">
         <label for="Acc.CreatedOn" class="form-label"><span style="color:black;font-weight:bold">Account Created On</span></label>
         <input type="datetime-local" class="form-control" name="AccCreatedOn" id="AccCreatedOn" required>
        </div>
        <div class="form-group">
         <label for="status" class="form-label"><span style="color:black;font-weight:bold">Status</span></label>
         <select id="status" name="status" class="form-select" required>
          <option value="Select Status">Select Status</option>
          <option value="Active">Active</option>
          <option value="Inactive">Inactive</option>
         </select>
        </div>
        <div class="form-group">
         <label for="createdby" class="form-label"><span style="color:black;font-weight:bold">CreatedBy</span></label>
         <input type="text" class="form-control" name="createdby" id="createdby" required>
        </div>
        <div class="form-group">
        <div class="form-check">
         <input class="form-check-input" type="checkbox" id="termandcondition" required>
         <label class="form-check-label" for="gridCheck"><span style="color:black;font-weight:bold">Terms and Conditions</span></label>
        </div>
         <button type="submit" class="btn btn-primary">Save</button>
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
   ?>
<!--Table of DB data on web page-->
  <div class="container">
    <div class="row">
	<div class="form-group">
	<nav aria-label="Page navigation">
					<ul class="pagination">
          <li class="page-item"><a class="page-link" href="registeration.php?page=<?= $Previous; ?>" aria-label="previous">Previous</span></a></li>
				    <?php for($a = 1; $a<= $pages; $a++) : ?>
				    	<li class="page-item"><a class="page-link" href="registeration.php?page=<?= $a; ?>"><?= $a; ?></a></li>
				    <?php endfor; ?>
            <li class="page-item"><a class="page-link" href="registeration.php?page=<?= $Next; ?>" aria-label="Next">Next</a></li>
            <div>
              <form action="" class="form-group">
                <input type="text" class="form-control" type="search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Serch">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
				  </ul>
				</nav>
		  </div>
    </div>
  <div class="row">
  <div class="form-group">
   <table class="table">
   <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">FathersName</th>
      <th scope="col">Phone.no</th>
      <th scope="col">Email</th>
      <th scope="col">Class</th>
      <th scope="col">Gender</th>
      <th scope="col">Note</th>
      <th scope="col">DOB</th>
      <th scope="col">Acc.CreatedOn</th>
      <th scope="col">Status</th>
      <th scope="col">Acc.CreatedBy</th>
      <th colspan="2" scope="col">Actions</th>
    </tr>
   </thead>
  </div>
  </div>
 <tbody>
 <?php
   $conn= mysqli_connect("localhost","root","","records");
    if(isset($_GET['search'])){
      $filtervalue = $_GET['search'];
      $sql ="SELECT * FROM `users` WHERE CONCAT(ID,Name,FathersName,Email,Class,Gender,Note,DOB,Status) LIKE '%$filtervalue%' ";
      $sql_run = mysqli_query($conn,$sql);
      if(mysqli_num_rows($sql_run) > 0){
      foreach($sql_run as $item){
  ?>
        <tr>
         <td><?=$item['ID']?></td>
         <td><?=$item['Name']?></td>
         <td><?=$item['FathersName']?></td>
         <td><?=$item['Phone.no']?></td>
         <td><?=$item['Email']?></td>
         <td><?=$item['Class']?></td>
         <td><?=$item['Gender']?></td>
         <td><?=$item['Note']?></td>
         <td><?=$item['DOB']?></td>
         <td><?=$item['Acc.CreatedOn']?></td>
         <td><?=$item['Status']?></td>
         <td><?=$item['Acc.CreatedBy']?></td>
         <td>
         <a href='edit.php?id=<?=$item['ID']?>' class='btn btn-primary'>Edit</a> 
         </td>
         <td>
         <a href='delete.php?id=<?=$item['ID']?>' class='btn btn-danger'>Delete</a> 
         </td>
        </tr>
        <?php 
      }
      }else{
        ?>
        <tr>
         <td colspan="13">NO record found</td>
        </tr>
        <?php
      }
    }
 ?>

 <?php foreach($users as $user) : ?>
    <tr>
      <td><?=$user['ID']?></td>
      <td><?=$user['Name']?></td>
      <td><?=$user['FathersName']?></td>
      <td><?=$user['Phone.no']?></td>
      <td><?=$user['Email']?></td>
      <td><?=$user['Class']?></td>
      <td><?=$user['Gender']?></td>
      <td><?=$user['Note']?></td>
      <td><?=$user['DOB']?></td>
      <td><?=$user['Acc.CreatedOn']?></td>
      <td><?=$user['Status']?></td>
      <td><?=$user['Acc.CreatedBy']?></td>
      <td>
      <a href='edit.php?id=<?=$user['ID']?>' class='btn btn-primary'>Edit</a> 
      </td>
      <td>
      <a href='delete.php?id=<?=$user['ID']?>' class='btn btn-danger'>Delete</a> 
      </td>
    </tr>
  <?php endforeach; ?>

  <?php
  
    // $sql = "SELECT * FROM `users`";
    // $result = mysqli_query($conn, $sql);
    //   while($row = mysqli_fetch_assoc($result)){
    //         echo "<tr>
    //        <th scope='row'>" . $row['ID'] . "</th>
    //         <td>" . $row['Name'] . "</td>
    //         <td>" . $row['FathersName'] . "</td>
    //         <td>" . $row['Phone.no'] . "</td>
    //         <td>" . $row['Email'] . "</td>
    //         <td>" . $row['Class'] . "</td>
    //         <td>" . $row['Gender'] . "</td>
    //         <td>" . $row['Note'] . "</td>
    //         <td>" . $row['DOB'] . "</td>
    //         <td>" . $row['Acc.CreatedOn'] . "</td>
    //         <td>" . $row['Status'] . "</td>
    //         <td>" . $row['Acc.CreatedBy'] . "</td>
    //         <td>
    //          <a href='edit.php?id=" . $row['ID'] ."' class='btn btn-primary'>Edit</a> 
    //         </td>
    //         <td>
    //          <a href='delete.php?id=" . $row['ID'] ."' class='btn btn-danger'>Delete</a> 
    //         </td>
    //       </tr>";
    //     } 
        
  ?>
 </tbody>
</table>
  </div>
  <!---<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item disabled">
      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>---->
    <!--ptional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
