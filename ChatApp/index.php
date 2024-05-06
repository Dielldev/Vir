<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
    $title = "VRFinity";
  }
?>

<?php include_once "header.php"; ?>

<body>  
    
    <div class="wrapper">
      <section class="form signup">
        <header>VirFinity Realtime Chatting</header>
        <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
        </form>
        <div class="link">Already signed up? <a href="login.php">Login now</a></div>
        <div class="link">Don't Want to Chat? <a href="../index.php">Go Back</a></div>
     

    </section>
  </div>


  



  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

<style>

body {
  background-image: url('../img/liv.jpg');
  background-size: cover;
  background-position: center;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
}


.wrapper {
  background: rgba(255, 255, 255, 0.8); /* Adjust as needed for background color */
  max-width: 450px;
  width: 100%;
  border-radius: 16px;
  box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
              0 32px 64px -48px rgba(0,0,0,0.5);
}

/* Other CSS styles remain the same */


/* Other CSS styles remain the same */

 </style> 

</body>
</html>
