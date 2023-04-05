<?php
    require_once __DIR__ . './incs/data.php';
    require_once __DIR__ . './incs/functions.php';
    require_once __DIR__ . './incs/connection.php';

    if (!empty($_POST)) {
        $date = $_POST['date'];
        $time = $_POST['time'];
        $person = $_POST['person'];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $current_date = time();

        if (strtotime($date) < $current_date) {
            echo
            "
            <script> alert('Неверная дата'); </script>
            ";
        } if (!empty($time) && !empty($person)) {

        } if (strlen($name) < 3) {
            echo
            "
            <script> alert('Введите имя больше трех символов!'); </script>
            ";
        } if (strlen($message) < 20) {
            echo
            "
            <script> alert('Введите сообщение больше 20 символов!'); </script>
            ";
        } else {
            mysqli_query($conn, "INSERT INTO `reservations`(`Name`, `Message`, `Time`, `Date`, `Person`) VALUES ('$name','$message','$time','$date','$person')");
            echo
            "
            <script> alert('Форма успешно отправлена!'); </script>
            ";
        }
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/styles/fontello.css">
    <link rel="stylesheet" href="./assets/styles/animate.css">
    <link rel="stylesheet" href="./assets/styles/style.css">
    <link rel="stylesheet" href="./assets/styles/style_res.css">
    <title>Reservation</title>
</head>
<body>
    <div class="wrapper d-flex flex-column">
        <header class="header">
            <div class="container-fluid">
                <div class="logo">
                    <div class="logo-icon"></div>
                    <h1 class="logo-text">LoveFoood</h1>
                </div>
                <nav class="nav">
                    <ul>
                        <li><a href="#" class="links active">Бронирование</a></li>
                        <li><a href="index.html" class="links">Главная</a></li>
                    </ul>
                </nav>
                <div class="burger-menu">
                    <a href="" class="burger-menu_button">
                        <span class="burger-menu_lines"></span>
                    </a>
                    <nav class="burger-menu_nav">
                        <a href="#" class="burger-menu_link">Бронирование</a>
                        <a href="index.php" class="burger-menu_link">Главная</a>
                    </nav>
                    <div class="burger-menu_overlay"></div>
                </div>
            </div>
        </header>

    <div class="wrapper-main d-flex flex-column justify-content-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-12 w-hours d-flex flex-column justify-content-between align-items-center hours">
                    <div class="title-hours d-flex justify-content-between flex-column align-items-center">
                        <h2 class="text-white">Working hours</h2>
                        <img src="./assets/images/delim_small.png" alt="" class="delim">
                    </div>
                    <div class="spacer-module"></div>
                    <div class="info-hours d-flex flex-column justify-content-center align-items-center">
                        <span class="text-white text-center">Monday — Friday</span>
                        <span class="text-white text-center">9:00 am – 2:00 pm (breakfast, lunch)</span>
                        <span class="text-white text-center">4:00 pm - 10:00pm (dinner)</span>
                    </div>
                    <div class="spacer-module"></div>
                    <div class="info-hours d-flex flex-column justify-content-center align-items-center">
                        <span class="text-white text-center">Saturday – Sunday</span>
                        <span class="text-white text-center">10:00 am – 3:00 pm (breakfast, lunch)</span>
                        <span class="text-white text-center">6:00 pm - 12:00pm (dinner)</span>
                    </div>
                    <div class="spacer-module"></div>
                    <span class="text-white mt-3 ph-number-hours">0(658) 567-43-21</span>
                </div>
                <div class="col-xl-8 col-md-12 d-flex align-items-center justify-content-center form flex-column p-2">
                    <div class="reservations">
                        <h2 class="text-center">Table reservations</h2>
                    </div>
                    <img src="./assets/images/delim_small.png" alt="" class="delim">
                    <form class="forma d-flex flex-column align-items-center" method="post" id="myForm" autocomplete="off">
                        <div class="container">
                            <div class="form-row d-flex">
                                <div class="form-group col-md-6">
                                    <input type="date" class="form-control" required id="inputEmail4" placeholder="Select date" name="date">
                                </div>
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name="time" required>
                                    <option selected hidden>Select Value</option>
                                    <option value="9am">9am</option>
                                    <option value="10am">10am</option>
                                    <option value="11am">11am</option>
                                    <option value="12am">12am</option>
                                    <option value="1pm">1pm</option>
                                    <option value="2pm">2pm</option>
                                    <option value="3pm">3pm</option>
                                    <option value="4pm">4pm</option>
                                    <option value="5pm">5pm</option>
                                    <option value="6pm">6pm</option>
                                    <option value="7pm">7pm</option>
                                </select>
                            </div>
                            <div class="form-row d-flex mt-4 justify-content-between">
                                <select class="form-select" aria-label="Пример выбора по умолчанию" name="person" required>
                                    <option selected hidden>Select Value</option>
                                    <option value="1 person">1 person</option>
                                    <option value="2 person">2 person</option>
                                    <option value="3 person">3 person</option>
                                    <option value="4 person">4 person</option>
                                </select>
                                <div class="form-group col-md-6">
                                    <input required type="text" class="form-control" id="inputPassword4" placeholder="Name" name="name">
                                </div>
                            </div>
                            <div class="form-row d-flex mt-4">
                                <div class="form-group col-md-6 w-100">
                                    <input required type="text" class="form-control" id="Message" placeholder="Message" name="message">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-examples fs-6 mt-4" type="submit">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="./assets/js/bootstrap.bundle.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <script src="./assets/js/jquery.js"></script>
    <script src="./assets/js/burger.js"></script>
    <script src="./assets/js/main.js"></script>
</body>
</html>