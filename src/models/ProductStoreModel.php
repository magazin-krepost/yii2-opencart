<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductStoreModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_to_store}}';
    }

    public function set($product)
	{

		$request = new $this;

		$request->product_id = $product['product_id'];

		if (isset($product['store_id'])) {
			$request->store_id = $product['store_id'];
		} else {
			$request->store_id = 0;
		}
		
		$request->save();
	}

} 