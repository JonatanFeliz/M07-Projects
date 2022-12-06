<h1>Noticias Deportivas</h1>
<div class="container">
    <div class="row">
    <?php
        $data = $webs_array['data'];

        $first_data = $data[0];

        $id         = $first_data['id'];
        $city       = $first_data['city'];
        $full_name  = $first_data['full_name'];

        echo
        "<div class='card' style='width: 40rem;'>
            <div class='card-body'>
            <h5 class='card-title'>$city</h5>
            <p class='card-text'>$full_name</p>
            </div>
        </div>" . PHP_EOL;
        
    ?>
    </div>
</div>
