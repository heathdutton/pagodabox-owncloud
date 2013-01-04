<?php

// {hd} - Added to aid in faster pagodabox installation
if(isset($_POST['install']) && $_POST['install']=='true') {
    // Define our overriding defaults, so that installation can occur swiftly & easily on pagodabox
    $overriding_defaults = array(
        'directory' => getcwd() . '/data',
        'dbtype' => 'mysql',
        'dbuser' => getenv('DB1_USER'),
        'dbpass' => getenv('DB1_PASS'),
        'dbname' => getenv('DB1_NAME'),
        'dbhost' => getenv('DB1_HOST')
    );

    // Merge post with our overriding defaults
    $_POST = array_merge($_POST, $overriding_defaults);

    phpinfo();
}

// Then include the normal setup file (this file was coppied into this location, but has not been modified)
require '../scripts/setup_original.php';