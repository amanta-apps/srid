<?php
$query = mysqli_query($conn, "SELECT descriptions,
                                        link,
                                        text_descriptions 
                                FROM table_datapkb 
                                WHERE statsactive=1");
$r = mysqli_fetch_array($query);
?>
<section>
    <h3 class="p-3" style="font-weight: bold;"><?= $r['descriptions'] ?></h3>
    <hr class="w-50">

    <p style="text-align: justify;"><?= $r['text_descriptions'] ?></p>
    Go to<a href="<?= $r['link'] ?>" target="_blank"> <?= $r['link'] ?></a>
</section>