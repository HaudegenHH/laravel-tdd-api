<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index() {

        $lists = TodoList::all();
        return response($lists);
    }

    public function show(TodoList $list) {

        // $list = TodoList::findOrFail($todolist);

        return response($list);
    }

    public function store(Request $request) {

        $list = TodoList::create($request->all());

        // test pass as soon as possible..
        // return response('', 201);
        // return response($list, Response::HTTP_CREATED);
        // or just:
        return $list;
    }
}
