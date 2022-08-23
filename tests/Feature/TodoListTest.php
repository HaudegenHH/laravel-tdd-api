<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{

    public function test_fetch_todo_list()
    {
        // every test has 3 phases: 1. preperation 2. action 3. assertion
        // or in other words: prepare, perform, predict

        // routeServiceProvider-> 'api/' is prefixed!
        //$response = $this->getJson('api/todo-list');

        // but instead of hardcoding the url, use the name
        $response = $this->getJson(route('todo-list.index'));

        //dd($response->json());

        $this->assertEquals(1, count($response->json()));
    }
}
