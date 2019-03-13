<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ProductModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_product}}';
    }

    public function set($product)
	{

		$date = new \DateTime('today');

		$request = new $this;

		if (isset($product['model'])) {
			$request->model = $product['model'];
		}

		if (isset($product['sku'])) {
			$request->sku = $product['sku'];
		}

		if (isset($product['stock_status_id'])) {
			$request->stock_status_id = (int)$product['stock_status_id'];
		} else {
			$request->stock_status_id = 5;
		}

		if (isset($product['images'])) {
			$request->image = $product['images'][0];
		}

		if (isset($product['manufacturer_id'])) {
			$request->manufacturer_id = (int)$product['manufacturer_id'];
		}


		if (isset($product['price'])) {
			$request->price = (int)$product['price'];
		}

		if (isset($product['weight'])) {
			$request->weight = (float)$product['weight'];
		}

		$request->weight_class_id = 1;

		if (isset($product['length'])) {
			$request->length = (float)$product['length'];
		}

		if (isset($product['width'])) {
			$request->width = (float)$product['width'];
		}

		if (isset($product['height'])) {
			$request->height = (float)$product['height'];
		}

		$request->length_class_id = 1;

		$request->status = 0;

		$request->date_added = $date->format('Y-m-d H:i:s');
		$request->date_modified = $date->format('Y-m-d H:i:s');

		$request->save();

		return $request->product_id;
	}

    public function get($product_id){
    	return $this->find()
				->where(['product_id' => $product_id])
				->asArray()
				->one();
    }

    public function getBySku($sku){
    	return $this->find()
				->where(['sku' => $sku])
				->asArray()
				->one();
    }

    public function getAll()
	{
		return $this->find()
				->asArray()
				->orderBy(['product_id' => 'ASK'])
				->all();
	}

	public function upd($product){



		$request = $this->findOne($product['product_id']);

		if ( isset($product['price']) and !empty($product['price']) ) {
			$request->price = $product['price'];
		}

		if ( isset($product['quantity']) and !empty($product['quantity']) ) {
			$request->quantity = $product['quantity'];
		}

		if ( isset($product['manufacturer_id']) and !empty($product['manufacturer_id']) ) {
			$request->manufacturer_id = $product['manufacturer_id'];
		}

		if ( isset($product['width']) and !empty($product['width']) ) {
			$request->width = $product['width'];
		}

		if ( isset($product['heigth']) and !empty($product['heigth']) ) {
			$request->heigth = $product['heigth'];
		}

		if ( isset($product['length']) and !empty($product['length']) ) {
			$request->length = $product['length'];
		}

		if ( isset($product['weigth']) ) {
			$request->weigth = $product['weigth'];
		}

		if ( isset($product['model']) and !empty($product['model']) ) {
			$request->model = $product['model'];
		}

		if ( isset($product['sku']) and !empty($product['sku']) ) {
			$request->sku = $product['sku'];
		}

		if ( isset($product['upc']) and !empty($product['upc']) ) {
			$request->upc = $product['upc'];
		}

		$request->save();

	}

	
}