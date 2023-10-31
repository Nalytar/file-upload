<?php

namespace upload\classes\output;

class Form {

    public static function printForm( string $form ) : void {

        switch ( $form ){
            case "local":
                echo self::localForm();
                break;

            case "url":
                echo self::urlForm();
                break;

            case "ftp":
                echo self::ftpForm();
                break;
        }
    }

    private static function localForm(): string {

        return '<form method="post" action="/require/handler.php" enctype="multipart/form-data">
            <fieldset class="fieldset">
            <legend>Lokal</legend>
            <div>
                <label for="file">Datei: </label><br>
                <input type="file" name="file" id="file"><br>
            </div>
            <div>
                <label for="local_comment">Kommentar: </label><br>
                <textarea name="comment" id="local_comment" cols="30" rows="10"></textarea>
            </div>
            <div class="centerButton">
                <input type="hidden" name="hidden" value="local">
                <input class="formbutton" type="submit" name="action" value="Get from Local">
            </div>
            </fieldset>
        </form>';
    }

    private static function urlForm(): string {

        return '<form method="post" action="/require/handler.php">
            <fieldset class="fieldset">
            <legend>URL</legend>
            <div>
                <label for="url">URL: </label><br>
                <input type="text" name="url" id="url"><br>
            </div>
            <div>
                <label for="url_comment">Kommentar: </label><br>
                <textarea name="comment" id="url_comment" cols="30" rows="10"></textarea>
            </div>
            <div class="centerButton">
                <input type="hidden" name="hidden" value="url">
                <input class="formbutton" type="submit" name="action" value="Get from URL">
            </div>
            </fieldset>
        </form>';
    }

    private static function ftpForm(): string {

        return '<form method="post" action="/require/handler.php">
            <fieldset class="fieldset">
            <legend>FTP</legend>
            <div>
                <label for="user">User: </label><br>
                <input type="text" name="user" id="user">
            </div>
            <div>
                <label for="password">Password: </label><br>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="path">Pfad: </label><br>
                <input type="text" name="path" id="path">
            </div>
            <div>
                <label for="server">Server: </label><br>
                <input type="text" name="server" id="server">
            </div>
            <div>
                <label for="ftp_comment">Kommentar: </label><br>
                <textarea name="comment" id="ftp_comment" cols="30" rows="10"></textarea>
            </div>
            <div class="centerButton">
                <input type="hidden" name="hidden" value="ftp">
                <input class="formbutton" type="submit" name="action" value="Get from FTP">
            </div>
            </fieldset>
        </form>';
    }
}