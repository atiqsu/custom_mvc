<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/13/2019
 * Time: 9:17 PM
 */

namespace Model;


use App\Core\Config;

abstract class Model {

    protected $primaryKey = 'id';

    protected $config;

    protected $sqlError;


    public static function find(int $pk) {

        $model = new static();

        $tbl = empty($model->table) ? strtolower(static::class) : $model->table;

        return 'select * from '.$tbl. ' where `'.$model->primaryKey.'` = '.$pk;

    }


    public static function getPK() {

        $obj = new static();

        return $obj->primaryKey;
    }


    public function getPrimaryKey() {

        return $this->primaryKey;
    }


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @return bool
     */
    public function save() {

        $arr = get_object_vars($this);

        dd('wtttttttttfffff....', $arr);

        $model = new static();

        $tbl = empty($model->table) ? strtolower(static::class) : $model->table;

        $pk = $arr['primaryKey'];

        unset($arr['table'], $arr['primaryKey'], $arr['dbCon']);


        $qry = 'INSERT INTO '.$tbl.' (';

         $sep = '';
         $val = '';

        foreach($arr as $col => $value) {

            //$value = str_replace('"', '\'', $this->$col); #todo - poor try to make it SQLInjection fre :P , need to use prepared statement later when refactoring...

            $qry .= $sep.'`'.$col.'`';

            $val .= $sep.'"'.$model->$col.'"';

            $sep = ', ';
        }

        $qry .= ') VALUES ('.$val.');';

        $conn = $model->config->getDbConnection();

        dd('wtf.....', $conn);

        if ($conn->query($qry) === true) {

            $idd = mysqli_insert_id($conn);

            $this->$pk = $idd;

            return true;

        }

        $model->sqlError = $conn->error;

        return false;
    }


    /**
     * @return mixed
     */
    public function getSqlError() {

        return $this->sqlError;
    }


    /**
     * @param mixed $sqlError
     */
    public function setSqlError($sqlError): void {

        $this->sqlError = $sqlError;
    }


}