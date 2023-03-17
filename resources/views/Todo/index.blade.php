<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/app.css">
    <title>Todo list</title>
</head>
<body>
<div class="container">
    <h1 class="display-1 mb-4">Todo list</h1>
    <form action="{{ route('todo.store') }}" method="POST">
        @csrf
        <input type="text" name="text" class="p-2 task_input" placeholder="Write here..." id="input">
        <button class="btn btn-primary ms-3 btn-lg add_btn" type="submit">Add Todo</button>
    </form>
    <div>
        @foreach($todos as $todo)
            <div class="todo">
                <p>{{ $todo->text }}</p>
                <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary ms-3 btn-lg" id="deleteButton" type="submit">
                        <i class="fa-solid fa-trash-can"></i>
                    </button>
                </form>
                <form action="{{ route('todo.update', $todo->id) }}" method="POST" onsubmit="return handleUpdateFormSubmission(event)">
                    @csrf
                    @method('PATCH')
                    <input class="p-2 task_input update-input" type="text"  name="text" value="{{ $todo->text }}">
                    <button class="btn btn-primary ms-3 btn-lg" type="submit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
<script src="js/main.js"></script>
</html>
