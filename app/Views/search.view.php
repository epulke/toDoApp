<!DOCTYPE html>
<html lang="en">
<head>
    <title>Search Results</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
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
