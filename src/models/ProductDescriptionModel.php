<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductDescriptionModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product_description}}';
    }

    public function set($product)
	{

		$request = new $this;

		$request->product_id = $product['product_id'];

		if (isset($product['language_id'])) {
			$request->language_id = $product['language_id'];
		} else {
			$request->language_id = 1;
		}

		$request->name = $product['name'];

		if (isset($product['description'])) {
			$request->description = $product['description'];
		}

		if (isset($product['tag'])) {
			$request->tag = $product['tag'];
		}

		if (isset($product['meta_title'])) {
			$request->meta_title = $product['meta_title'];
		} else {
			$request->meta_title = $product['name'];
		}

		if (isset($product['meta_description'])) {
			$request->meta_description = $product['meta_description'];
		}

		if (isset($product['meta_keyword'])) {
			$request->meta_keyword = $product['meta_keyword'];
		}

		if (isset($product['meta_h1'])) {
			$request->meta_h1 = $product['meta_h1'];
		}
		
		$request->save();
	}

	public function getByName($name){
		return $this->find()->where(['name' => $name])->asArray()->all();
	}

}