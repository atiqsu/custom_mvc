<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 2:27 PM
 */

namespace Controller;

require 'Base.php';

class IndexController extends Base {

    public function index() {

        return self::view('index.welcome');
    }
}
