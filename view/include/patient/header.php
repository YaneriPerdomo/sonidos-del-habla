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
                    <img src=<?php
                                echo $_SESSION['id_gender'] == 1 ? "../../img/patients/childs/boy.png"
                                    : "../../img/patients/childs/girl.png" ?>
                        class="img-fluid header-img" alt="">
                </button>
                <ul class="dropdown-menu p-3">
                    <li clasS="text-center">
                        <button class="dropdown-item" type="button">
                            <a href="../../php/signOut.php" class="text-decoration-none color-black">Cerrar sesion</a>
                        </button>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</header>