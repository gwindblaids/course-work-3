<?php
/**
 * @Author: gwindblaids
 * @Date:   2018-03-29 16:25:07
 * @Last Modified by:   gwindblaids
 * @Last Modified time: 2018-04-09 21:13:48
 */
header("Content-Type = text/html;charset=utf-8;");?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Курсовая работа</title>
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <link rel="shortcut icon" href="images/course_work.jpg" type="image/jpg">
    </head>
    <body>
<?php 
	require 'templates/header.php';
	require 'includes/database.php';
?>
        <form name="get_info" id="get_info" method="POST" action="index.php">
            <input type="text" name="query" class="query" placeholder="Начните вводить данные в зависимости от выбранного запроса" id="input_query" autocomplete="off" required>
            <br>
            <div class="radio">
                <input type="radio" name="select_table" value="fr" id="select_one">
                <label for="select_one">FR</label>
                <input type="radio" name="select_table" value="sr" id="select_two">
                <label for="select_two">SR</label>
                <input type="radio" name="select_table" value="cd" id="select_three">
                <label for="select_three">CD</label>
            </div>
            <div class="submit">
                <input type="submit" name="submit_button" value="Отправить" class="submit_button">
            </div>
        </form>
        <div class="description">
            <p><strong>FR (first request)</strong> - Время заданных суток, на которое пришлось максимальное количество
                клиентов.</p>
            <p><strong>SR (second request)</strong> - Список сотрудников заданной смены: ФИО, должность, домашний адрес,домашний и мобильный телефоны.</p>
            <p><strong>CD (create diagram)</strong> - Построить диаграмму: количество клиентов за заданный месяц с
                разбивкой по дням.</p>
        </div>
        <div id="diagramm"></div>
        <div id="content_query">
            <?php require 'includes/query.php';?>
        </div>
            <?php 
            require_once 'templates/footer.php';
            ?>
    </body>
    </html>