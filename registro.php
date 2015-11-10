<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <?PHP
    if(isset($_POST['enviar'])){
      $nomc = $_REQUEST['nomc'];
      $usu = $_REQUEST['usu'];
      $pass = $_REQUEST['pass'];
      $mail = $_REQUEST['mail'];
      $city = $_REQUEST['city'];
      $leng_n = $_REQUEST['leng_n'];
      $leng_a = $_REQUEST['leng_a'];
    
      require_once('poo.php');
      $usd = new Usuario($usu, $pass);
      $usd->registro($nomc, $mail, $city, $leng_n, $leng_a);
    
    }
    ?>
                  
      
    <div id = 'head'>
      <div id = 'tit'>EverySpeak</div>
      
      <div id = 'paginas'>
        <a href="index.php"><div class = 'liga'>Inicio</div></a>
        <a href="registro.php"><div class = 'liga'>Registro</div></a>
        <a href="idiomas.php"><div class = 'liga'>Idiomas</div></a>
        <a href="contacto.php?id=0"><div class = 'liga'>Contacto</div></a>
        <a href="about.php"><div class = 'liga'>About</div></a>
      </div>
    </div>
    
    <div id = 'cont'>
      <div id = 'reg'> <br>
        <form action="registro.php" method="POST">
        <table>
          <tr><td><b>Nombre completo:</td><td> <input type="text" class="texto" name="nomc"><br></td></tr>
          <tr><td><b>Usuario:</td><td> <input type="text" class="texto" name="usu"><br></td></tr>
          <tr><td><b>Contrasena: </td><td> <input type="password" class="texto" name="pass"></td></tr>
          <tr><td><b>E-mail:</td><td> <input type="text" class="texto" name="mail"></td><br></tr>
          <tr><td><b>Ciudad:</td><td> <input type="text" class="texto" name="city"></td></tr>
          <tr><td><b>Lengua nativa</td>
            <?php
              $link=mysqli_connect("localhost","root","");
              mysqli_select_db($link,"dsw");
              $result=mysqli_query($link,"select id_l,nombre_l from Lengua");
              echo "<td><SELECT class='texto' NAME='leng_n'>";
              while($row=mysqli_fetch_array($result))
              {
                $id = $row['id_l'];
                $nom=$row['nombre_l'];
                echo"<OPTION VALUE='$id'> $nom ";
              }
              echo"</SELECT></td></tr>";
              echo "<tr><td><b>Lengua por aprender</td><td> <select class='texto' name = 'leng_a'>";
              $result=mysqli_query($link,"select id_l,nombre_l from Lengua");
              while($row=mysqli_fetch_array($result))
              {
                $id = $row['id_l'];
                $nom=$row['nombre_l'];
                echo"<OPTION VALUE='$id'> $nom ";
              }
              echo"</SELECT></td><tr>";
              mysqli_free_result($result);
              mysqli_close($link);
            ?>
          
          
        
        </table>
        <input type = "submit" class="send" name="enviar" value="Enviar">
        </form>
          
      </div>
      
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
