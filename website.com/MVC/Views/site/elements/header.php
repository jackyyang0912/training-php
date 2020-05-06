    <!-- Header Area Start -->
    <header class="header-area clearfix">
        <!-- Close Icon -->
        <div class="nav-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <!-- Logo -->
        <div class="logo">
            <a href="#"><img src="<?= BASE_PATH ?>/public/site/img/core-img/logo.png" alt=""></a>
        </div>
        <!-- Amado Nav -->
        <nav class="amado-nav">
            <ul>
                <li><a href="<?= BASE_PATH ?>index.php?controller=home&action=index">Home</a></li>
                <li class="active"><a href="<?= BASE_PATH ?>index.php?controller=shop&action=index">Shop</a></li>
                <li><a href="<?= BASE_PATH ?>index.php?controller=product&action=index">Product Detail</a></li>
                <li><a href="<?= BASE_PATH ?>index.php?controller=cart&action=index">Cart</a></li>
                <li><a href="<?= BASE_PATH ?>index.php?controller=order&action=index">Checkout</a></li>
            </ul>
        </nav>
        <!-- Button Group -->
        <div class="amado-btn-group mt-30 mb-100">
            <a href="#" class="btn amado-btn mb-15">Discount</a>
            <a href="#" class="btn amado-btn active">New this week</a>
        </div>
        <!-- Cart Menu -->
        <div class="cart-fav-search mb-100">
            <a href="<?= BASE_PATH ?>index.php?controller=cart&action=index" class="cart-nav"><img src="<?= BASE_PATH ?>/public/site/img/core-img/cart.png" alt=""> Cart <span>(0)</span></a>
            <a href="#" class="fav-nav"><img src="<?= BASE_PATH ?>/public/site/img/core-img/favorites.png" alt=""> Favourite</a>
            <a href="#" class="search-nav"><img src="<?= BASE_PATH ?>/public/site/img/core-img/search.png" alt=""> Search</a>
        </div>
        <!-- Social Button -->
        <div class="social-info d-flex justify-content-between">
            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </div>
    </header>
    <!-- Header Area End -->