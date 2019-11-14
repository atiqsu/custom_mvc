<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/13/2019
 * Time: 9:17 PM
 */

namespace Model;


/**
 * Class Model
 *
 * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * @package Model
 */
abstract class Model {

    protected $primaryKey = 'id';

    protected $dbCon;

    protected $sqlError;


    public function __construct(\mysqli $dbConnection) {

        $this->dbCon = $dbConnection;
    }


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @return string
     */
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

        $conn = $this->getDbCon();

        $model = new static($conn);

        $notAColumn = get_object_vars($model); #Removing class properties from query building....

        $tbl = empty($model->table) ? strtolower(static::class) : $model->table;

        $pk = $arr['primaryKey'];

        foreach($notAColumn as $col => $val0) {

            unset($arr[$col]);
        }

        $qry = 'INSERT INTO '.$tbl.' (';

         $sep = '';
         $val = '';

        foreach($arr as $col => $value) {

            $value = str_replace('"', '\'', $this->$col); #todo - poor try to make it SQLInjection fre :P , need to use prepared statement later when refactoring...

            $qry .= $sep.'`'.$col.'`';

            $val .= $sep.'"'.$value.'"';

            $sep = ', ';
        }

        $qry .= ') VALUES ('.$val.');';

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


    /**
     * @return \mysqli
     */
    public function getDbCon(): \mysqli {

        return $this->dbCon;
    }


    /**
     * @param \mysqli $dbCon
     */
    public function setDbCon(\mysqli $dbCon): void {

        $this->dbCon = $dbCon;
    }
}