<?php

namespace App\Controllers;

use App\Models\ToDoItemModel;
use App\App\App;
use Symfony\Component\Routing\RouteCollection;

class ToDoItemController
{
    private $tdItem;

    public function __construct()
    {
        $this->tdItem = new ToDoItemModel();
    }

    public function add()
    {
        $title = 'Add new task';

        $message = '';
        if (!empty(@$_GET['success'])) {
            $message = htmlspecialchars($_GET['success']);
        }

        return view('pages.add', compact('title', 'message'));
    }

    public function edit(int $id, RouteCollection $routes)
    {
        session_start();

        if (!$_SESSION['userName']) {
            header('Location: /');
        }

        try {

            $result = App::get('db')->selectAll(
                'todo_list', " id = ${id}" 
            );

            if ($result) {
                $title = 'Edit this TO-DO TASK with ID ' . $id;
                $message = '';
        
                $toDoItem = isset($result[0]) ? $result[0] : '';
                return view('pages.edit', compact('title', 'message', 'toDoItem'));
            }
        }
        catch (\Exception $e) {
            header('Location: /');
        }
    }

    public function save()
    {
        session_start();

        if (!$_SESSION['userName']) {
            header('Location: /');
        }

        if (!isset($_POST['taskText']) || !isset($_POST['taskID'])) {
            header('Location: /');
        }

        $id = intval(htmlspecialchars($_POST['taskID']));
        $text = htmlspecialchars($_POST['taskText']);

        try {

            $result = App::get('db')->update(
                'todo_list',
                [
                    'column' => 'text',
                    'value' => '"' . $text . '"',
                    'id' => $id,
                ]
            );

            if ($result) {
                header('Location: /');
            }
        }
        catch (\Exception $e) {
            header('Location: /');
        }
    }

    public function complete(int $id, RouteCollection $routes)
    {

        session_start();

        if (!$_SESSION['userName']) {
            header('Location: /');
        }

        try {

            $result = App::get('db')->update(
                'todo_list',
                [
                    'column' => 'status',
                    'value' => 1,
                    'id' => $id,
                ]
            );

            if ($result) {
                header('Location: /');
            }
        }
        catch (\Exception $e) {
            header('Location: /');
        }
    }

    public function index()
    {
        session_start();

        $editable = false;
        if (isset($_SESSION['userName'])) {
            $editable = true;
        }

        $title = 'TO-DO List';

        global $page, $pages_count;
        $perpage = 3;

        if (empty(@$_GET['p']) || ($_GET['p'] <= 0)) {
            $_GET['p'] = 1;
        }
        $page = $_GET['p']; 

        $order = '';
        if (!empty(@$_GET['orderby'])) {
            $order = strip_tags($_GET['orderby']);
        }

        $count = App::get('db')->selectCount('todo_list');

        $pages_count = ceil($count / $perpage);
        if ($page > $pages_count) $page = $pages_count;
        $start_pos = ($page - 1) * $perpage;

        $toDoItems = App::get('db')->selectLimitOrder('todo_list', $start_pos, $perpage, $order);

        $orderby = '';
        if ($order) {
            $orderby = isset($_GET['p']) ? '&' : '?';
            $orderby .= 'orderby=' . $order;
        }

        return view('pages.index', compact('title', 'toDoItems', 'page', 'pages_count', 'orderby', 'editable'));
    }

    public function new()
    {
        try {

            if (empty($_POST)) {
                redirect('add');
            }

            $taskUser = htmlspecialchars($_POST['taskUser']);
            $taskText = htmlspecialchars($_POST['taskText']);

            $result = App::get('db')->insert(
                'todo_list',
                [
                    'userName' => $taskUser,
                    'email' => $_POST['taskEmail'],
                    'text' => $taskText,
                    'status' => 0
                ]
            );
 
            if ($result) {
                redirect('add?success=true');
            }
        }
        catch (\Exception $e) {
            header('Location: /add');
        }
    }
}