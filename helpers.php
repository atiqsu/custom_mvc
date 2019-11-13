<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 1:48 PM
 */


/**
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * @param        $arg
 * @param string $msg
 */
function dd($arg, $msg = 'I am exiting....') {

    echo '<pre>';

    if(is_array($arg)) {

        print_r($arg);

    } elseif(is_object($arg)) {

        var_dump($arg);

    } else {

        var_dump($arg);
    }


    echo '</pre>';

    die($msg);
}


/**
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 */
function ddd() {

    $args = func_get_args();

    if(empty($args)) die('No argument passed........');

    foreach($args as $arg) {

        echo '<pre>';

        if(is_array($arg)) {

            print_r($arg);

        } elseif(is_object($arg)) {

            var_dump($arg);

        } else {

            var_dump($arg);
        }
    }

    echo '</pre>';

    die('Exiting....all arguments are dumped!');
}


/**
 *
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * @return bool
 */
function generateNewSalt() {

    $salt = substr(str_replace('+', '.', base64_encode(md5(mt_rand(), true))), 0, 16);

    $reading = fopen('config.php', 'r');
    $writing = fopen('config.php.tmp', 'w');

    $replaced = false;

    while(!feof($reading)) {

        $line = fgets($reading);

        if(strrpos($line, '$salt') !== false) {

            $line = '$salt = \'' . $salt . '\';';
            $replaced = true;
        }

        fputs($writing, $line);
    }

    fclose($reading);
    fclose($writing);

    if($replaced) {

        rename('config.php.tmp', 'config.php');

    } else {

        unlink('config.php.tmp');
    }

    return true;
}


