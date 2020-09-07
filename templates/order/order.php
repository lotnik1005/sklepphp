<?php
if (isset($_SESSION['user_name'])) {
    echo "Jest user";
} else {
?>
    <div class="row d-flex justify-content-center align-items-center content">
        <div class="col-md-8 well text-center">
            <h1>Aby złożyć zamówienie musisz się zalogować albo zarejestrować</h1>
            <a href="index.php?page=loginForm"><button class="btn btn-info mt-4">Zaloguj</button></a>
            <a href="index.php?page=registerForm"><button class="btn btn-info mt-4">Zaloguj</button></a>
        </div>
    </div>
<?php
}
?>