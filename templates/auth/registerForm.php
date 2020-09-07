<div class="row d-flex justify-content-center align-items-center content">
    <div class="col-md-5 well">
        <h4>Rejestracja</h4>
        <hr>
        <?php
        $register_error_message = null;
        if ($register_error_message != "") {
            echo '<div class="alert alert-danger"><strong>Error:</strong> ' . $register_error_message . '</div>';
        }
        ?>
        <form action="index.php?page=register" method="POST">
            <div class="form-group">
                <label for="">Nazwa</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Imię i nazwisko</label>
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Hasło</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="btnRegister" class="btn btn-primary" value="Zarejestruj">
                <a href="index.php" class="ml-5">Powrót do sklepu</a>
            </div>
        </form>
    </div>
</div>