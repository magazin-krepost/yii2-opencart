<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class FilterDescriptionModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_filter_description}}';
    }

    public function set($filter_id, $filter_group_id, $name)
	{
		$request = new $this;

		$request->filter_id = $filter_id;
		$request->language_id = 1;
		$request->filter_group_id = $filter_group_id;
		$request->name = $name;

		$request->save();
	}

	public function getByName($name, $filter_group_id)
	{
		return $this->
				find()->
				where(['name' => $name])->
				andWhere(['filter_group_id' => $filter_group_id])->
				asArray()->
				one();
	}


} 