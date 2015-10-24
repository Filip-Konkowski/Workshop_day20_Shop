
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Please register</h1>
            <div class="account-wall">
                <form class="form-signin" action="<?php $router->generate("registerFilePost") ?>" method="POST">
                <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                <input type="password" class="form-control" name="password1" placeholder="Password" required>
                <input type="password" class="form-control" name="password2" placeholder="Repeat password" required>
                <input type="text" class="form-control" name="name" placeholder="Name" required>
                <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                <input type="text" class="form-control" name="address" placeholder="Address" required><br>
                <button class="btn btn-lg btn-primary btn-block" type="submit" value="register">Register</button>
                </form>
            </div>
        </div>
    </div>
</div>