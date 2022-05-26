<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Object_;
use Predis\Client;

class RedisController extends Controller
{
    public function __construct()
    {
//        Laravel фасад Cache почему-то общается с Redis не глобально
//        потому использую Predis напрямую
        $this->redis = new Client([
            'host' => 'redis',
            'port' => '6379',
        ]);
    }

    public function index()
    {
        $keys = $this->redis->keys('*');
        $kv = collect($keys)->mapWithKeys(function ($key) {
            $value = $this->redis->get($key);
            return [$key => $value];
        });
        return $kv;
    }

    public function delete(string $key)
    {
        if (boolval($this->redis->del($key))) {
            $emptyObject = new \stdClass();
            return response()->json([
                'status' => true,
                'code' => 200,
                'data' => $emptyObject,
            ]);
        }
        return response()->json([
            'status' => false,
            'code' => 500,
            'data' => [
                'message' => 'Error info message',
            ],
        ]);
    }
}
