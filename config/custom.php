<?php

return [
    'page_setup' => [
        'per_page' => env('GLOBAL_PER_PAGE', 12),
        'sort_by' => env('GLOBAL_SORT_BY', 'id'),
        'order_by' => env('GLOBAL_ORDER_BY', 'ASC')
    ],
    'messages' => [
        'crud' => [
            'add' => 'Successfully added ',
            'delete' => 'Successfully deleted ',
            'load' => 'Successfully loaded ',
            'update' => 'Successfully updated ',
            'sent' => 'Successfully sent ',
        ],
    ],
];
