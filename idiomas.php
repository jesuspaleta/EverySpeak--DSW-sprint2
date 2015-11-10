<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
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
    
    <div id = 'cont' style="height:125%"><br>
      <div id = 'reg'>
        <?php
          $link=mysqli_connect("localhost","root","");
          mysqli_select_db($link,"dsw");
          for ($i=0;$i<2;$i++)
          {
            for($j=0;$j<5;$j++)
            {
              $Mat[$i][$j] = 0;
            }
          }
          $result =  mysqli_query($link,"select nombre_l from Lengua");
          $a = 0;
          while($row=mysqli_fetch_array($result))
          {
            $idi[$a] = $row['nombre_l'];
            $a++;
          }
          $res =  mysqli_query($link,"select lengua_nativa, lengua_aprende from Usuario");
          while($roe=mysqli_fetch_array($res))
          {
            $var1 = $roe['lengua_nativa']; 
            $var2 = $roe['lengua_aprende'];
            $Mat[0][$var1-1]++;
            $Mat[1][$var2-1]++;
          }
          
          for($i=0;$i<5;$i++)
          {
            echo "<h2>$idi[$i]</h2>";
            $temp = $Mat[0][$i];
            echo "Nativos: $temp<br>";
            $temp = $Mat[1][$i];
            echo "Aprendiendo: $temp<br><br>";
          }
        ?>
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
