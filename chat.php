<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <?php
      session_start();
      if (!isset($_SESSION['k_username'])){
          header("Location: index.php");}
    ?>
    <div id = 'head'>
      <div id = 'tit'>EverySpeak</div>
      
      <div id = 'paginas'>
        <a href="indexcli.php"><div class = 'liga'>Inicio</div></a>
        <a href="busqueda.php"><div class = 'liga'>Busqueda</div></a>
        <a href="perfil.php"><div class = 'liga'>Perfil</div></a>
        <a href="chat.php"><div class = 'liga'>Chat</div></a>
        <a href="contacto.php?id=1"><div class = 'liga'>Contacto</div></a>
        <a href="salir.php"><div class = 'liga'>Salir</div></a>
      </div>
    </div>
    
    <div id = 'cont'>
      <div id = 'temp'> 
          <div id = "sidebar">
            <?php
              $my_id = $_SESSION['k_username'];
              
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              
              $res =  mysqli_query($link,"select id_u from Usuario where
                Usuario.nombre_u = '$my_id'");
              while($roe=mysqli_fetch_array($res))
              {
                $id_u = $roe['id_u'];
              }
              $result=mysqli_query($link,"select amigo2, nombre_u from Amigos, Usuario where
                Amigos.amigo1 = '$id_u' and Usuario.id_u = Amigos.Amigo2");
              while($row=mysqli_fetch_array($result))
              {
                $id_am = $row['amigo2'];
                $am = $row['nombre_u'];
                echo "<div class = 'contact'>$am</div><br>";
                
              }
              mysqli_close($link);
            
          echo"</div>
          <div id='conv'><br>";
            
              if(isset($_POST['envi']))
              {
                $link=mysqli_connect("localhost","root","");
                mysqli_select_db($link,"dsw");
                $quer = mysqli_query($link, "select mensaje from Mensaje where
                                    Mensaje.amigo1 = '$id_u' and Mensaje.amigo2 = '$id_am'");
                while($row=mysqli_fetch_array($quer))
                {
                  $msj = $row['mensaje'];
                  echo "<div class = 'box'>$msj</div><br>";
                }
              
                $msj = $_REQUEST['mess'];
                echo "<div class='box'>$msj</div>";
                
                $fecha = date('Y-m-d');
                mysqli_query($link,"insert into mensaje(mensaje,amigo1,amigo2,fecha)
                          values('$msj','$id_u', '$id_am', '$fecha')");
                
              }
            ?>
            <?php
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              
              $res =  mysqli_query($link,"select id_u from Usuario where
                Usuario.nombre_u = '$my_id'");
            ?>
            <form action = "chat.php" method="POST">
              <textarea name="mess" id="msj"></textarea><h2>
              <input type ="submit" name = "envi" id = "env" class = "send" value="Enviar"></h2>
            </form>
            
          </div>
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
