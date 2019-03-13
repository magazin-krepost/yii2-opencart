<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class AttributeModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_attribute}}';
    }

    public function set($attribute)
	{

		$request = new $this;

		if ( isset($attribute['attribute_group_id']) ) {
			$request->attribute_group_id = $attribute['attribute_group_id'];
		} else {
			$request->attribute_group_id = 1;
		}

		$request->sort_order = 0;
		$request->save();

		return $request->attribute_id;
	}

} 