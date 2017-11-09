<!doctype html>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Consulta 3</title>
  </head>
  <body>
    <h1>Asistentes con sus respectivos asistentes directos e indirectos</h1>
    <?php
    require('conexion.php');
    header('Content-Type: text/html; charset=UTF-8');
    //echo "oe1";





    function recuersi($codigo,$contador,$lista){
      require('conexion.php');
      //echo $codigo."   ".$contador;
      $requiest="SELECT codigo,cliente_asesor FROM ASESOR WHERE cliente_asesor=".$codigo;
      //echo "  ya casi";
      $result = mysqli_query($conexion,$requiest) or die (mysqli_error($conexion));
      //echo "ya lecyó el sql ";
      $conta=0;
      $suma=0;
      foreach ($result as $value) {
        $conta++;
      }
      //echo nl2br("\r aqui ".$conta);
      if ($conta==0 || array_search($codigo, $lista)!=FALSE){
        return 0;
      }
      else{
        $contador=$contador+$conta;

        $pescado=0;
        array_push($lista,$codigo);
        foreach ($result as $value) {
          $prueba_temporal = $value['codigo'];
            $conta = $conta+ recuersi($prueba_temporal,$conta,$lista);
        }
        //echo nl2br(" \r general".$conta);
        return $conta;
      }

    }





    //echo "oe2";


    $maketempt ="SELECT * FROM ASESOR";
    $result =mysqli_query($conexion,$maketempt) or die (mysqli_error($conexion));
    //echo "llegamos";

    //saca los codigos
    $asesorid = array();
    foreach ($result as $value) {
      $asesorid[]= $value['codigo'];
      //echo $value['codigo'];
    }

    //saca los valores directos
    $directos = array();
    foreach ($asesorid as $value) {
      $contador=0;
      foreach ($result as $tupla) {
        if($tupla['cliente_asesor']==$value){
          $contador = $contador + 1;
        }
      }
      $directos[]= $contador;
      //echo $contador;
    }

    $indirectos=array();
    $contador=0;

    //echo "por aca bien";
    foreach ($asesorid as $codigo) {
      //echo "\r directos ".$directos[$contador] ;
      $indirectos[] =(recuersi($codigo,0,array()))-($directos[$contador]);
      //echo"por acá la cagué";
      //echo nl2br("\r contador de los indirectos ".$indirectos[$contador]);
      $contador++;

    }
    $posicion=0;
    if($result){
      $ultimo_equipo_id=null;
      foreach ($result as $fila) {
        if($ultimo_equipo_id != $fila['codigo']){
          $ultimo_departamento_id=$fila['codigo'];

          ?>
          </table>

           <table border='1' width=\"40%\">
          <tr height='50'>
            <td>Código</td>
            <td>Cédula</td>
            <td>Nombre</td>
            <td>Salario</td>
            <td>Dirección</td>
            <td>Fecha de nacimiento</td>
            <td>Cliente asesor</td>
            <td>Directos</td>
            <td>indirectos</td>

        <?php
        }
        ?>
          <tr>
              <td><?=$fila['codigo'];?></td>
              <td><?=$fila['cedula'];?></td>
              <td><?=$fila['nombre'];?></td>
              <td><?=$fila['salario'];?></td>
              <td><?=$fila['direccion'];?></td>
              <td><?=$fila['fecha_de_nacimiento'];?></td>
              <td><?=$fila['cliente_asesor'];?></td>
              <td><?=$directos[$posicion];?></td>
              <td><?=$indirectos[$posicion];?></td>

          </tr>
        <?php
        $posicion++;
      }
    }else{
      echo "Ha ocurrido un error en la busqueda";
    }



    /*
    public function directos($codigo){
      $consulta = "SELECT count(cliente_asesor) FROM ASESOR
      WHERE cliente_asesor=".$codigo;
      return 15;
    }  ?>*/
  ?>

  </body>
</html>
