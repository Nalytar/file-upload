<?php

namespace upload\classes\output\builder;

/*
 * First-Idea to build a Form
 * !NOT IN USAGE!
 * Maybe modified later on.
 */
class FormBuilder {

    private static int $counter = 1;


    /**
     * Prints out several div containers with a label and input type with given name<br>
     * div class='class' > label:for='id' displayed_text='label' + input='type' id='id' name='name'
     * @param string $title legend name
     * @param array|null $input 2D-Array with $array[index][]
     * <ul>
     * <li>"type" = inputtype</li>
     * <li>"name" = name</li>
     * <li>"id" = for and id</li>
     * <li>"label" = Diplayed Labeltext</li>
     * <li>"class" = added class selector to surrounding div = optional</li>
     * <li>'comment' created by default</li>
     * <li>'submit' created by default</li>
     * </ul>
     * @param string $file "yes" or default
     * @return void
     */
    public static function createForm(string $title, array|null $input , string $file = "" ): void {

        $formStart = "<form action='require/handler.php' method='post'><fieldset class='fieldset'><legend>{$title}</legend>";
        $formEnd = '<div><label for="comment'.self::$counter.'">Kommentar: </label><br><textarea name="comment" id="comment'.self::$counter.'" cols="30" rows="10"></textarea></div>
        <div class="centerButton"><input class="formbutton" type="submit" value="Go!" name="submit" id="submit'.self::$counter.'"></div></fieldset></form>';

        echo $formStart;
        if ( !empty( $file ) ) {

            echo '<div><label for="file">Datei: </label><br><input type="file" name="file" id="file"></div>';
        } else {
            if ( !empty( $input ) ) {
                foreach ( $input as $text ) {

                    $class = "";
                    if ( key_exists("class", $text )) {
                        $class = " class=".$text["class"];
                    }
                    echo "<div" .$class. "><label for=".$text["id"].">".ucfirst($text["label"]).": </label><br><input type=".$text["type"]." name=".$text["name"]." id=".$text["id"]."></div>";
                }
            }
        }
        echo $formEnd;
        self::$counter++;
    }
}