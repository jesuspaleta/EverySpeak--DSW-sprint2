<html>
  
  <head>
    <title>EverySpeak</title>
    <link rel="stylesheet" type="text/css" href="style.css"  />

  </head>
  
  <body>
    <?PHP
      if(isset($_POST['begin'])){
                    
        header("Location: registro.php");
                  
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
      <div id = 'inf'> <h1>Bienvenido a EverySpeak</h1><br><br>
          <form action="index.php" METHOD="POST">
          <input class = "sub" id = 'but' type="submit" name = "begin" value="Registrarse">
        </form>
      </div>
      
      
      <div id = 'log'>
        <form action="index.php" method="POST">
        <h2>Iniciar sesion</h2>
        <h2>Usuario:</h2>
        <input type="text" class = 'texto' name = "log"><br>
        <h2>Contraseña:</h2>
        <input type="password" class = 'texto' name = "pass"><br><br>
        <input type="submit" name="subm" class = 'send'><br><br>
        <?php
          if(isset($_POST['subm'])){
            $usu=$_REQUEST['log'];
            $pass=$_REQUEST['pass'];

            require_once('poo.php');
            $usd = new Usuario($usu, $pass);
            $usd->login();
                  
          }
        ?>
        </form>
      </div>
    </div>
    <div id = 'footer'>Copyright || Jesus Paleta, Liam Morales</div>
  </body>
  
</html>
