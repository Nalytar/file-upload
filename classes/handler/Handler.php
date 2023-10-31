<?php

namespace upload\classes\handler;

class Handler implements GetFile {

    private FormType $handle;


    public function __construct( string $uploadType ) {

        $this->setHandler( $uploadType );
    }


    private function setHandler( string $handler ):void {
        switch ( $handler ){
            case "local":
                $this->handle = new LocalHandler();break;
            case "url":
                $this->handle = new UrlHandler();break;
            case "ftp":
                $this->handle = new FtpHandler();break;
        }
    }


    public function getFile(): bool {
        return $this->handle->getFile();
    }

}