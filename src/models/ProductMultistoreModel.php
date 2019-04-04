<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductMultistoreModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_to_multistore}}';
    }

    public function set($product)
	{

		$request = new $this;

		$request->product_id = $product['product_id'];
		$request->multistore_id = $product['multistore_id'];
		$request->quantity = $product['quantity'];

		$request->save();

	}

	public function clear(){
		$this->DeleteAll();
	}

	public function getMultistoreId($store_id){

		switch($store_id){
			case 75540:
				return 1;
			case 799510:
				return 2;
			default:
				return 4;
		}

	}

	
}