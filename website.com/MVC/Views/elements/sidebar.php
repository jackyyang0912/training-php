
<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Admin
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link " href="<?= BASE_PATH . 'index.php?controller=category_product&action=index' ?>" ><i class="fa fa-fw fa-table"></i>Quản lý Category Product </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="<?= BASE_PATH . 'index.php?controller=product&action=index' ?>" ><i class="fas fa-fw fa-table"></i>Quản lý Product </a>
                    </li>

                    <li class="user">
                        <a class="nav-link " href="<?= BASE_PATH . 'index.php?controller=order&action=index' ?>" ><i class="fas fa-fw fas fa-table"></i>Quản lý Order </a>
                    </li>

                    <li class="user">
                        <a class="nav-link " href="<?= BASE_PATH . 'index.php?controller=user&action=index' ?>" ><i class="fas fa-fw fas fa-table"></i>Quản lý User </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>