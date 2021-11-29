<?php
return [
    'base_route'      => 'admin/filemanager',
    'middleware'      => ['web', 'auth'],
    'allow_format'    => 'jpeg, jpg, png, gif, webp, doc, docx, xls, pdf',
    'max_size'        => 50000,
    'max_image_width' => 1024,
    'image_quality'   => 80,
];
