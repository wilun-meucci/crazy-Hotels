<?php
    function logout()
    {
        unset($_SESSION["user"]);
        unset($_SESSION["login"]);
    }
?>


