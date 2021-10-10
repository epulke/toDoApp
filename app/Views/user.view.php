<?php
require_once "header.view.php";
?>
<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
    <p class="text-center h3 fw-bold mb-5 mx-1 mx-md-4 mt-4">Your Information</p>
    <p class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Name: <?= $_SESSION["userName"]?></p>
    <p class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Surname: <?= $_SESSION["userSurname"]?></p>
    <p class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Email: <?= $_SESSION["userEmail"]?></p>
    <form class="mx-1 mx-md-4" method="post" action="">
        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <input type="submit" id="signOut" name="signOut" class="btn btn-primary btn-lg" value="Sign Out"/>
        </div>
    </form>

</div>

<?php
require_once "footer.view.php";
?>

