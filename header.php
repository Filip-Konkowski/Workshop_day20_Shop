
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" id="E-shop" href="#">E-shop</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li id="register"><a href="<?= DIR_PATH?>register/">Register</a></li>
            </ul>
            <form class="navbar-form navbar-left" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" id="email" placeholder="email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default" id="login">Login</button>
            </form>
        </div>
    </div>
</nav>
