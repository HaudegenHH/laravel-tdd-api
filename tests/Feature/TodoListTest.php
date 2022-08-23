<?php

namespace Tests\Feature;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    // using this trait to run all the migrations first
    // ..and to clean the database every time the tests runs
    use RefreshDatabase;

    private $list;

    public function setUp():void {

        parent::setUp();
        $this->list = TodoList::factory()->create(['name' => 'my-list']);
    }

    public function test_fetch_todo_lists() {

        // moved into setUp:  TodoList::factory()->create(['name' => 'my-list']);

        $response = $this->getJson(route('todo-list.index'));

        // dd($response->json());

        // predict
        $this->assertEquals(1, count($response->json()));

        $this->assertEquals('my-list', $response->json()[0]['name']);

    }

    public function test_fetch_single_todo_list() {

        // created in setUp:  $list = TodoList::factory()->create();

        $response = $this->getJson(route('todo-list.show', $this->list->id))
                    ->assertOk()
                    ->json();

        $this->assertEquals($response['name'], $this->list->name);
    }
}
