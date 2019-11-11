<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 5:13 PM
 */


namespace Controller;


class Base {

    protected $dbConnection ;


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param       $filePathWithDotSeparator
     * @param array $optionalParameter
     * @return string
     */
    public static function view($filePathWithDotSeparator, $optionalParameter = []) {

        $fullPath = explode('.', $filePathWithDotSeparator);

        $fullPath = 'Views/'. implode('/', $fullPath). '.php';

        ob_start();

        include $fullPath;

        $result = ob_get_clean();

        return $result;
    }


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
}