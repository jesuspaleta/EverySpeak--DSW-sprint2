<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <?PHP session_start();
      if (!isset($_SESSION['k_username']))
        header("Location: index.php");
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
      <br>
      <div id = 'perf'> 
        <div id="imagep">
          <div id = "image_perf"></div>
          <input type="file">
        </div>
        <div id="nombreu">
          <?php
            $link=mysqli_connect("localhost","root","");
            mysqli_select_db($link,"dsw");
            $aux = $_SESSION['k_username'];
            $result=mysqli_query($link,"select nombre_c,mail,ciudad,lengua_nativa,lengua_aprende
                              from Usuario where Usuario.nombre_u='$aux'");
            while($row=mysqli_fetch_array($result))
              {
                
                $nom=$row['nombre_c'];
                $mail = $row['mail'];
                $city = $row['ciudad'];
                $id_leng_a = $row['lengua_aprende'];
                $res = mysqli_query($link, "select nombre_l from Lengua where 
                          Lengua.id_l = '$id_leng_a'");
                while($ros=mysqli_fetch_array($res))
                {$leng = $ros['nombre_l'];} 
                mysqli_free_result($res);
                
                $id_leng_n = $row['lengua_nativa'];
                $res = mysqli_query($link, "select nombre_l from Lengua where 
                          Lengua.id_l = '$id_leng_n'");
                while($row=mysqli_fetch_array($res))
                {$leng_n = $row['nombre_l'];}
                
                echo" <h2>$nom </h2><br>";
                echo "<b>Ciudad: $city<br><br></b>";
                echo "<b>Lengua nativa : $leng_n<br><br></b>";
                echo "<b>Lengua por aprender : $leng</b>";
                
              }
        
          ?>
          
        </div>
          
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
