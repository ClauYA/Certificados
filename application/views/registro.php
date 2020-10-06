<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<a class="btn btn-primary" href="<?=base_url('registro')?>" role="button">Adicionar usuario</a>
<a class="btn btn-primary" href="<?=base_url('vistatabla')?>" role="button">Listar Usuario</a>
     

   <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?=base_url('registro/create')?>" method="POST">
                    <fieldset>
                        <legend class="text-center header"> </legend>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon">Nombres</i></span>
                            <div class="col-md-8">
                                <input id="fname" name="nombres" type="text" placeholder="Nombres" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon">Apellido Paterno</i></span>
                            <div class="col-md-8">
                                <input id="lname" name="ap" type="text" placeholder="Apellido Paterno" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon">Apellido Materno</i></span>
                            <div class="col-md-8">
                                <input id="email" name="am" type="text" placeholder="Apellido Materno" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon">CI</i></span>
                            <div class="col-md-8">
                                <input id="phone" name="ci" type="text" placeholder="ci" class="form-control">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon">Email</i></span>
                            <div class="col-md-8">
                                <input id="phone" name="email" type="email" placeholder="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon">Contraseña</i></span>
                            <div class="col-md-8">
                                <input id="phone" name="password" type="password" placeholder="contraseña" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon">Tipo Usuario</i></span>
                            <div class="col-md-8">
                                <select name="tipousuario" id="">
                                <option value="">Usuario simple</option>
                                <option value="">Usuario Administrador</option>
                                </select>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Adicionar usuario</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<?= isset($smg) ? $smg : ''?>
</body>
</html>