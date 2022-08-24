<?php

namespace Tests;

use App\Models\TodoList;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp():void {

        parent::setUp();

        // every test without exception handling
        $this->withoutExceptionHandling();
    }

    public function createTodoList($args = []) {

        // by default we (try to) create without arguments
        return TodoList::factory()->create($args);
    }

}
