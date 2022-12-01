<?php
namespace app\models\search;

use app\models\FoodType;
use yii\data\ActiveDataProvider;

class FoodTypeSearch extends FoodType {
    static public function search() {
        $query = parent::find() // ActiveQuery object
            ->where([parent::tableName() .'.deleted' => false]); // 'food_type.deleted' => false

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]); 
        
        return $dataProvider;
    }
}