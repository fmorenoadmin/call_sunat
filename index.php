<?php
	session_start();
	$rut='./';
	$pagina='Llamar datos Reniec';
	$direc='callsunat.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pagina; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.js"
			  integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI="
			  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #17a2b8!important;color: #FBF8F8;">
                <b> .. COLSULTA RENIEC .. </b>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal">

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">NUMERO RUC:</label>

                            <div class="col-md-5">
                                <input id="ruc" type="text" class="form-control" name="ruc" maxlength="11" value="" placeholder="Escribe ruc" required autofocus maxlength="8">
                            </div>
                            <div class="col-md-3">
                                <button type="button" class="btn btn-success" id="btnbuscar">
                                <i class="fa fa-search"></i> Buscar
                                </button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                <small id="mensaje" style="color: red;display: none;font-size: 12pt;" > 
                                    <i class="fa fa-remove"></i> El numero de ruc no es valido. 
                                </small>
                            </div>                            
                        </div>


                        <hr>
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12"></div>
                            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">RUC:</label>
                                    <div class="col-md-12">
                                        <input id="txtruc" type="text" class="form-control"  placeholder="RUC" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">RAZON SOCIAL:</label>
                                    <div class="col-md-12">
                                        <input id="razon_social" name="boo" type="text" class="form-control"  placeholder="RAZON SOCIAL" value="" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">FECHA DE ACTIVIDAD:</label>
                                    <div class="col-md-12">
                                        <input id="fecha_actividad" type="text" class="form-control"  placeholder="FECHA DE ACTIVIDAD" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">CONDICIÓN:</label>
                                    <div class="col-md-12">
                                        <input id="condicion" type="text" class="form-control"  placeholder="CONDICIÓN" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">TIPO:</label>
                                    <div class="col-md-12">
                                        <input id="tipo" type="text" class="form-control"  placeholder="TIPO" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">ESTADO:</label>
                                    <div class="col-md-12">
                                        <input id="estado" type="text" class="form-control"  placeholder="ESTADO" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">NOMBRE COMERCIAL:</label>
                                    <div class="col-md-8">
                                        <input id="nombre_comercial" type="text" class="form-control"  placeholder="NOMBRE COMERCIAL" readonly="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-md-12 control-label">OFICIO:</label>
                                    <div class="col-md-12">
                                        <input id="Oficio" type="text" class="form-control"  placeholder="NOMBRE COMERCIAL" readonly="">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){

        $('#btnbuscar').click(function(){
            var numruc=$('#ruc').val();
            if (numruc!='') {
                $.ajax({
                    url:"<?php echo $direc; ?>",
                    method:'GET',
                    data:{ruc:numruc},
                    dataType:'json',
                    success:function(data){
                        if (data) {
                            $('#txtruc').val(data.ruc);
                            $('#razon_social').val(data.razon_social);
                            $('#fecha_actividad').val(data.fecha_actividad);
                            $('#condicion').val(data.contribuyente_condicion);
                            $('#tipo').val(data.contribuyente_tipo);
                            $('#estado').val(data.contribuyente_estado);
                            $('#nombre_comercial').val(data.nombre_comercial);
                            $('#Oficio').val(data.Oficio);
                        }else{
                            $('#txtruc').val('');
                            $('#razon_social').val('');
                            $('#fecha_actividad').val('');
                            $('#condicion').val('');
                            $('#tipo').val('');
                            $('#estado').val('');
                            $('#nombre_comercial').val('');
                            $('#Oficio').val('');
                            $('#mensaje').show();
                            $('#mensaje').delay(2000).hide(2500);
                        }
                    }
                });
            }else{
                alert('Escriba el ruc.!');
                $('#ruc').focus();
            }
            return false;
        });

    });    
</script>
</body>
</html>
