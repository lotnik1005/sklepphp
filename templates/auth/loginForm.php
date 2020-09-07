<div class="row d-flex justify-content-center align-items-center content">
    <div class="col-md-5 well">
        <h4>Logowanie</h4>
        <hr>
        <?php
        $login_error_message = null;
        if ($login_error_message != "") {
            echo '<div class="alert alert-danger"><strong>Error:</strong> ' . $login_error_message . '</div>';
        }
        ?>
        <form action="index.php?page=login" method="POST">
            <div class="form-group">
                <label for="">Użytkownik/Email</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="">Hasło</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="submit" name="btnLogin" class="btn btn-primary" value="Zaloguj">
                <a href="index.php?page=registerForm" class="ml-5">Rejestracja</a>
            </div>
        </form>
    </div>
</div>