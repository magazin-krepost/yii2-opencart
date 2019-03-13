<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class OrderProductModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_order_product}}';
    }

	public function get($order_id){
		return $this->find()->where(['order_id' => $order_id])->asArray()->all();
	}
    

} 