<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductImageModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_image}}';
    }

    public function set($product)
	{

		if (isset($product['image']) and count($product['image']) > 1) {
			
			unset($product['image'][0]);
			
			foreach($product['image'] as $image){

				$request = new $this;
				$request->product_id = $product['product_id'];
				$request->image = $image;
				$request->sort_order = 0;

			}
		}

	}

} 