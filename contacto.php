<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <div id = 'head'>
      <div id = 'tit'>EverySpeak</div>
      
      <div id = 'paginas'>
        <?php
          $id = $_GET["id"];
          if($id== 0)
          {
          echo"<a href='index.php'><div class = 'liga'>Inicio</div></a>
              <a href='registro.php'><div class = 'liga'>Registro</div></a>
              <a href='idiomas.php'><div class = 'liga'>Idiomas</div></a>
              <a href='contacto.php?id=0'><div class = 'liga'>Contacto</div></a>
              <a href='about.php'><div class = 'liga'>About</div></a>";
          }
          if($id==1)
          {
            session_start();
            if (!isset($_SESSION['k_username'])){
                  header("Location: contacto.php?id=0");}
            echo"<a href='indexcli.php'><div class = 'liga'>Inicio</div></a>
                <a href='busqueda.php'><div class = 'liga'>Busqueda</div></a>
                <a href='perfil.php'><div class = 'liga'>Perfil</div></a>
                <a href='chat.php'><div class = 'liga'>Chat</div></a>
                <a href='contacto.php?id=1'><div class = 'liga'>Contacto</div></a>
                <a href='salir.php'><div class = 'liga'>Salir</div></a>";
          }
        
        ?>
      </div>
    </div>
    
    <div id = 'cont'>
      <div id = 'info' style = "margin-left:15px"> 
      <br>
        
        <h2>Benemerita Universidad Autonoma de Puebla</h2>
        <h2>Facultad de Ciencias de la Computacion</h2>
        <h2>Jesus Paleta Islas</h2>
        <h2>Proyecto de DSW</h2>
      </div>
      
      
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
