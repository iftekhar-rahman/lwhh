<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            <?php bloginfo("name"); ?>
        </title>
        
    </head>
    <body>

    <?php

    while(have_posts()){
        the_post();

        echo "<h2>";
        the_title();
        echo "</h2>";
    }

    ?>
      
    </body>
</html>