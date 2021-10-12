<?php
require_once "header.view.php";
?>

<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign In</p>
    <p class='text-center text-danger'>
        <?php if(!empty($_SESSION["_errors"]))
        {
            foreach ($_SESSION["_errors"] as $error)
            {
                echo $error;
            }
        }
        ?>
    </p>
    <form class="mx-1 mx-md-4" method="post" action="">

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
                <input type="email" id="email" name="email" class="form-control" required/>
                <label class="form-label" for="email">Your Email</label>
            </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
                <input type="password" id="password" name="password" class="form-control" required/>
                <label class="form-label" for="password">Password</label>
            </div>
        </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <input type="submit" id="signIn" name="signIn" class="btn btn-primary btn-lg" value="Sign In"/>
        </div>

    </form>

</div>

<?php
require_once "footer.view.php";
?>
