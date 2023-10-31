<?php

namespace upload\classes\handler;

interface FormType {

    const ALLOWED_FILE_TYPES = array(
        "pdf", "jpeg", "jpg", "bmp", "gif", "svg", "png"
    );
    const MAX_FILE_SIZE = ( 10*1024*1024*1024 );

    function checkFileSize( int $size ):bool ;
    function checkFileType( string $type ):bool ;
    function safeFile():bool ;
    function getValue():void ;


}