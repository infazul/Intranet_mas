<header>
        <?php  
        require_once 'database.php';
        require_once 'usuario.php';
        if(!isset($_SESSION)) 
        { 
                session_start(); 
        }        
        $u = new usuario();
        if (isset($_SESSION['usuario'])) {
                $u = $_SESSION['usuario'];
                if ($u->getPerfil() == 0) {
                        echo '<a href="home_admin.php">Intranet Mas</a>';
                }elseif($u->getPerfil() == 1){
                        echo '<a href="home_profe.php">Intranet Mas</a>';
                }elseif($u->getPerfil() == 2){
                        echo '<a href="home_apod.php">Intranet Mas</a>';
                }elseif($u->getPerfil() == 3){
                        echo '<a href="home_alumn.php">Intranet Mas</a>';
                }}else{
                        echo '<a href="index.php">Intranet Mas</a>';
            }
        if (isset($_SESSION['usuario'])) {
                echo '<div class="right"> 
                <a href="logout.php">Cerrar Sesion</a>
                </div>';
        }
        ?>      
</header>