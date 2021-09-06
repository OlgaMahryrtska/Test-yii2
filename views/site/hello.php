<?php
use yii\helpers\Html;
use yii\bootstrap4\Accordion;

echo Accordion::widget([
    'items' => [
        [
            'header' => 'Section 1',
            'content' => 'Mauris mauris ante, blandit et, ultrices a, suscipit eget...',
        ],
        [
            'header' => 'Section 2',
            'headerOptions' => ['tag' => 'h3'],
            'content' => 'Sed non urna. Phasellus eu ligula. Vestibulum sit amet purus...',
            'options' => ['tag' => 'div'],
        ],
    ],
    'options' => ['tag' => 'div'],
    'itemOptions' => ['tag' => 'div'],
    'headerOptions' => ['tag' => 'h3'],
    'clientOptions' => ['collapsible' => false],
]);