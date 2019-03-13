<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductCategoryModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_to_category}}';
    }

    public function set($product_id, $category_id)
	{

		$request = new $this;

		$request->product_id = $product_id;
		$request->category_id = $category_id;

		$request->save();

	}
	
	public function get($product_id){
    	return $this->find()
    				->where(['product_id' => $product_id])
    				->asArray()
    				->all();
    }

}