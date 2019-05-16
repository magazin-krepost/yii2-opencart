<?php
namespace matroskin92\opencart\controllers;

use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\OrderModel 			as OrderModel;
use matroskin92\opencart\models\OrderProductModel	as OrderProductModel;
use matroskin92\opencart\models\OrderTotalModel		as OrderotalModel;
use matroskin92\opencart\models\OrderHistoryModel	as OrderHistoryModel;

class OrderController {

	public function getInfo($order_id){
		$model_order = new OrderModel();
		return $model_order->get($order_id);
	}

	public function getLast(){
		$model_order = new OrderModel();
		return $model_order->last();
	}

	public function getProduct($order_id){
		$model_product = new OrderProductModel();
		return $model_product->get($order_id);
	}

	public function getTotal($order_id){

		
		$model_total = new OrderotalModel();
		return 	ArrayHelper::index(
					$model_total->get($order_id), 
					'code'
				);
	}

	public function getAddress($data){

		$address = "";

		if ( $data['shipping_postcode'] != "Не указан" ) {
			$address .= $data['shipping_postcode']." ";
		}

		if ( $data['shipping_city'] != "Не указан" ) {
			$address .= $data['shipping_city']." ";
		}

		if ( $data['shipping_address_1'] != "Не указан" ) {
			$address .= $data['shipping_address_1']." ";
		}

		if ( $data['shipping_address_2'] != "Не указан" ) {
			$address .= $data['shipping_address_2'];
		}
		
		return $address;

	}

	public function setOrderId($order_id, $status_id){ // History

		$model_order = new OrderModel();
		$model_order_history = new OrderHistoryModel();

		$model_order->upd($order_id, array(
			'order_status_id' => $status_id
		));

		// $model_order_history->upd($order_id, array(
		// 	'order_status_id' => $status_id
		// ));



	}

}

?>