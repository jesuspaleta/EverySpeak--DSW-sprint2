<?php

class Usuario
{
  private $user;
  private $pass;
  private $link;
  
  public function __construct($us, $ps)
  {
    $this->user = $us;
    $this->pass = $ps;
    $this->link = mysqli_connect("localhost","root","");
    mysqli_select_db($this->link,"dsw");
  }
  
  public function login()
  {
    session_start();
    $result=mysqli_query($this->link,"select nombre_u,pass_u
                        from usuario where nombre_u='$this->user'");
    
    if($row=mysqli_fetch_array($result))
    {
        //echo "Si se encontro el usuario $usu <br>";
        if($row['pass_u'] == $this->pass)
        {
            $_SESSION["k_username"]=$this->user;
            //$ti=$row['tipo'];
            /*if ($ti==1)*/ header("Location: indexcli.php"); 
            //else header("Location: indexadm.php"); 
        }  
        else  echo "<div style=' color:red'>
                    &nbspError en la Contrasena<br></div>"; 
    }
    else   echo "<div style=' color:red'>
                &nbspError en el Usuario<br></div>"; 

    mysqli_close($this->link);
  }
  
  public function registro($a,$n, $m, $c, $g)
  {
    mysqli_query($this->link,"insert into Usuario(nombre_c,nombre_u, pass_u,mail,ciudad,lengua_nativa,lengua_aprende) 
                  values ('$a','$this->user','$this->pass','$n','$m', '$c','$g')");
    
    session_start();
    $_SESSION["k_username"]=$this->user;
    header("Location: index.php");
  }
  
}

?>
