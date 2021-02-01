<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
      <!--CSS BOOTSTRAP-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--JS BOOTSTRAP-->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" src="{base_url }/disco/public/js/jquery.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
  <title>Generos </title>
</head>

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

<body>
  <div class="container">
    <h1>Generos</h1>
    <table class="table table-hover" id="tableGenres">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Options</th>
      </thead>

    </table>

  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</html>

<script type="text/javascript">
$(document).ready( function () {
  var table = $('#tableGenres').DataTable(
    {
      "ajax":'Genre/genresjs',
      "error": function(d){
        console.log("es un error");
      },
      "dataSrc":'',
      "columns": [
            {
              data : "id" 
            },
            { 
              data: "name" 
            },
            {
              defaultContent: "<button type='button' class='editar btn btn-warning'>Editar</button> <button type='button' class='eliminar btn btn-danger'>Eliminar</button>"
            }
      ],
    }
  );
  editarGenero('#tableGenres tbody', table);
  eliminarGenero('#tableGenres tbody', table);
} );

//Funcion para editar un genero
function editarGenero(tbody, table){
  $(tbody).on("click", "button.editar", function(){
    var data = table.row($(this).parents("tr")).data();
    var idGenre = data.id;;
    var pageEditGenre = 'genre/edit/'+idGenre+'';
    console.log(pageEditGenre);

    document.location.href=pageEditGenre;
  });
}

//Funcion para eliminar al usuario
function eliminarGenero(tbody, table){
  $(tbody).on("click", "button.eliminar", function(){
    var data = table.row($(this).parents("tr")).data();
    var idGenre = data.id;
    var nameGenre = data.name;

    Swal.fire({
      title: '¿Estas seguro de eliminar '+nameGenre+'?',
      showDenyButton: true,
      confirmButtonText: `Cancelar`,
      denyButtonText: `Eliminar`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isDenied) {
        document.location.href='genre/delete/'+idGenre+'';
      }
    })

  });

}

</script>