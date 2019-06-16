<?php session_start() ?>

<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=EB+Garamond:400,500,600,700,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,600i,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <link rel= "stylesheet" href="css/fontawesome.min.css"/>
  <title>Microblog - Form</title>
</head>
<body>
<?php
  if(isset($_SESSION['u_id'])){
    echo '<form action="includes/logout.php" method = "post">
    <button type="submit" name="submit">logout</button> 
  </form>'; 
  }
?>
    <div class="form">
    <form class="" action="includes/post.php" method="post">
      <input type="text" id="the-title" name="title" placeholder="title"><br>
      <input type="text" id="the-author" name="author" placeholder="Author name"><br>
      <textarea name="content" rows="8" cols="100" placeholder="article"></textarea>
      <button type="submit" name="submit">Post</button>
    </form>
  </div>
</body>
</html>
