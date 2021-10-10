<?php
require_once "header.view.php";
?>


<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

    <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome
    <?= $_SESSION["userName"] ?>!</p>
    <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">
        <a href="/tasks">See tasks</a></p>

</div>

<?php
require_once "footer.view.php";
?>
