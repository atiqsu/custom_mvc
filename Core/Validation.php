<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/14/2019
 * Time: 11:08 AM
 */

namespace App\Core;


/**
 * Class Validation
 *
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * @package App\Core
 */
class Validation {

    protected $errors;


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param array $rules
     * @param array $input
     * @return array|bool
     */
    public function validate(array $rules, array $input) {

        $this->errors = [];

        foreach($rules as $key => $rule) {

            $cond = explode('|', $rule);

            foreach($cond as $check) {


                if($check === 'required') {

                    if(!isset($input[$key]) || empty($input[$key])) {

                        $this->errors[$key] = 'This field is required, can not be null or empty.';

                        return $this->errors;
                    }

                } elseif($check === 'email') {

                    if(!filter_var($input[$key], FILTER_VALIDATE_EMAIL)) {

                        $this->errors[$key] = 'This field must be a valid email address';

                        return $this->errors;
                    }

                } elseif($check === 'int' || $check === 'integer') {

                    if(!filter_var($input[$key], FILTER_VALIDATE_INT)) {

                        $this->errors[$key] = 'This field must be only numbers';

                        return $this->errors;
                    }

                }  elseif($check === 'ip') {

                    if(!filter_var($input[$key], FILTER_VALIDATE_IP)) {

                        $this->errors[$key] = 'This field must be a valid ip address';

                        return $this->errors;
                    }

                } elseif(strpos($check, 'regex:') !== false) {

                    $rgx = str_replace('regex:', '', $check);

                    $regex = array('options' => array('regexp' => $rgx, 'default' => -1));

                    if(filter_var($input[$key], FILTER_VALIDATE_REGEXP, $regex) === -1) {

                        $this->errors[$key] = 'This field does not match the input pattern.';

                        return $this->errors;
                    }
                }
            }
        }

        return true;
    }


    /**
     * @return mixed
     */
    public function getErrors() {

        return $this->errors;
    }

}