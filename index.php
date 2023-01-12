<?php
if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'];
require 'includes/header.php'; ?>

<main>
    <section class="section wrapper">
        <h1 class="section__title">Tu amigo y venicino Edu</h1>

        <div class="section__content">
            <ul class="section__ul">
                <li class="section__li">
                    <img class="section__img" src="assets/img/1.jfif" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/2.jfif" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/3.jpg" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/4.jpg" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/5.jpg" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/7.jpg" alt="Eduardo Fierro Pro">
                </li>
                <li class="section__li">
                    <img class="section__img" src="assets/img/6.gif" alt="Eduardo Fierro Pro">
                </li>
            </ul>
        </div>
    </section>
</main>

<?php require 'includes/footer.php'; ?>