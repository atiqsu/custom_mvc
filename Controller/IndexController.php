<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 2:27 PM
 */

namespace Controller;

use App\Core\Validation;
use Model\Products;

require 'Base.php';

class IndexController extends Base {

    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @return string
     */
    public function index() {

        return self::view('index.welcome');
    }


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @return string
     */
    public function add() {

        return self::view('index.add');
    }


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @param $request
     * @return array
     */
    public function create($request) {

        $hash = $this->makeHash($request['receipt_id']);

        $rule = [
            'buyer_name'  => 'required|regex:/^[a-zA-Z0-9 ]{1,20}$',
            'buyer_email' => 'required|email',
            'buy_price'   => 'required|integer',
            'receipt_id'  => 'required|regex:/^[a-zA-Z]{1,20}$/',
            'entry_by'    => 'required|regex:/^[0-9]{1,20}$/',
            'ip_address'  => 'required|ip',
            'city_name'   => 'required|regex:/^[a-zA-Z][a-zA-Z ]{1,19}$/',
            'phone_no'    => 'required|regex:/^(880)[0-9]{1,16}$/',
            'items_name'  => 'required',
        ];

        $validator = new Validation();

        if($validator->validate($rule, $request) !== true) {

            return array(
                'errors' => $validator->getErrors(),
                'result' => 'not ok',
            );
        }


        $model = new Products($this->getDbConnection());    #todo - poor design pattern, need more concealed one here.......

        $model->buyer       = $request['buyer_name'];
        $model->buyer_email = $request['buyer_email'];
        $model->amount      = $request['buy_price'];
        $model->receipt_id  = $request['receipt_id'];

        $model->items       = implode(', ', $request['items_name']);

        $model->buyer_ip    = $request['ip_address'];
        $model->note        = $request['items_note'];
        $model->city        = $request['city_name'];
        $model->phone       = $request['phone_no'];
        $model->entry_by    = $request['entry_by'];
        $model->hash_key    = $hash;
        $model->entry_at    = date('Y-m-d H:i:s');  #todo - remove it - just for debugging....
        #$model->entry_at    = date('Y-m-d');

        if($model->save()) {

            return array(
                'msg'    => 'Successfully saved into database.',
                'result' => 'ok',
            );
        }

        return array(
            'msg'    => 'Failed to save into database. [' . $model->getSqlError() . '] ',
            'result' => 'not ok',
        );
    }


    /**
     *
     * @author Md. Atiqur Rahman <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
     * @return string
     */
    public function regenerateSalt() {

        generateNewSalt();

        return 'Salt regenerate successfully.';
    }


}
