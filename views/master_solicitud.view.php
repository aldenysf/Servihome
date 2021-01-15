<?php require 'views/header.php';?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="src/tableHTMLExport.js"></script>
    <link rel="StyleSheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" title="Contemporaneo">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<h2>Solicitudes de Servicios </h2>
<table id="example" class="display" style="width:100%">
    <thead>
    <tr>
        <th>Nombre de servicio</th>
        <th>Precio en CLP</th>
        <th>Fecha</th>
        <th>Dirección</th>
        <th>Nombre Cliente</th>
        <th>Texto</th>
        <th>Estado</th>
        <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post):?>
        <tr>
            <td><?php echo $post['titulo']; ?></td>
            <td><?php echo $post['precio']; ?> <i class="fa fa-usd" aria-hidden="true"></i> </td>
            <td><?php echo fecha_con_hora($post['fecha']); ?></td>
            <td><?php echo $post['direccion']; ?></td>
            <td><a href="infoUsuario.php?id=<?php echo $post['id_costumer']; ?>"><?php echo obtener_nombre_usuario($post['id_costumer']); ?></a></td>
            <td><?php echo $post['texto']; ?></td>
            <td> <strong><?php echo obtener_nombre_estado_por_id($post['id_estado']); ?></strong></td>


            <td><a  onclick="createRequest (<?php echo $post['id']; ?>)" class="BotonAccion" title="Aceptar" <?php if($post['direccion'] == "" || $post['id_estado']
                    == 1 || $post['id_estado'] == 2 || $post['id_estado'] == 3 )
                { echo "hidden";}?>><i class="fa fa-check-circle fa-2x" style="color:green" aria-hidden="true"></i></a>

                <a href="editar_solicitud.php?id=<?php echo $post['id']; ?>" class="BotonAccion" title="Editar"
                    <?php if($post['id_estado'] == 1 || $post['id_estado'] == 2 || $post['id_estado'] == 5 )
                    { echo "hidden";}?> ><i class="fa fa-pencil-square fa-2x" style="color:#fdb813" aria-hidden="true"></i></a>

                <a onclick="cancelrequest(<?php echo $post['id']; ?>)" class="BotonAccion" title="Cancelar" data-toggle="tooltip"
                    <?php if($post['id_estado'] == 1 || $post['id_estado'] == 2 || $post['id_estado'] == 5 )
                    { echo "hidden";}?>>
                    <i class="fa fa-times fa-2x"   style="color:red" aria-hidden="true"></i></a>
            </td>
        </tr>
    <?php endforeach;   ?>
    </tbody>
</table>
<script language="JavaScript" >
    function cancelrequest(soli_id) {
        if (confirm("Quieres cancelar esta solicitud? Recuerda que no se puede modificar el estado posterior a este cambio.")){
            window.location.href='cancelar_solicitud.php?id=' + soli_id+'';
            return true;
        }
    }
</script>
<script language="JavaScript" >
    function createRequest(soli_id) {
        if (confirm("¿Quieres aceptar la solicitud? Recuerda que para ver los datos de este servicio, deberás ingresar a Servicios Actuales.")){
            window.location.href=' crear_solicitud.php?id=' + soli_id+'';
            return true;
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="estilo.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

</script>

</body>
</html>
