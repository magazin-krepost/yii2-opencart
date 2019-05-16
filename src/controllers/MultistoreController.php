<?php
namespace matroskin92\opencart\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\ProductMultistoreModel as Multistore;
use matroskin92\opencart\models\ProductModel as Product;

class MultistoreController {

	// Return int
	function getAvailabeFromStore($product_id, $multistore_id){

		$model_multistore = new Multistore();
		$result = $model_multistore->get(array(
			'product_id' => $product_id,
			'multistore_id' => $multistore_id
		));

		if (!empty($result)){
			return $result['quantity'];
		}

	}

	// Сумма по складам
	function getQuantity($product_id){

		$model_multistore = new Multistore();
		return $model_multistore->getSum($product_id);

	}


	function setAvailabeForStore($product_id, $multistore_id, $quantity){

		echo "Product_ID :: ".$product_id." / Multistore_ID :: ".$multistore_id." / Quantity :: ".$quantity."\n";

		$model_multistore = new Multistore();
		$model_product = new Product();

		// Сначала ищем, есть ли уже действующая запись
		$availabe = $model_multistore->get(array(
			'product_id' => $product_id,
			'multistore_id' => $multistore_id
		));
		
		// Если данные есть, то обновляем их
		if (!empty($availabe)){

			$model_multistore->upd(array(
				'id' => $availabe['id'],
				'quantity' => $quantity
			));

		// Пишем новые
		} else {

			$model_multistore->set(array(
				'product_id' => $product_id,
				'multistore_id' => $multistore_id,
				'quantity' => $quantity
			));

		}

		// Тут же обновляется общее количество
		$model_product->upd(array(
			'product_id' => $product_id,
			'quantity' => $model_multistore->getSum($product_id)
		));

	}

	function clear(){

		$model_multistore = new Multistore();
		return $model_multistore->clear();

	}
	
}

?>