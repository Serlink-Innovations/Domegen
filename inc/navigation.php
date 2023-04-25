<div class="navigation">

    <div class="container mx-auto" id="navigationContainer">

        <button class="navToggler">

            <svg fill="none" height="64" viewBox="0 0 24 24" width="64" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 6H20M4 12H20M13 18H20" stroke="#FFFFFF" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" />
            </svg>

        </button>

        <a class="logo" href="<?php echo get_home_url(); ?>">
            <picture>
                <source class="logo-mobile" media="(max-width: 996px )"
                    srcset="<?php echo get_template_directory_uri(); ?>/assets/img/logo-mobile.png">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" type="png">
            </picture>
        </a>

        <?php

        if (has_nav_menu('primary')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container_class' => 'navbar',
                    'menu_class' => 'nav',
                )
            );
        }
        ?>

        <div class="navigationIcons">

            <a id="search" href="#">

                <svg focusable="false" width="18" height="18" class="icon icon--header-search   " viewBox="0 0 18 18">
                    <path
                        d="M12.336 12.336c2.634-2.635 2.682-6.859.106-9.435-2.576-2.576-6.8-2.528-9.435.106C.373 5.642.325 9.866 2.901 12.442c2.576 2.576 6.8 2.528 9.435-.106zm0 0L17 17"
                        fill="none" stroke="currentColor" stroke-width="1"></path>
                </svg>

            </a>

            <a href="/my-account">

                <svg focusable="false" width="18" height="17" class="icon icon--header-customer   " viewBox="0 0 18 17">
                    <circle cx="9" cy="5" r="4" fill="none" stroke="currentColor" stroke-width="1"
                        stroke-linejoin="round"></circle>
                    <path d="M1 17v0a4 4 0 014-4h8a4 4 0 014 4v0" fill="none" stroke="currentColor" stroke-width="1">
                    </path>
                </svg>

            </a>

            <a href="/cart">

                <svg focusable="false" width="20" height="18" class="icon icon--header-cart   " viewBox="0 0 20 18">
                    <path d="M3 1h14l1 16H2L3 1z" fill="none" stroke="currentColor" stroke-width="1"></path>
                    <path d="M7 4v0a3 3 0 003 3v0a3 3 0 003-3v0" fill="none" stroke="currentColor" stroke-width="1">
                    </path>
                </svg>

                <?php echo WC()->cart->get_cart_contents_count(); ?> Items

            </a>

        </div>


    </div>

    <div class="container mx-auto" id="categoryContainer">
        <button id="categoriesBtn">

            <span class="material-symbols-outlined">
                menu
            </span>

            Specials (Coming Soon)

            <span class="material-symbols-outlined">
                expand_more
            </span>

        </button>
    </div>

    <div class="container mx-auto">

        <?php echo get_product_search_form(); ?>

    </div>

</div>