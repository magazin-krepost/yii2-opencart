<?php

namespace matroskin92\opencart\models;

use Yii;
use yii\db\ActiveRecord;

class ManufacturerStoreModel extends ActiveRecord
{
	public static function tableName()
    {
        return '{{oc_manufacturer_to_store}}';
    }

    public function set($manufacture){

        $request = new $this;

        $request->manufacturer_id = $manufacture['manufacturer_id'];

        if ( isset($manufacture['store_id']) ) {
            $request->store_id = $manufacture['store_id'];
        } else {
            $request->store_id = 0;
        }
        
        $request->save();
        
    }
	
}