<h2 class="dashboard__heading"><?php echo $titulo; ?></h2>

<div class="dashboard__contenedor-boton">
    <a class="dashboard__boton" href="/admin/eventos">
        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver
    </a>
</div>

<div class="dashboard__formulario">
    
<?php
    foreach($alertas as $key => $alertas) {
        foreach($alertas as $mensaje) {

?>

<div class="alerta alerta__<?php echo $key; ?>"><?php echo $mensaje; ?></div>

<?php
        }
    }
?>

        <form method="POST" class="formulario">
        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input class="formulario__submit formulario__submit--registrar" type="submit" value="Guardar Cambios">
        </form>
</div>