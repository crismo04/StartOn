
<?php
require_once ("../includes/config.php");
require_once ("../logica/SA_Eventos.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/common.css">
	<title>Start On</title>
	<meta charset="utf-8">
</head>
<body>
  <?php require("common/header.php")?>
	<div id="container">
	<?php
    echo '<div class="row" >';
      echo '
        <button >Localizacion</button>
        <button >Precio</button>
        <button >Fecha</button>';

      echo ' </div>';

		echo '<div class="row">';

        $orden = "";
        $ordenacion = "Precio";
        $cerrarDiv = false;
				$SA = SA_Eventos::getInstance();
				$ListOfUsu = $SA->getAllElements($ordenacion);
  				foreach($ListOfUsu as $value) {

            if($orden != $value->getPrecio()) {
              $orden = $value->getPrecio();
              if( $cerrarDiv == true) {
                  echo '</div>';
              }
              echo '<div class ="row">';
              echo '<h2 style="text-align:left;">'. $orden . '</h2>';
              $cerrarDiv = true;
            }
            echo '<div id= "card">';     //hay que hacer el css card en comon para la lista
                echo '<a href ="/ProyectoStartOn/vista/perfEmp.php" ><img src= "/ProyectoStartOn/'.$value->getImagenEvento().'"  style="width:100%"></a>';
              echo'</div>';
				}
      echo '</div>';
			?>

	</div>
</body>