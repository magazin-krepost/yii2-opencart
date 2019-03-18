<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class OrderModel extends ActiveRecord
{

	public static function tableName()
    {
        return '{{oc_order}}';
    }

    public function get($order_id){
		return $this->find()->where(['order_id' => $order_id])->asArray()->one();
	}

	public function last(){
		return $this->find()->max('order_id');
	}

	public function upd($order_id, $order){

		if ( !empty($order['order_status_id']) ) {
			$request = $this->findOne($order_id);
			$request->order_status_id = $order['order_status_id'];

		}

		

	}
    

} 