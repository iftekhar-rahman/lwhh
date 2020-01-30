<?php get_header(); ?>
<body <?php body_class(); ?>>

<?php get_template_part( "template-parts/common/hero" ); ?>

<div class="posts text-center">
    <h2>
        Posts Under: <?php single_cat_title(); ?>
    </h2>
    <div <?php post_class(); ?>>

    <?php
    while( have_posts() ){
        the_post();
    ?>

    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

    <?php
    }
    ?>

    <div class="pagination-wrap mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-8">
                    <div class="text-center">
                        <?php
                        the_posts_pagination(array(
                            "screen_reader_text" => " ",
                            "prev_text" => "New Posts",
                            "next_text" => "Old Posts"
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
<?php get_footer(); ?>