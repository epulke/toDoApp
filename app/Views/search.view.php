<?php
require_once "header.view.php";
?>

<body>
<div class="container text-center">
    <h1>Search Results</h1><br>
</div>
<table class="table container">
    <thead class="table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row"><?= $search->getNumber(); ?></th>
            <td><?= $search->getDescription(); ?></td>
        </tr>
    </tbody>

</table>
<div class="container text-center">
    <form action="" method="post">
        <label for="delete">Delete this task:</label>
        <input type="hidden" id="deleteNumber" name="deleteNumber" value="<?= $search->getNumber(); ?>">
        <input type="submit" id="delete" name="delete" value="Delete">
    </form>
</div>
<br><br>

</body>
</html>
