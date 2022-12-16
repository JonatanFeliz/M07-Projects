<h1>Galeria</h1>

<div id="main">
    <?php

        foreach ($images_array as $image) {
            echo "<div class='recuadro'>";
            echo "<a href=''>";
            echo "<img src='$image'>";
            echo "</a>";
            echo "</div>" . PHP_EOL;
        }
    ?>
</div>