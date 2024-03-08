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
  <section>
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
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
               echo "Connection was successful";
              }
              $sql = "SELECT * FROM `users` WHERE ID =" .$_GET['id'];
              //print_r($_GET);
              if($result = $conn ->query($sql)) {
                  while ($row = $result -> fetch_assoc()) {
                    $name = $row['Name'];
                    $fathername = $row['FathersName'];
                    $phoneno = $row['Phone.no'];
                    $email = $row['Email'];
                    $class = $row['Class'];
                    $gender = $row['Gender'];
                    $note = $row['Note'];
                    $DOB = $row['DOB'];
                    $AccCreatedOn = $row['Acc.CreatedOn'];
                    $status = $row['Status'];
                    $createdby = $row['Acc.CreatedBy'];
          ?>
  <form action="edit.php?id=<?php echo $row['ID']; ?>" method="post">
    <div class="form-group">
      <label for="ID" class="form-label">ID</label>
      <input type="integer" class="form-control" name="ID" placeholder="Enter  ID" value="<?php echo $row['ID'] ?>">
    </div>
    <div class="form-group">
      <label for="name" class="form-label">Student Name</label>
      <input type="text" class="form-control" name="name" placeholder="Enter your Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
      <label for="fathername" class="form-label">Father's Name</label>
      <input type="text" class="form-control" name="fathername" placeholder=" Father'sName" value="<?php echo $fathername ?>">
    </div>
    <div class="form-group">
      <label for="phoneno" class="form-label">Phone.No</label>
      <input type="text" class="form-control" name="phoneno" placeholder=" Phone No." value="<?php echo $phoneno ?>">
    </div>
    <div class="form-group">
      <label for="email" class="form-label">Email</label>
      <input type="text" class="form-control" name="email" placeholder="Enter your Email" value="<?php echo $email ?>">
    </div>
    <div class="form-group">
      <label for="class" class="form-label">Select Class</label>
      <select class="form-select" name="class"  value="<?php echo $class ?>">
        <option value="1st" <?php if($class === '1st'){ ?> SELECTED <?php } ?>>1st</option>
        <option value="2nd"<?php if($class === '2nd'){ ?> SELECTED <?php } ?>>2nd</option>
        <option value="3rd"<?php if($class === '3rd'){ ?> SELECTED <?php } ?>>3rd</option>
        <option value="4th"<?php if($class === '4th'){ ?> SELECTED <?php } ?>>4th</option>
        <option value="5th"<?php if($class === '5th'){ ?> SELECTED <?php } ?>>5th</option>
        <option value="6th"<?php if($class === '6th'){ ?> SELECTED <?php } ?>>6th</option>
        <option value="7th"<?php if($class === '7th'){ ?> SELECTED <?php } ?>>7th</option>
        <option value="8th"<?php if($class === '8th'){ ?> SELECTED <?php } ?>>8th</option>
        <option value="9th"<?php if($class === '9th'){ ?> SELECTED <?php } ?>>9th</option>
        <option value="10th"<?php if($class === '10th'){ ?> SELECTED <?php } ?>>10th</option>
        <option value="11th"<?php if($class === '11th'){ ?> SELECTED <?php } ?>>11th</option>
        <option value="12th"<?php if($class === '12th'){ ?> SELECTED <?php } ?>>12th</option>
      </select>
    </div>
    <label for="gender" class="form-label">Select Gender</label>
      <div class="form-check" name="gender" value="<?php echo $gender ?>">
          <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php if ($gender === 'Male'){ ?> CHECKED <?php } ?>>
          <label class="form-check-label" for="gridRadios1">
            Male
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php if ($gender === 'Female'){ ?> CHECKED <?php } ?>>
          <label class="form-check-label" for="gridRadios2">
            Female
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="other" value="Other" <?php if ($gender === 'Other'){ ?> CHECKED <?php } ?>>
          <label class="form-check-label" for="gridRadios3">
          Other
          </label>
        </div>
        <div class="form-group">
         <label for="note" class="form-label">Note</label>
         <textarea class="form-control" name="note" id="note" rows="5" placeholder=" Note "><?php echo $note ?></textarea>
        </div>
        <div class="form-group">
         <label for="DOB" class="form-label">Date of Birth</label>
         <input type="date" class="form-control" name="DOB" id="DOB" value="<?php echo $DOB ?>">
        </div>
        <div class="form-group">
         <label for="Acc.CreatedOn" class="form-label">Account Created On</label>
         <input type="datetime-local" class="form-control" name="AccCreatedOn" id="AccCreatedOn" value="<?php echo $AccCreatedOn ?>">
        </div>
        <div class="form-group">
         <label for="status" class="form-label">Status</label>
         <select class="form-select" name="status" value="<?php echo $status ?>">
          <option value="Active" <?php if($status === 'Active'){ ?> SELECTED <?php }?>>Active</option> 
          <option value="Inactive" <?php if($status === 'Inactive'){ ?> SELECTED <?php }?>>Inactive</option> 
         </select>
        </div>
        <div class="cform-group">
         <label for="createdby" class="form-label">CreatedBy</label>
         <input type="text" class="form-control" name="createdby" id="createdby" value="<?php echo $createdby ?>">
        </div>
        <div class="form-group">
        <div class="form-check">
         <input class="form-check-input" type="checkbox" id="termandcondition">
         <label class="form-check-label" for="gridCheck">Terms and Conditions</label>
        </div>
         <button type="submit" class="btn btn-primary" name="submit" value="edit">Save</button>
        </div>
  </form>
  <?php     
                  }
      }   
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
          echo "Your details has been Successfully Added";
         }else{
              echo "Your data  not inserted successfully ". mysqli_error($conn);
          }

      }      
  ?>
<!--ptional JavaScript-->
    <!--jQuery first, then Popper.js, then Bootstrap JS-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
