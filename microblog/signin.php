<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Micro blog - sign in</title>
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
     <div class="login-form">
       <form action="">
         <input type="text" name="email" placeholder="email">
         <input type="password" name="pwd" placeholder="password">
         <button type="submit" name="submit">Login</button>
       </form>
     </div>
    <div class="contact-form">
        <div>
           <h3> Welcome to the blog! </h3>
           <div class="welcome">
             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, rerum beatae molestiae ratione reiciendis esse expedita laboriosam consectetur, aperiam at aliquid sit sunt nisi deserunt odit, fuga eum eaque praesentium!</p>
             <ul>
               <li><a href=""></a></li>
               <li><a href=""></a></li>
               <li><a href=""></a></li>
             </ul>
           </div>
        </div>
        <form action="includes/signup.php" method="post">
            <h3>Sign up!</h3>
            <input type="text" name="firstname" placeholder="First Name">
            <input type="text" name="lastname" placeholder="Last Name">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="pwd" placeholder="password">
            <input type="text" name="occupation" placeholder="Profile eg(Creative Director)">
            <input type="text" name="company" placeholder="Company">
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>
</body>
</html>