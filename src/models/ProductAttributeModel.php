<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductAttributeModel extends ActiveRecord
{
	
	public static function tableName()
    {
        return '{{oc_product_attribute}}';
    }

    public function set($data)
	{

		$request = new $this;

		$request->product_id = $data['product_id'];
		$request->attribute_id = $data['attribute_id'];
		$request->language_id = $data['language_id'];
		$request->text = $data['text'];
		
		$request->save();

	}

    public function get($product_id, $language_id){
    	return $this->find()
    				->where(['product_id' => $product_id])
    				->andWhere(['language_id' => $language_id])
    				->asArray()
    				->all();
    }

}