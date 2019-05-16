<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductAnalogModel extends ActiveRecord
{

	public static function tableName(){
	  return '{{oc_product_analog}}';
	}

	public function clear(){
		$this->DeleteAll();
	}

  public function set($product_id, $analog_id){
		$request = new $this;
		$request->product_id = $product_id;
		$request->analog = $analog_id;
		$request->save();
	}

	
}