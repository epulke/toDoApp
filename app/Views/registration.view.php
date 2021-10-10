<?php
require_once "header.view.php";
?>


<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Register</p>
    <?php if(!empty($message)) echo $message;?>
    <form class="mx-1 mx-md-4 needs-validation" method="post" action="">

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
                <input type="text" id="name" name="name" class="form-control" required/>
                <label class="form-label" for="name">Your Name</label>
            </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
                <input type="text" id="surname" name="surname" class="form-control" required/>
                <label class="form-label" for="surname">Your Surname</label>
            </div>
        </div>

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
                <input type="password" id="password1" name="password1" class="form-control" required/>
                <label class="form-label" for="password1">Password</label>
            </div>
        </div>

        <div class="d-flex flex-row align-items-center mb-4">
            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
            <div class="form-outline flex-fill mb-0">
                <input type="password" id="password2" name="password2" class="form-control" required/>
                <label class="form-label" for="password2">Repeat your password</label>
            </div>
        </div>

        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
            <input type="submit" id="register" name="register" class="btn btn-primary btn-lg" value="Register"/>
        </div>

    </form>

</div>


