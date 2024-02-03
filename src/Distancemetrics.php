<?php

namespace FlatDuck\Distancemetrics;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use \Cache;
class Distancemetrics
{
    private $client;

    public function __construct() {
        $this->client = new Client([
            'base_uri' => 'https://api.mapbox.com/directions/v5/mapbox/driving/'
        ]);
    }

    public function routes(string $key, string $start_point, string $distination)
    {
        $coor = $start_point . ';' . $distination;
        $params = [
            'query' => [
               'alternatives' => 'true',
               'geometries' => 'geojson',
               'language' => 'en',
               'overview' => 'full',
               'steps' => 'true',
               'access_token' => $key,
            ]
         ];

        try {
            
            $object = Cache::rememberForever('look_'.$coor, 
                function () use ($coor, $params) {
                    $res = $this->client->request('GET', $coor, $params);
                    return (array)json_decode($res->getBody()->getContents(), true);
                }
            );
                     
            $collection = Distance::hydrate($object['routes']);
            $collection = $collection->flatten();
            
            return $collection;            
        
        } catch(GuzzleException $e) {
            // handle the exception
            return response()->json([
                    'error' => $e->getMessage()
                ], 500
            );
        }
    }
}