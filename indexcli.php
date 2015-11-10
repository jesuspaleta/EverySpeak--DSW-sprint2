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
    
    <div id = 'cont'><br>
      <div id = 'reg' > 
        <h2>Bienvenido a EverySpeak</h2>
        <h2>Conoce personas y aprende un idioma.</h2><br><br>
         
      </div>
      
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
