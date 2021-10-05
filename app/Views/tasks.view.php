<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Tasks</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container text-center">
    <h1>My Tasks</h1><br>
</div>
<div class="container text-center">
    <form action="" method="post">
        <label for="number">Task number:</label>
        <input type="text" id="number" name="number">
        <label for="description">Task description:</label>
        <input type="text" id="description" name="description">
        <input type="submit" id="submit" name="submit" value="Add New"><br><br>
    </form>
</div>
<div class="container text-center">
    <form action="/tasks/searchResults">
        <label for="number">Search task by number:</label>
        <input type="text" id="number" name="numberSearch">
        <input type="submit" id="search" name="search" value="Search">
    </form>
</div>
<br><br>
<table class="table container">
    <thead class="table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($tasks->getTasks() as $task): ?>
        <tr>
            <th scope="row"><?= $task->getNumber(); ?></th>
            <td><?= $task->getDescription(); ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>

</table>

</body>
</html>