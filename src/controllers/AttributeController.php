<?php
namespace matroskin92\opencart\controllers;

use yii\helpers\ArrayHelper;
use matroskin92\opencart\models\AttributeModel as Attribute;
use matroskin92\opencart\models\AttributeDescriptionModel as AttributeDescription;
use matroskin92\opencart\models\ProductAttributeModel as ProductAttribute;

class AttributeController {

	public function get($name){

		$model_description = new AttributeDescription();
		return $model_description->getByName($name);

	}

	public function set($attr){

		$model_attr = new Attribute();
		$model_description = new AttributeDescription();

		$attr['attribute_id'] = $model_attr->set($attr);
		$model_model_description->setDescription($attr);

		return $attr['attribute_id'];

	}

	public function setProduct($product_id, $attribute_id, $text, $language_id = 1){

		$model_product_attr = new ProductAttribute();

		$model_product_attr->set(array(
			'product_id' => $product_id,
			'attribute_id' => $attribute_id,
			'language_id' => $language_id,
			'text' => $text
		));


	}

	public function getProduct($product_id, $language_id = 1){

		$model_product_attr = new ProductAttribute();
		$model_product_attr->get($product_id, $language_id);

	}
	
}

?>