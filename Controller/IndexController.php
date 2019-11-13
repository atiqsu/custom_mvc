<?php
/**
 * Created by Md. Atiqur Rahman. <atiqur.su@gmail.com, atiqur@shaficonsultancy.com>
 * Date: 11/10/2019
 * Time: 2:27 PM
 */

namespace Controller;

use Model\Products;

require 'Base.php';

class IndexController extends Base {


    public function index() {

        return self::view('index.welcome');
    }


    public function add() {

        return self::view('index.add');
    }


    public function create($request) {

        $hash = $this->makeHash($request['receipt_id']);

        $model  = new Products($this->getConfig());    #todo - poor design patter, need more concealed one here.......

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
        $model->entry_at    = date('Y-m-d');

        if($model->save()) {

            return array(
                'msg'    => 'Successfully saved into database.',
                'result' => 'ok',
            );
        }

        return array(
            'msg'    => 'Failed to save into database. ['.$model->getSqlError().'] ',
            'result' => 'not ok',
        );
    }


    public function regenerateSalt() {

        generateNewSalt();

        return 'Salt regenerate successfully.';
    }


}
