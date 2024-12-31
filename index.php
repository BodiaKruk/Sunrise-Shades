<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="author" content="Bohdan-Ivan">
    <meta name="keywords" content="HTML, Meta Tags, Curtains, SunRise">
    <meta name="description" content="SunRise Shades">
    <title>SunRise Shades</title>

    <link rel="stylesheet" href="style.css">
    <link href="css/bootstrap.css" rel="stylesheet" >
    <link href = "fonts/bi/bootstrap-icons.css" rel = "stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

<div class="wrapper">
    <form action="">


        <h6>
            SunRise Shades
        </h6>

        <button class="settings-btn" onclick="toggleSettingsMenu()">⚙️ </button>

        <div class="settings-menu" id="settingsMenu">
            <h2>Settings</h2>

            <h3>Closing modes</h3>
            <div class="closing">
                <label>
                    <input type="checkbox" class="custom-checkbox"> Automatic closing and opening
                </label>
            </div>

            <div class="time-settings">
                <label for="open-time">Open time:</label>
                <input type="time" id="open-time" name="open-time">
            </div>

            <div class="time-settings">
                <label for="close-time">Close time:</label>
                <input type="time" id="close-time" name="close-time">
            </div>

            <button onclick="closeSettingsMenu()">Apply time</button>

            <button onclick="closeSettingsMenu()">Close menu</button>

            <div class="logout">
                <i class='bx bx-arrow-back'></i>
                <a href="select.html">Return to selection</a>

            </div>

            <div class="logout">
                <i class='bx bx-log-out'></i>
                <a href="login.html">Log out</a>

            </div>

        </div>

        <div>
            <h1>Name account</h1>
        </div>


        <div class="input-box">
            <i class='bx bxs-thermometer'></i>
            <input type="text" id="temperature" placeholder="Loading temperature..." required>
        </div>

        <div class="input-box">
            <i class='bx bx-sun' ></i>
            <input type="text" id="weather" placeholder="Loading weather..." required>
        </div>


        <div class="curtains-container">
            <div class="curtain curtain-left"></div>
            <img src="window-house-with-sun-rising-reflection-coming-from-side-illustration_1004218-236.avif" alt="Sunny Weather">
            <div class="curtain curtain-right"></div>
        </div>


        <div class="slider">
            <output for="fader-left" id="volume-left">0</output>
            <input type="range" id="fader-left" min="0" max="100" value="100" step="1" oninput="outputUpdateLeft(value)">

            <output for="fader-right" id="volume-right">0</output>
            <input type="range" id="fader-right" min="0" max="100" value="100" step="1" class="reverse-slider" oninput="outputUpdateRight(value)">
        </div>

        <div class="buttons">
            <button type="button" class="btn" onclick="openCurtains()">Open Curtains</button>
            <button type="button" class="btn" onclick="closeCurtains()">Close Curtains</button>
        </div>


        <script type="text/javascript">
            function outputUpdateLeft(vol) {
                var outputLeft = document.querySelector('#volume-left');
                var outputRight = document.querySelector('#volume-right');
                var faderRight = document.querySelector('#fader-right');

                outputLeft.value = vol;
                outputLeft.style.left = vol - 20 + 'px';

                // Оновлення правого повзунка у тому ж напрямку
                faderRight.value = vol;
                outputRight.value = vol;
                outputRight.style.left = vol - 20 + 'px';

            }

            function outputUpdateRight(vol) {
                var outputRight = document.querySelector('#volume-right');
                var faderLeft = document.querySelector('#fader-left');
                var outputLeft = document.querySelector('#volume-left');

                outputRight.value = vol;
                outputRight.style.left = vol - 20 + 'px';

                // Оновлення лівого повзунка у тому ж напрямку
                faderLeft.value = vol;
                outputLeft.value = vol;
                outputLeft.style.left = vol - 20 + 'px';
            }


            // Відкриття налаштувань плавне і гарне
            function toggleSettingsMenu() {
                var menu = document.getElementById('settingsMenu');
                menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
            }

            function closeSettingsMenu() {
                document.getElementById('settingsMenu').style.display = 'none';
            }


            function toggleSettingsMenu() {
                var menu = document.getElementById('settingsMenu');
                menu.classList.toggle('show'); // Додає або забирає клас 'show'
            }

            function closeSettingsMenu() {
                document.getElementById('settingsMenu').classList.remove('show'); // Забирає клас 'show'
            }

            document.getElementById("fader-left").addEventListener("input", function () {
                var value = this.value; // Значення повзунка (0–100)
                updateCurtains(value);
            });

            document.getElementById("fader-right").addEventListener("input", function () {
                var value = this.value; // Значення повзунка (0–100)
                updateCurtains(value);
            });

            function updateCurtains(value) {
                var leftCurtain = document.querySelector('.curtain-left');
                var rightCurtain = document.querySelector('.curtain-right');

                // Розрахунок ширини штор із мінімальною шириною (наприклад, 5%)
                var curtainWidth = Math.max(value / 2, 5); // Мінімальна ширина — 5%
                leftCurtain.style.width = curtainWidth + "%";
                rightCurtain.style.width = curtainWidth + "%";
            }


            // Відкрити штори (встановити слайдери на 100)
            function openCurtains() {
                const faderLeft = document.getElementById("fader-left");
                const faderRight = document.getElementById("fader-right");

                faderLeft.value = 0;
                faderRight.value = 0;

                updateCurtains(0); // Оновити положення штор
            }

            // Закрити штори (встановити слайдери на 0)
            function closeCurtains() {
                const faderLeft = document.getElementById("fader-left");
                const faderRight = document.getElementById("fader-right");

                faderLeft.value = 100;
                faderRight.value = 100;

                updateCurtains(100); // Оновити положення штор
            }


            document.addEventListener('DOMContentLoaded', function () {
                const autoCheckbox = document.querySelector('.custom-checkbox');
                const openTimeInput = document.getElementById('open-time');
                const closeTimeInput = document.getElementById('close-time');

                // Функція для оновлення стану полів часу
                function updateTimeInputsState() {
                    if (autoCheckbox.checked) {
                        openTimeInput.value = ""; // Обнулення часу відкриття
                        closeTimeInput.value = ""; // Обнулення часу закриття
                        openTimeInput.disabled = true; // Блокування поля
                        closeTimeInput.disabled = true; // Блокування поля
                    } else {
                        openTimeInput.disabled = false; // Розблокування поля
                        closeTimeInput.disabled = false; // Розблокування поля
                    }
                }

                // Додати обробник на зміну стану чекбокса
                autoCheckbox.addEventListener('change', updateTimeInputsState);

                // Ініціалізація стану при завантаженні сторінки
                updateTimeInputsState();
            });

            Telegram.WebApp.ready(); // Ініціалізація WebApp
            Telegram.WebApp.disableScrolling(); // Забороняє скролінг




        </script>



    </form>
</div>

</body>
</html>
