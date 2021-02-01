<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JS BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Editar Genero</title>
  </head>
  <body>
    <!--START MENU-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Disco</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="main_nav">
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
           <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  Generos  </a>
           <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/disco/public/genre">Lista de Generos</a></li>
            <li><a class="dropdown-item" href="/disco/public/genre/new">Nuevo Genero</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">  Albums  </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/disco/public/AlbumController">Lista de Albums</a></li>
            <li><a class="dropdown-item" href="/disco/public/AlbumController/new">Nuevo Album</a></li>        
          </ul>
        </li>
      </ul>
    </div>
  </nav>
  <!--END MENU-->
  
    <div class="p-3">
      <h1>{titulo}</h1>
      <form class="" action="{base_url}/disco/public/genre/update" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{name}" minlength="3" maxlength="255" required>
        <input type="hidden" name="id" id="id" value="{id}">
        <button type="submit" name="button" class="btn btn-success">Guardar</button>
    </form>
    </div>
  </body>

</html>
