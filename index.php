<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']) && !isset($_SESSION)){
        
        $name = $_POST['username'];
        $password = $_POST['password'];
        $lines = file("accounts.txt");

        foreach($lines as $line){
            list($f_name, $f_password) = explode(",", $line);
        }
       
        if($name == $f_name && $password == $f_password){            
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['password'] = $password;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout']) && isset($_SESSION)){
      session_destroy();
    }    
?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <style>
        html, body {
          border: 0;
          padding: 0;
          margin: 0;
          height: 100%;
        }

        body {
          background: tomato;
          display: flex;
          justify-content: center;
          align-items: center;
          font-size: 16px;
        }

        form {
          background: white;
          width: 40%;
          box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.7);
          font-family: lato;
          position: relative;
          color: #333;
          border-radius: 10px;
        }
        form header {
          background: #FF3838;
          padding: 30px 20px;
          color: white;
          font-size: 1.2em;
          font-weight: 600;
          border-radius: 10px 10px 0 0;
        }
        form label {
          margin-left: 20px;
          display: inline-block;
          margin-top: 30px;
          margin-bottom: 5px;
          position: relative;
        }
        form label span {
          color: #FF3838;
          font-size: 2em;
          position: absolute;
          left: 2.3em;
          top: -10px;
        }
        form input {
          display: block;
          width: 78%;
          margin-left: 20px;
          padding: 5px 20px;
          font-size: 1em;
          border-radius: 3px;
          outline: none;
          border: 1px solid #ccc;
        }
        form .help {
          margin-left: 20px;
          font-size: 0.8em;
          color: #777;
        }
        form input[type=submit] {
          position: relative;
          margin-top: 30px;
          margin-bottom: 30px;
          left: 50%;
          transform: translate(-50%, 0);
          font-family: inherit;
          color: white;
          background: #FF3838;
          outline: none;
          border: none;
          padding: 5px 15px;
          font-size: 1.3em;
          font-weight: 400;
          border-radius: 3px;
          box-shadow: 0px 0px 10px rgba(51, 51, 51, 0.4);
          cursor: pointer;
          transition: all 0.15s ease-in-out;
        }
        form button:hover {
          background: #ff5252;
        }
        
        img{
            height: 30%;
        }

    </style>
  
</head>

<body>

<?if(isset($_SESSION['name']) && isset($_SESSION['password'])){ ?>
    <img src="http://kb4images.com/images/image/37185176-image.jpg">
    <form action="index.php" method="POST">
        <input type="submit" name="logout" value="LogOut">
    </form>   
<? }else{ ?>
    <form action="index.php" method="POST">
        <header>Login</header>
        <label>Username <span>*</span></label>
        <input type="text" name="username"/>
        <div class="help">At least 6 character</div>
        <label>Password <span>*</span></label>
        <input type="password" name="password"/>
        <div class="help">Use upper and lowercase lettes as well</div>
        <input type="submit" name="login" value="LogIn">
    </form>
<? }?>
  
  

</body>

</html>

