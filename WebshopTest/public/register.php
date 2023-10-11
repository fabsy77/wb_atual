<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
    <form action="formRegister.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p><br>
            <label for="Fname"><b>First Name</b></label><br>
            <input type="text" placeholder="Enter First name" name="f_name" required><br>
            <label for="lname"><b>Last Name</b></label><br>
            <input type="text" placeholder="Enter Last name" name="l_name" required><br>
            <label for="email"><b>Date of birthday</b></label><br>
            <input type="date" placeholder="Enter birthday" name="birthday" required><br>
            <label for="email"><b>Email</b></label><br>
            <input type="email" placeholder="Enter Email" name="email" required><br>
            <label for="psw"><b>Password</b></label><br>
            <input type="password" placeholder="Enter Password" name="psw" required><br>
            <label for="psw-repeat"><b>Repeat Password</b></label><br>
            <input type="password" placeholder="Repeat Password" name="psw-repeat" required><br><br>
            <button type="submit">Register</button>
        </div>
    </form>
    

</body>
</html>