<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>


    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin CFDI</a>
            </div>
            <!-- Top Menu Items -->
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="blank-page.html"><i class="fa fa-fw fa-file"></i> Blank Page</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Impuestos <small>Controlador</small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>Directorios</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    
                                    <div class="form-group"><?php
                                       

                                        /*for($i=0; $i<getCountContentDirectory($path_Source);$i++){
                                            echo ' <div class="radio">';
                                            if($i==0){
                                                echo '
                                                    <label>
                                                        <input type="radio" name="weekRadio" id="'.$weekNames[$i].'"> 
                                                        <i class="glyphicon glyphicon-folder-open"></i>'. $weekNames[$i].'
                                                    </label></div>';
                                            }else{
                                                echo '
                                                    <label>
                                                        <input type="radio" name="weekRadio" id="'.$weekNames[$i].'"> 
                                                        <i class="glyphicon glyphicon-folder-open"></i>'. $weekNames[$i].'
                                                    </label></div>';
                                            }
                                        }*/ ?>
                                        <form>
                                          <div class="form-group">
                                            <label for="weekName">Mes</label>
                                            <input type="text" class="form-control"  id="weekNameText" name="weekNameText" placeholder="Week">
                                          </div>
                                          <input type="submit" class="btn btn-default" id="btn-Enviar" value="Cargar" onclick="return aa()">
                                          
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                             <tr>
                                                <th>Num</th>
                                                <th>Archivo</th>
                                                <th>Cantidad</th>
                                                <th>Impuesto</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="msj">
                                            <script type="text/javascript">

                                                    function aa(){
                                                        var dato = 'weekNameText=' + ($('#weekNameText').val());
                                                        $.ajax({
                                                            type: 'post',
                                                            url: 'funciones.php',
                                                            data: dato,
                                                            cache: false,
                                                            success: function(html){
                                                                $('#msj').html(html);
                                                            }
                                                        });
                                                        return false;
                                                    }
                                            </script>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6"></div>
                    <div class="col-lg-3 col-md-6"></div>
                    <div class="col-lg-3 col-md-6"></div>
                    <div class="col-lg-3 col-md-6">
                       <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo "$ " . $ivaSumatory; ?></div>
                                        <div>Total de Impuestos</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>



</body>

</html>
