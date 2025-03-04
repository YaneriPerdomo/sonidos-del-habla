<header class="">
    <nav class="">
        <section class="logo">
            <figure class="p-0 m-0">
                <img src="./../../..img/header-professional.png" class="header-img fluid-img" alt="">
                <span>logo</span>
            </figure>
        </section>
        <section class="profile">
            <div class="btn-group dropstart">
                <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-expanded="false">
                    <img src=<?php
                                echo  "../../../img/patients/avatares/".$_SESSION['avatar'].".png"
                                   ?>
                        class="img-fluid header-img" 
                         alt="<?php echo $_SESSION['avatar'] != NULL ? $_SESSION['avatar'] : 'No hay ningun avatar seleccionado' ?>" 
                                        title="<?php echo $_SESSION['avatar'] != NULL ? $_SESSION['avatar'] : 'No hay ningun avatar seleccionado' ?>"
                        >
                </button>
                <ul class="dropdown-menu p-3">
                    <li clasS="text-center">
                        <button class="dropdown-item" type="button">
                            <a href="../../../php/signOut.php" class="text-decoration-none text__blue">Cerrar sesion</a>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>