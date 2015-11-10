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
      <div style="margin-left:20px"><br>
      <h2>Busqueda de usuarios</h2><br>
        <form action="busqueda.php" method="POST">
          
          <b>Usuario <input type="text" class ="texto" name="usu"><br><br>
          Idioma:
          <?php
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              $result=mysqli_query($link,"select id_l,nombre_l from Lengua");
              echo "<td><SELECT class='texto' NAME='leng'>";
              while($row=mysqli_fetch_array($result))
              {
                $id = $row['id_l'];
                $nom=$row['nombre_l'];
                echo"<OPTION VALUE='$id'> $nom ";
              }
              echo"</SELECT><br><br>";
          ?>
          <input type="submit" name="enviar" class="send" value="Buscar"> 
        </form>
          
      
      <?php
        if(isset($_POST['enviar'])){
          $usu = $_REQUEST['usu'];
          $aux = $_SESSION['k_username'];
          $leng = $_REQUEST['leng'];
          $result = mysqli_query($link, "select id_u from Usuario where Usuario.nombre_u = '$aux'");
          while($row=mysqli_fetch_array($result))
          {
              $my_id = $row['id_u'];
          }
          $result=mysqli_query($link,"select id_u,nombre_c,ciudad,lengua_nativa,nombre_l
                              from Usuario,Lengua where Usuario.lengua_nativa = Lengua.id_l
                              and Usuario.lengua_nativa ='$leng'
                              and Usuario.nombre_u!='$aux'");
          while($row=mysqli_fetch_array($result))
              {
                $id = $row['id_u'];
                $nom=$row['nombre_c'];
                $city = $row['ciudad'];
                $leng_n = $row['nombre_l'];
                $sp = "&nbsp";
                
                //$cons = 'mysqli_query($link, "insert into amigos values("$my_id", "$id")");';
                echo" <br><br>$nom <br>";
                echo "Ciudad: $city";
                for ($i=0;$i<15;$i++){echo "$sp";}
                echo "<button id = '$id' class ='send'>Agregar</button><br>";
                echo "Lengua nativa : $leng_n";
                
                echo"<script>
                        var btn = document.getElementById($id);
                        btn.onclick = function(){";
                          
                            mysqli_query($link, "insert into amigos values('$my_id', '$id')");
                          
                              
                         echo" };
                </script>";
                
              }
      
    
      }
      ?>
      </b>
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
