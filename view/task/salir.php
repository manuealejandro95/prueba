<?php
    session_start();

    session_destroy();

    header("location: /pruebalogin/sesion");
    exit();