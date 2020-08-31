<?php 
$dbHost = 'localhost';
$dbUsername = '';
$dbPassword = '';
$dbName = '';

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>AppLink</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://kit.fontawesome.com/8c8b9cfb6e.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="text-center">
  <nav class="navbar navbar-expand navbar-dark bg-dark">
      <a class="navbar-brand" href="#">UnApp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample02">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Apps</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-md-0">
          <input class="form-control" type="text" placeholder="Search">
        </form>
      </div>
    </nav> 
  <br><br>
  <div class="apps">
    <?php 
        // Get products from database 
        $result = $db->query("SELECT * FROM apps ORDER BY RAND() DESC LIMIT 40"); 
        if($result->num_rows > 0){  
            while($row = $result->fetch_assoc()){
        ?> 
      <div class="card" style="width: 18rem;">
        <a href="info.php?&appid=<?php echo $row["id"]; ?>"><img class="card-img-top" src="images/<?php echo $row["img"]; ?>" alt="<?php echo $row["appname"]; ?>"></a>
              <div class="card-body">
                 <h5 class="card-title"><?php echo $row["appname"]; ?></h5>
            <a href="#" class="btn btn-primary">Descargar</a>

         </div>
      </div>
        <?php } }else{ ?>
        <p>Error: no hay apps agregadas </p>
        <?php } ?></div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>