<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,700&display=swap" rel="stylesheet">

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

    <title>Dashboard - Templune</title>
</head>

<body>
    <style >
          #content {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    text-align: center;
    }
        input[type="text"], input[type="password"], #t{
    outline: none;
    padding: 20px;
    display: block;
    width: 300px;
    border-radius: 3px;
    border: 1px solid #eee;
    margin: 20px auto;
   }
   input[type="submit"] {
   padding: 10px;
   color: #fff;
   background: #0098cb;
   width: 320px;
   margin: 20px auto;
   margin-top: 0;
   border: 0;
   border-radius: 3px;
   cursor: pointer;
   
  }
  input[type="submit"]:hover {
  background-color: #00b8eb;
 }
  header {
  border-bottom: 2px solid #eee;
  padding: 20px 0;
  margin-bottom: 10px;
  width: 100%;
  text-align: center;
}
  header {
  border-bottom: 2px solid #eee;
  padding: 20px 0;
  margin-bottom: 10px;
  width: 100%;
  text-align: center;
}
    </style>
    <div class="d-flex" id="content-wrapper">

        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold mb-0"><i class="icon ion-md-apps lead mr-2"></i></h4>
            </div>
            <div class="menu">
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-people lead mr-2"></i>
                    Usuarios</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-copy lead mr-2"></i>
                    Crear evento</a>

                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-card lead mr-2"></i>
                    Configurar certificado</a>
                <a href="#" class="d-block text-light p-3 border-0"><i class="icon ion-md-browsers lead mr-2"></i>
                    Mis evento</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-checkbox lead mr-2"></i>
                    Verificacion codigo</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-stats lead mr-2"></i>
                    Reportes</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-settings lead mr-2"></i>
                    Tools</a>
                <a href="#" class="d-block text-light p-3 border-0"> <i class="icon ion-md-options lead mr-2"></i>
                    Settings</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <div class="w-100">

         <!-- Navbar -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <div class="container">
                <button>Adicionar Usuario</button>
                
                <button>listar Usuario</button>

              

              
            </div>
          </nav>
          <!-- Fin Navbar -->

        <!-- Page Content -->
        <div id="content" class="bg-grey w-100">
            

              <section class="bg-light py-3">
                <form action="" method="POST">

                    <label for="">Nombres:</label>
                    <input name="nombres" type="text" placeholder="Introduce tus nombres">
                    <br>
                    <label for="">Apellido Paterno:</label>
                    <input name="ap" type="text" placeholder="introduce tu apellido paterno">
                    <br>
                    <label for="">Apellido Materno:</label>
                    <input name="am" type="text" placeholder="introduce tu apellido materno">
                    <br>
                    <label for="">CI:</label>
                    <input name="ci" type="text" placeholder="Introduce tu ci">
                    <br>
                    <label for="">email:</label>
                    <input name="email" type="text" placeholder="introduce tu email">
                    <br>
                    <label for="">Contraseña:</label>
                    <input name="password" type="password" placeholder="introduce tu contraseña">
                    <br>
                    <label for="">Tipo Usuario:</label>
                    <select name="tipoUsuario" id="t">
                       <option>Usuario evento</option>
                       <option>Usuario simple</option>

                    </select>
                    <br>
                    <input type="submit" value="Adicionar usuario">
               </form>

              </section>





        </div>

        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Feb 2020', 'Mar 2020', 'Abr 2020', 'May 2020'],
                    datasets: [{
                        label: 'Nuevos usuarios',
                        data: [50, 100, 150, 200],
                        backgroundColor: [
                            '#12C9E5',
                            '#12C9E5',
                            '#12C9E5',
                            '#111B54'
                        ],
                        maxBarThickness: 30,
                        maxBarLength: 2
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>
</body>

</html>