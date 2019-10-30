<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hecho con JavaScript</title>
        <style>
            .bg-light{
                background: #495057!important;
            }
        </style>
        <link href="Assets/Style/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        
        <table class="table container mt-4 text-center">
            <div class="text-center">
                <h1>Hecho con JavaScript</h1>
                <p>¿Deseas ver el hecho con PHP?</p>
                <a href="Reto.php" class="btn btn-primary">Ver</a>
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
              <tr>
                <td>Queso Rayado</td>
                <td><input type="number" class="text-center"  min="0" name="cant1" id="cant1" value="1" onchange="calcularFila1(); calcularCantidad(); totalPagar()" /></td>
                <td><input type="number" class="text-center"  min="0" name="cant1" id="p1" value="0" onchange="calcularFila1(); totalPagar()" /></td>
                <td class="bg-light"><input type="text" class="text-center"  id="totalFila1" value="0" placeholder="$" /></td>
              </tr>
              <tr>
                <td>Arepas de Chocolo</td>
                <td><input type="number" class="text-center" min="0" name="cant2" id="cant2" value="1" onchange="calcularFila2(); calcularCantidad(); totalPagar()"/></td>
                <td><input type="number" class="text-center"  min="0" name="cant1" id="p2" value="0" onchange="calcularFila2(); totalPagar()" /></td>
                <td class="bg-light"><input type="text" class="text-center"  id="totalFila2" value="0" placeholder="$" readonly /></td>
              </tr>
              <tr>
                <td>Mantequilla Rama 250g </td>
                <td><input type="number" class="text-center"  min="0" name="cant3" id="cant3" value="1" onchange="calcularFila3(); calcularCantidad(); totalPagar()"/></td>
                <td><input type="number" class="text-center"  min="0" name="cant1" id="p3" value="0" onchange="calcularFila3(); totalPagar()" /></td>
                <td class="bg-light"><input type="text" class="text-center"  id="totalFila3" value="0" placeholder="$" readonly /></td>
              </tr>
            </tbody>
            <tfoot class="thead-dark">
              <tr>
                  <th scope="col">Total Pedido</th>
                <th scope="col"><input type="text" class="text-center" id="totalpedido" value="3" readonly /></th>
                <th scope="col">Total Pagar</th>
                <th scope="col"><input type="text" class="text-center" id="totalpagar" value="0" readonly /></th>
              </tr>
            </tfoot>
          </table>
        <script>
            function calcularCantidad() {
                var cant1=eval(document.getElementById('cant1').value);
                var cant2=eval(document.getElementById('cant2').value);
                var cant3=eval(document.getElementById('cant3').value);
                var tot = cant1 + cant2 + cant3;
                document.getElementById('totalpedido').value=tot;
            }
            
            function calcularFila1(){
                c1=eval(document.getElementById('cant1').value);
                p1=eval(document.getElementById('p1').value);
                totf1 = p1 * c1;
                document.getElementById('totalFila1').value=totf1;
            }
            
            function calcularFila2(){
                c2=eval(document.getElementById('cant2').value);
                p2=eval(document.getElementById('p2').value);
                totf2 = p2 * c2;
                document.getElementById('totalFila2').value=totf2;
            }
            
            function calcularFila3(){
                c3=eval(document.getElementById('cant3').value);
                p3=eval(document.getElementById('p3').value);
                totf3 = p3 * c3;
                document.getElementById('totalFila3').value=totf3;
            }
            
            function totalPagar(){
                t1=eval(document.getElementById('totalFila1').value);
                t2=eval(document.getElementById('totalFila2').value);
                t3=eval(document.getElementById('totalFila3').value);
                totalpag = t1 + t2 + t3;
                document.getElementById('totalpagar').value=totalpag;
            }
        </script>
    </body>
</html>
