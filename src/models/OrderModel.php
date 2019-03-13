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
    

} 