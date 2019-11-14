<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 5:13 PM
 */


namespace Controller;


use App\Core\Config;

class Base {

    protected $config;


    public function __construct(Config $config) {

        $this->config = $config;
    }


    public function getSalt() {

        return $this->config->getSalt();
    }


    public function getDbConnection() {

        return $this->config->getDbConnection();
    }


    /**
     * @return Config
     */
    public function getConfig(): Config {

        return $this->config;
    }




    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param       $filePathWithDotSeparator
     * @param array $optionalParameter
     * @return string
     */
    public static function view($filePathWithDotSeparator, $optionalParameter = []) {

        $fullPath = explode('.', $filePathWithDotSeparator);

        $fullPath = 'Views/' . implode('/', $fullPath) . '.php';

        extract($optionalParameter, EXTR_OVERWRITE);

        ob_start();

        include $fullPath;

        $result = ob_get_clean();

        return $result;
    }


    /**
     * Get encrypted string of input
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param $str
     * @return string
     */
    public function makeHash($str) {

        $salt = $this->getSalt();
        $rounds = 100; #intentionally done it.....very low :P

        #$6$ ----> SHA512

        return crypt($str, sprintf('$6$rounds=%d$%s$', $rounds, $salt));
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