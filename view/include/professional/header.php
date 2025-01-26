<header class="">
    <nav class="">
        <div class="flex-center-full gap-3">
            <section class="logo">
                <figure class="p-0 m-0">
                    <img src="./../img/header-professional.png" class="header-img fluid-img" alt="">
                    <span>logo</span>
                </figure>
            </section>
            <section class="search-data">
                <div class="input-group  search-data__content">
                    <label id="open-modal__search" class="input-group-text search-data__icon" id="basic-addon1">
                        <i class="bi bi-search"></i>
                    </label>
                    <input type="text" name="name" id="open-modal__search" class="form-control search-data__input" placeholder="Buscar..."
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </section>
        </div>
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
                        <h2> <?php echo isset($_SESSION['user']) ? '¡Hola, ' . $_SESSION['user'] . '!' : '' ?></h2>
                    </li>
                    <li class="text-center">
                        <a href="./account/profile.php" class="text-decoration-none text__blue"><button class="dropdown-item" type="button">Administrar tu cuenta</button></a>
                    </li>
                    <li clasS="text-center">
                        <button class="dropdown-item" type="button">
                            <a href="../../php/signOut.php" class="text-decoration-none text__grey">Cerrar sesion</a>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>