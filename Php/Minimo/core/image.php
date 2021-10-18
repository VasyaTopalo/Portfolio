<?php

function prepareImage($image) :string {
    $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = exif_imagetype($image['tmp_name']);
    $error = !in_array($detectedType, $allowedTypes);

    if ($image['size'] == 0) {
        echo "Selected file is too large!";
        exit();
    }
    elseif ($error) {
        echo "File must be in jpg/png/gif extension!";
        exit();
    }
    else {
        $type = '';
        if($detectedType == 1) $type = '.gif';
        elseif ($detectedType == 2)  $type = '.jpg';
        elseif ($detectedType == 3) $type = '.png';

        $image_name = mt_rand(0, 1000000).$type;
        copy($image['tmp_name'], 'assets/images/'.$image_name);
        return 'assets/images/'.$image_name;
    }
}