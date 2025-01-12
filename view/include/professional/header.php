<header class="">
    <nav class="">
        <section class="logo">
            <figure class="p-0 m-0">
                <img src="./../img/header-professional.png" class="header-img fluid-img" alt="">
                <span>logo</span>
            </figure>
        </section>
        <section class="profile">
            <div class="btn-group dropstart">
                <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown"
                    data-bs-display="static" aria-expanded="false">
                    <img src="../../img/header-professional.png" class="img-fluid header-img" alt="">
                 </button>
                <ul class="dropdown-menu p-3"> 
                    <li class="flex-center-full flex-column dropdown-menu__information">
                        <span class="dropdown-menu__information-email"> <?php echo $_SESSION['email'] ?? '' ?> </span>
                        <img src="../../img/header-professional.png" class="dropdown-menu__img" alt="">
                        <h2> <?php echo isset($_SESSION['user']) ? '¡Hola, ' .$_SESSION['user'] . '!': ''?></h2>
                    </li>
                    <li class="text-center">
                        <button class="dropdown-item" type="button"><a href="./account/profile.php" class="text-decoration-none">Administrar tu cuenta</a></button>
                    </li>
                    <li clasS="text-center">
                        <button class="dropdown-item" type="button">
                            <a href="../../php/signOut.php" class="text-decoration-none color-grey">Cerrar sesion</a>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>