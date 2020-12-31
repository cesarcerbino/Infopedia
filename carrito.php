<?php
	session_start();
	
	if(isset($_SESSION['carrito'])){
			if(isset($_GET['id'])){	$arreglo=$_SESSION['carrito'];
		$encotro=false;
		$numero=0;


		
		for($i=0;$i<count($arreglo);$i++){
			if($arreglo[$i]['Id']==$_GET['id']){
				$encontro=true;
				$numero=$i;
			}
		}
		if($encontro==true){
			$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
			$_SESSION['carrito']=$arreglo;
		}else{
			if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($con,"select * from producto where id='".$_GET['id']."'");
			while ($f=mysqli_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
				
			}
		$datosnuevos=array('Id'=> $_GET['id'],
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
						'Cantidad'=>1);
		array_push($arreglo,$datosnuevos);
		$_SESSION['carrito']=$arreglo;
		};
		};


};
	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$image="";
			$re=mysqli_query($con,"SELECT * FROM productos WHERE id='".$_GET['id']."'");
			while ($f=mysqli_fetch_array($re)){
				$nombre=$f['nombre'];
				$precio=$f['precio'];
				$imagen=$f['imagen'];
			
			}
		$arreglo=array('Id'=>$_GET['id'],
						'Nombre'=>$nombre,
						'Precio'=>$precio,
						'Imagen'=>$imagen,
						'Cantidad'=>1);
		$_SESSION['carrito']=$arreglo;
		}
	}
?>

<html>
	<head>
		<title>Carrito</title>
		<link href="carrito.css" rel="stylesheet">
		<script type="text/javascrips" href="scripts.js"></script>
	</head>

	<body>

		<div id="encabezado">
			<h1>BERLIN</h1>
			<ul class="menu">
				<li><a href="new 1.html">Inicio</a></li>
				<li><a href="remeras.php">|Productos</a>
					<ul>
						<li><a href="remeras.php">Remeras</a></li>
						<li><a href="vasos.php">Vasos termicos</a></li>
						<li><a href="tazas.php">Tazas</a></li>
						<li><a href="almohadones.php">Almohadones</a></li>
					</ul>
				</li>
				<li><a>| Nosotros</a></li>
				<li><a>| Contacto</a></li>
				<li><a>| Pedido</a></li>
			</ul>
		</div>
		<div class="nav">
			<div class="titulo"><h3>Productos</h3></div>
			<ul>
				<li><a href="remeras.php">-   Remeras</a></li>
				<li><a href="tazas.php">-   Tazas</a></li>
				<li><a href="vasos.php">-   Vasos Termicos</a></li>
				<li><a href="almohadones.php">-   Almohadones</a></li>
			</ul>
			<div class="titulo"><h3><a href="carrito.php">CARRITO</a></h3></div>
		</div>
		<div class="product">
<?php 
	if(isset($_SESSION['carrito'])){
		$datos=$_SESSION['carrito'];
		$total=0;
		for($i=0;$i<count($datos);$i++){
		
?>
		<div class="producto">
			<img src="productos/<?php  echo $datos[$i]['Imagen'];?>"/>
			<p><?php echo $datos[$i]['Nombre'];?><p>
			<p>Precio: $<?php echo $datos[$i]['Precio'];?><p>
			<p>Cantidad: 
				<input type="text" value="<?php echo $datos[$i]['Cantidad'];?>
				data-precio="<?php echo $datos[$i]['Precio'];?>"
				data-id="<?php echo $datos[$i]['Id'];?>
				class="cantidad"><p>
			<p class="subtotal">Subtotal: <?php echo $datos[$i]['Precio']*$datos[$i]['Cantidad']?><p><p>
		</div>
<?php
	global $total;
		$total=($datos[$i]['Precio']*$datos[$i]['Cantidad'])+$total;
};?>
		<div class="cuenta"><h2>total:<?php echo $total;?></h2></div>
<?php	} else{
		echo 'no ha seleccionado ningun producto';
	}	;
?>
		</div>
		<div id="pie_pagina">
			<div class="separation">
				<h1>BERLIN</h1>
			</div>
			<div class="separation">
				<h2>UBICACIÓN:</h2>
				<p>Av. Corrientes 2556</p>
				<p>Cap. Federal, Buenos Aires</p>
			</div>
			<div class="separation">
				<h2>Contactenos aquí:</h2>
				<p></p>
			</div>
		</div>
	</body>
</html>