<?php

$_CONFIG = array(
    'disabled'            => true,
    'denyZipDownload'     => false,
    'denyUpdateCheck'     => false,
    'denyExtensionRename' => false,
    'theme'               => "oxygen",
    'uploadURL'           => "upload",
    'uploadDir'           => "",
    'dirPerms'            => 0755,
    'filePerms'           => 0644,
    'access'              => array(
        'files' => array(
            'upload' => true,
            'delete' => true,
            'copy'   => true,
            'move'   => true,
            'rename' => true
        ),
        'dirs' => array(
            'create' => true,
            'delete' => true,
            'rename' => true
        )
    ),
    'deniedExts' => "exe com msi bat php phps phtml php3 php4 cgi pl",
    'types' => array(
        // CKEditor & FCKEditor types
        'files'   =>  "doc zip rar txt docx xls xlsx pdf tar gz jpg jpeg JPG JPEG png ppt pptx",
        'flash'   =>  "swf",
        'images'  =>  "*img",
        // TinyMCE types
        'file'    =>  "doc zip rar txt docx xls xlsx pdf tar gz jpg jpeg JPG JPEG png ppt pptx",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm mp3 mp4 mp3 3gp",
        'image'   =>  "*img",
    ),
    'filenameChangeChars' => array(
        " " => "_",
        ":" => "."
    ),
    'dirnameChangeChars'  => array(
        " " => "_",
        ":" => "."
    ),
    'mime_magic'          => "",
    'maxImageWidth'       => 0,
    'maxImageHeight'      => 0,
    'thumbWidth'          => 100,
    'thumbHeight'         => 100,
    'thumbsDir'           => ".thumbs",
    'jpegQuality'         => 90,
    'cookieDomain'        => "",
    'cookiePath'          => "",
    'cookiePrefix'        => 'E-LEARNING_KCFINDER_',
    '_check4htaccess'     => true,
    '_tinyMCEPath'        => "../tinymce",
    '_sessionVar'         => &$_SESSION['E-LEARNING']['KCFINDER'],
);

?>