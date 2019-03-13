<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class FilterGroupModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_filter_group}}';
    }

    public function set()
	{
		$request = new $this;

		$request->sort_order = 0;
		$request->save();

		return $request->filter_group_id;
	}

} 