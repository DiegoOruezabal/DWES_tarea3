<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea 3 - Programación básica</title>
    
<!--Definimos los estilos-->
    <style>
        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            background-color: #F9B872;
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin-bottom: 20px;
        }

        label {
            font-size: 1.1em;
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 93%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
           
        }

        input[type="submit"] {
            background-color: #B6E1E7;
            color: black;
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #000000 ;
            color: #fff;
        }

        table {
            border-collapse: collapse;
            margin: 20px 0;
            margin: auto;
            color: #000000;
        }

        td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
            font-size: 1.2em;
        }

        h2 {
            color: #d9534f;
        }

       
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 600px;
            margin: 0 auto;
        }

        footer {
            font-family: Georgia, 'Times New Roman', Times, serif;
            color: #000000;
            font-weight: bold;
            font-size: small;
            margin-top: 120px;
        }
    </style>

</head>

<!--Cabecera-->
<header>
    <h1>Tarea 3 - Programación básica</h1>
</header>

<body>
    <div class="container">
    
    <!--Formulario-->
    <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
        <label for="valor">Introduce un número</label>
        <input type="text" id="valor" name="valor">
        <input type="submit" value="Enviar">    
    </form>

    </div>


    <!--Iniciamos el php-->
    <?php

        //función para generar array con valores decreciente de tres en tres
        function generarArray($valor) {
            $valores = array();
            for ($i = $valor; $i >= 0; $i -= 3) {
                $valores [] = $i;//añade valores al array
            }
            return $valores;
        }

        //Comprobación que funciona generarArray
        /*
        $valores = generarArray(15);
        echo  "<h2>Array generado:</h2>";
        
       foreach($valores as $valor) {
        echo $valor . " ";
       }
       */ 

        //función para generar tabla con valores del array
       function tabla($valores) {
       echo "<table border ='1'><tr>";
        foreach ($valores as $valor) {
            echo "<td>$valor</td>";
       }
       echo"</tr></table>";
       
    }

        //comprobación que funciona tabla
        /*
        $tablaHTML = tabla($valores);
        echo  "<h2>Tabla generada:</h2>";

        echo $tablaHTML;
        */

       //switch dentro de if para procesar la información del formulario
       if (isset($_POST['valor'])) {

        $valor = $_POST['valor'];

        switch (true) {
                    
            case $valor >= 0 && $valor <=10:  
                 $array = generarArray($valor);
                 echo "<h2>Tabla de valores decrecientes de tres en tres: <h2>";
                 echo tabla($array);
                 break;
            case empty($valor):
                echo "<h2>Introduzca un valor<h2>";
                break;
            case !is_numeric($valor):
                echo "<h2>Introduzca un valor numérico<h2>";
                break;
            case $valor > 10:
                echo "<h2>Número demasiado grande<h2>";
                break;
            case $valor < 0:
                echo "<h2>Introduzca un valor positivo<h2>";
                break;                
            default:
                echo "<h2>Valor desconocido<h2>";
        }

    } else {
            echo "<h2>No se ha introducido ningún valor</h2>";
        }

    ?>


</body>

<footer>
    <h4>Esta es la tarea 3 de DWES 2024</h4>
</footer>

</html>