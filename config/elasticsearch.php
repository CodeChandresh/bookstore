<?php

return [
    'hosts' => [
            'host' => env('ELASTICSEARCH_HOST', 'localhost:9200'),
    ],
    'index'=>env('ELASTICSEARCH_INDEX', 'books'),
    'index_type'=>env('ELASTICSEARCH_INDEX_TYPE', 'books_type')
];
