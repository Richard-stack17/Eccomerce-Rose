<!-- mostrar_imagen.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar imagen</title>
</head>
<body>
<?php foreach ($imagen as $producto){ ?>
    <?php if($producto['ProductID']==11){?>
   <?php $rutaImagen = '../public/Imagenes/' . $producto['Image']; // Reemplaza con la ruta real donde se encuentran tus imágenes ?>
    <img src="<?= $rutaImagen ?>" alt="Imagen del producto">
    <?php } ?>
    <?php } ?>
</body>
</html>

