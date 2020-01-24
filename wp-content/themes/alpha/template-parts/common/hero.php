<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="tagline">
                    <?php bloginfo( "description" ); ?>
                </h3>
                <h1 class="align-self-center display-1 text-center heading">
                    <a href="<?php echo site_url(); ?>"><?php bloginfo( "name" ); ?></a>
                </h1>
            </div>
            <div class="col">
                <div class="navigation text-cenetr">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location'  => 'topmenu',
                            'menu_id'         => 'menucontainer',
                            'menu_class'      => 'text-center'
                        )
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>