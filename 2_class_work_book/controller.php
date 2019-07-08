<?php

spl_autoload_register(function ($class) {
    include $class . '.php';
});

if ($_POST) {
    $books = new books;
    $alert = array();

    switch ($_POST['action']) {
        case "create":
            // set book property values
            $title = $_POST['title-id'];
            $status = $_POST['status'];
            // add book
            if ($title !== '' && $books->create($title, $status)) {
                $alert[] = "<p class='alert alert-success'>Book upload.</p>";
            } else {
                $alert[] = "<p class='alert alert-danger'>Unable to upload book.</p>";
            }
            break;
        case "find":
            $title_id = $_POST['title-id'];
            $result = $books->getBooks($title_id);

            if (count($result) > 0) {
                $alert[] = "<p class='alert alert-success'>Book finded. <br/>" .
                    "title: " . $result['0']->title . "<br/>" .
                    "id: " . $result['0']->id . "<br/>" .
                    "status: " . $result['0']->status . "</p>";
            } else {
                $alert[] = "<p class='alert alert-danger'>Unable to fined book.</p>";
            }
            break;
        case "update":
            // set user property values
            $id = $_POST['title-id'];
            $status = $_POST['status'];
            // create user
            if ($books->update($id, $status)) {
                $alert[] = "<p class='alert alert-success'>Book status updated.</p>";
            } else {
                $alert[] = "<p class='alert alert-danger'>Book status not updated.</p>";
            }
            break;
    }
}