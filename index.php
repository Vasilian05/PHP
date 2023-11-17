
<?php  include 'inc/header.php';?>

<?php
//setting the variables to empty string
$name = $email = $body = '';
//creating variables for error handling
$nameErr = $emailErr = $bodyErr = '';

if(isset($_POST['submit'])){
//checking if the input fields are empty

if(empty($_POST['name'])){
  $nameErr = 'Name is required!';
} else {
  //if they are not empty they are sanitized
  $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
};
if(empty($_POST['email'])){
  $emailErr = 'Email is required!';
} else {
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
};
if(empty($_POST['body'])){
  $bodyErr = 'Feedback is required!';
} else {
  $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_SPECIAL_CHARS);
};
//making sure there is not errors 
if(empty($nameErr) && empty($emailErr) && empty($bodyErr)) {
  //if there is no errors, add to database 
  $sql = "INSERT INTO feedback_table (name, email, body) VALUES ('$name', '$email', '$body')";
  if(mysqli_query($conn, $sql)){
    //success
    header('Location: feedback.php');
  }else{
    echo 'Error' .mysqli_error($conn);
  }
}
}

?>

        <img src="img/sitezet-low-resolution-color-logo.png" class="rounded mx-auto d-block" id="logo">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST"class="form">
          <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input name="name" type="text" class="form-control <?php if(emty($_POST['name'])) {echo 'is-invalid'}?> " id="exampleInputEmail1" aria-describedby="name">
            <div class="invalid-feedback"><?php echo $nameErr;?></div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="text" class="form-control <?php echo $emailErr ? 'is-invalid' : null;?>" id="email">
            <div class="invalid-feedback"><?php echo $emailErr;?></div>
          </div>
          <div class="mb-3">
              <label for="feedback" class="form-label">Feedback</label>
              <textarea name="body" class="form-control <?php echo $bodyErr ? 'is-invalid' : null;?>" id="feedback" rows="3"></textarea>
              <div class="invalid-feedback"><?php echo $bodyErr;?></div>
            </div>
          <button name='submit'type="submit" class="btn btn-primary">Submit</button>
        </form>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>