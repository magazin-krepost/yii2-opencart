<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class CategoryModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_category}}';
    }

    public function set($category)
    {
        $date = new \DateTime('today');

        $request = new $this;

        if (isset($category['image'])) {
            $request->image = $category['image'];
        }

        if (isset($category['parent_id'])) {
            $request->parent_id = $category['parent_id'];
        }

        if (isset($category['top'])) {
            $request->top = $category['top'];
        }

        $request->column = 1;
        $request->status = 1;
        $request->date_added = $date->format('Y-m-d H:i:s');
        $request->date_modified = $date->format('Y-m-d H:i:s');
        $request->save();

        return $request->category_id;
    }

}