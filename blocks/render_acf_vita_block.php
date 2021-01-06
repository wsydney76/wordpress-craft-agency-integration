<?php

$slug = get_field( 'slug' );

require_once __DIR__ . '/../classes/Agency_Vita.php';

$vita = new Agency_Vita();

echo $vita->get_vita( $slug );

?>
