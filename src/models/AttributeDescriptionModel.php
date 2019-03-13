<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class AttributeDescriptionModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_attribute_description}}';
    }

    public function set($attribute)
	{

		$request = new $this;

		$request->attribute_id = $attribute['attribute_id'];

		if ( isset($attribute['language_id']) ) {
			$request->language_id = $attribute['language_id'];
		} else {
			$request->language_id = 1;
		}
		
		$request->name = $attribute['name'];

		$request->save();

	}

	public function getByName($name)
	{
		return $this->find()->where(['name' => $name])->asArray()->one();
	}

} 