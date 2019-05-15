<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductBusinessru extends ActiveRecord {

	public static function tableName(){
		return '{{oc_product_to_businessru}}';
  }

  public function set($product){

		$request = new $this;

		$request->product_id = $product['product_id'];
		$request->good_id = $product['good_id'];

		$request->save();

	}

	public function getGoodId($product_id){
		return $this->find()->where(['product_id' => $product_id])->asArray()->one();
	}

	public function getProductId($good_id){
		return $this->find()->where(['good_id' => $good_id])->asArray()->one();
	}

} 