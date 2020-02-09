<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if(current_theme_supports("custom-logo")):
                ?>
                    <div class="site-logo text-center">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php
                endif;
                ?>
                
                <h3 class="tagline">
                    <?php bloginfo( "description" ); ?>
                </h3>
                <h5 class="text-center">
                    <?php alpha_todays_date(); ?>
                </h5>
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
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <?php
                if(is_search()){
                ?>
                <h3><?php _e( "You searched for:", "alpha" ); ?> <?php the_search_query(); ?></h3>
                <?php 
                }
                ?>
                <?php
                echo get_search_form();
                ?>
            </div>
        </div>
    </div>
</div>