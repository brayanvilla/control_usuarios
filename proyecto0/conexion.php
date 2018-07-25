	<?php
    /* $conectar = mysql_connect('localhost', 'root', '');

    if(!$conectar){
        echo "Error al concetarse con el servidor";
    }else{
        $base = mysql_select_db('bloc'); // nombre de la base de datos
        if(!$base){
            echo "No se encontro la base de datos";
        }
        else {
            echo "conectado";
        }
    }

*/

$con = mysqli_connect("localhost","root","","bloc") or die ("Error");


?>