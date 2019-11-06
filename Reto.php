<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hecho con PHP</title>
        <style>
            .bg-light{
                background: #495057!important;
            }
        </style>
        <link href="Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <?php 
        $totalPagar = 0;
        $totalCantidad = 0;
        $totales = array();
        $colum = 0-1;
        
        if (isset($_POST)) {    
            $colum = @$_POST['Calcular'];
            $cant[] = @$_POST['cant'];
            $precUn[] = @$_POST['prec'];
            $colum--;
        }    
            if (isset($_GET['add'])) {
                $colum = $colum + $_GET['add'];
                for ($index = 0; $index <= @$_GET['add']+1; $index++) {
                    @$totales[$index] = $cant[0][$index] * $precUn[0][$index];
                    $totalPagar = $totales[$index] + $totalPagar;
                    @$totalCantidad = $cant[0][$index] + $totalCantidad;
                }
            }else{
                for ($index = 0; $index <= $colum; $index++) {
                    @$totales[$index] = $cant[0][$index] * $precUn[0][$index];
                    $totalPagar = $totales[$index] + $totalPagar;
                    @$totalCantidad = $cant[0][$index] + $totalCantidad;
                }
            }
                 
        
        
        if (isset($_GET['add'])) {
            $colum = $_GET['add']+1;
        }
    ?>
    <body>
        
        <form action="Reto.php" method="POST">
            <table class="table container mt-4">
                <div class="text-center">
                    <h1>Hecho con PHP</h1>
                    <p>¿Deseas ver el hecho con Js?</p>
                    <a href="index.php" class="btn btn-primary">Ver</a>
                </div>
                <thead class="thead-dark">             
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio Unidad</th>
                    <th scope="col">Total</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 

                        for ($i = 0; $i <= $colum; $i++) {
                    ?>  
                        <tr>
                          <td>Producto #<?php echo ($i+1);?></td>
                          <td><input type="number" class="text-center"  min="0" name="cant[]" value="<?php echo @$cant[0][$i];?>" /></td>
                          <td><input type="number" class="text-center"  min="0" name="prec[]" value="<?php echo @$precUn[0][$i];?>" /></td>
                          <td class="bg-light"><input type="text" class="text-center" value="<?php echo @$totales[$i];?>" placeholder="$" readonly /></td>
                        </tr>
                    <?php 
                        }  
                    ?>
                </tbody>
                <tfoot class="thead-dark">
                  <tr>
                    <th scope="col"><a href="?add=<?php 
                                   if ($colum == 0){echo "1";}else{echo $colum;} ?>" class="btn btn-success w-50 mb-2" >+<a>
                                   <a href="?add=-1" class="btn btn-danger w-50" >Reset<a></th>
                    <th scope="col"><input type="text" class="text-center" value="<?php echo @$totalCantidad;?>" readonly /></th>
                    <th scope="col">
                        <p class="">Calcular Productos</p>
                                <input type="submit" name="Calcular" class="btn btn-success w-50" value="<?php echo $colum+1; ?>"/>
                    </th>
                    <th scope="col" colspan="2">
                    <input type="text" class="text-center" value="<?php echo @$totalPagar;?>" readonly onclick="onclick"/> 
                    </th>
                  </tr>
                </tfoot>
            </table>
        </form>
    </body>
</html>
