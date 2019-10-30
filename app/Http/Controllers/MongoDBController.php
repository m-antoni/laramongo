<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDB\Client as Mongo;

class MongoDBController extends Controller
{
   	public function mongoConnect()
   	{
   		$mongo = new Mongo;

   		$connection = $mongo->laravelmongod->posts;

   		return $connection->find()->toArray();
   	}
}
