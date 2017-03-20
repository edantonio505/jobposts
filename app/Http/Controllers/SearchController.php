<?php

namespace App\Http\Controllers;

use Elasticsearch\ClientBuilder;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    /*-----------------------------------------------
                        client
    ------------------------------------------------*/
    /*
     *
     *
     *
    */
    public function client()
    {
        return ClientBuilder::create()->build();
    }
    # -----------------------------------------------









    //************************************************








    /*-----------------------------------------------
                        createIndex
    ------------------------------------------------*/
    /*
     *
     *
     *
    */
    public function createIndex()
    {
      $client = $this->client();
      $params = [
            'index' => 'Jobpost_index',
            'body' => [
                'settings' => [
                    'number_of_shards' => 3,
                    'number_of_replicas' => 2
                ],
                'mappings' => [
                    'job_post' => [
                        '_source' => [
                            'enabled' => true
                        ],
                        'properties' => [
                            'description' => [
                              'type' => 'text'
                            ],
                            'salary' => [
                              'type' => 'integer'
                            ],
                            'title' => [
                              'type' => 'string'
                            ],
                            'description_sum' => [
                              'type' => 'string'
                            ]
                        ]
                    ]
                ]
            ]
        ];

    }
    # -----------------------------------------------









    //************************************************
}
