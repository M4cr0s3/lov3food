<?php

$conn = mysqli_connect('localhost', 'root', '', 'lovefood');

if ($conn->connect_error) {
    die('Не удалось подключиться к БД' . $conn->connect_error);
}