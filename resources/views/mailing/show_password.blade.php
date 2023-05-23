<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>email</title>
</head>
<body>
    <div class="card text-center">
        <div class="card-header">
          Password
        </div>
        <div class="card-body">
            <p class="card-text">Ce compte a éte creé avec succéé et votre mot de passe est :</p>
          <h5 class="card-title"> {{ $password }} </h5>
          <a href="http://localhost:8000/login" class="btn btn-primary">Cliquer Ici</a>
        </div>
      </div>
    
   
</body>
</html>