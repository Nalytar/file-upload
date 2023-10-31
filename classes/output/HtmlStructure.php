<?php

namespace upload\classes\output;

class HtmlStructure {

    const HTML_STRUCT = array(
        "HEAD_START" => '<!DOCTYPE html><html lang="de"><head>
                        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <link href="css/form.css" rel="stylesheet" media="screen">
                    <title>',
        "HEAD_END" => '</title></head>',
        "BODY_START" => "<body>",
        "BODY_END" => '</body></html>',
    );

    public static function headAndBodyStart( $title ): void {
        echo self::HTML_STRUCT["HEAD_START"] . $title . self::HTML_STRUCT["HEAD_END"]. self::HTML_STRUCT["BODY_START"];
    }

    public static function closeBody(): void {
        echo self::HTML_STRUCT["BODY_END"];
    }
}