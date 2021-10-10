<?php
require_once "header.view.php";
?>
<?php require_once "logedperson.view.php"; ?>

<div class="container text-center">
    <h1>My Tasks</h1><br>
</div>
<div class="container text-center ">
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

<?php
require_once "footer.view.php";
?>
