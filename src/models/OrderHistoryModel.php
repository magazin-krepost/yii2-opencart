<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class OrderHistoryModel extends ActiveRecord
{

	public static function tableName()
    {
        return '{{oc_order_history}}';
    }

	public function upd($order_id, $order){

		$date = new \DateTime('now');

		$request = new $this;

		$request->order_id = $order_id;
		$request->order_status_id = $order['order_status_id'];
		$request->notify = 0;
		$request->comment = ''; 
		$request->date_added = $date->format('Y-m-d H:i:s');

		$request->save();

	}
    

} 