<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductFilterModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_filter}}';
    }

    public function set($product_id, $filter_id)
	{

		$request = new $this;

		$request->product_id = $product_id;
		$request->filter_id = $filter_id;
		
		$request->save();

	}

} 