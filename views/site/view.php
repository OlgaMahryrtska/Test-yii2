<?php
use yii\widgets\DetailView;
?>
<h2> The cart of the goods</h2>
<?php

echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'price',
        'unit',    
        'image: image',                                       
       
    ],
]);