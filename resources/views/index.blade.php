<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png">
    <title>Shared on THEMELOCK.COM - Medical & Health Care
        HTML Template</title>
    <meta name="description"
        content="Your trusted source for expert healthcare services and medical information. Providing personalized care, advanced treatments, and reliable health resources to help you achieve better health.">
    <link rel="stylesheet" href="assets/css/plugins/plugins.css">
    <link rel="stylesheet" href="assets/css/plugins/magnifying-popup.css">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- header area start -->
    <!-- header area start -->
    <header class="header-one header--sticky">
        <div class="header-top-area">
            <div class="container-full-header">
                <div class="col-lg-12">
                    <div class="header-top">
                        <div class="left">
                            <div class="map-area">
                                <i class="fa-light fa-clock"></i>
                                <!-- Affichage de la vraie date et heure -->
                                <a href="#">
                                    <span id="currentDateTime"></span>
                                </a>
                            </div>
                        </div>
                        <div class="right">
                            <div class="map-area">
                                <i class="fa-regular fa-phone"></i>
                                <a href="#">Urgence : +225 01 23 45 67 89</a>
                            </div>
                            <div class="social-area-tranaparent">
                                <span>Suivez-nous :</span>
                                <ul>
                                    <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/kw-legal-technologie"><i
                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                                    <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-full-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-wrapper-1">
                        <div class="logo-area-start">
                            <a href="index.html" class="logo">
                                <img src="assets/images/logo/logo.svg" alt="Elephant Santé">
                            </a>
                            <div class="nav-area">
                                <ul>
                                    <li class="main-nav"><a href="index.html">Accueil</a></li>
                                    <li class="main-nav"><a href="about.html">À propos</a></li>
                                    <li class="main-nav"><a href="services.html">Services</a></li>
                                    <li class="main-nav"><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="header-right">
                            <div class="input-area">
                                <input id="myInput" type="text" placeholder="Rechercher...">
                                <i class="fa-light fa-magnifying-glass"></i>
                            </div>
                            <a href="{{ route('login') }}" class="rts-btn btn-primary">Connexion</a>

                            <div class="menu-btn" id="menu-btn">
                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect y="14" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect y="7" width="20" height="2" fill="#1F1F25"></rect>
                                    <rect width="20" height="2" fill="#1F1F25"></rect>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- header area end -->
    <!-- header area end -->

    <!-- banner area start -->
    <div class="banner-area-start">
        <div class="container-full-header">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-area-one rts-section-gap bg_image">

                        <!-- Banner Content -->
                        <div class="banner-content-area">
                            <div class="pre-title wow fadeInUp" data-wow-delay=".0s" data-wow-duration=".8s">
                                <img src="assets/images/banner/icon/08.svg" alt="icons">
                                <span>Votre santé, notre priorité</span>
                            </div>

                            <h1 class="title wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s">
                                Prenez vos rendez-vous médicaux<br>
                                en toute simplicité
                            </h1>

                            <p class="disc wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".8s">
                                Éléphant Santé vous permet de réserver vos consultations rapidement,
                                de choisir votre médecin et de suivre vos rendez-vous en ligne.
                            </p>

                            <!-- Sélecteurs de recherche -->
                            <div class="select-area-down wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                                <form action="#" method="get" accept-charset="utf-8">
                                    <select name="departement" class="mySelect">
                                        <option value="0" selected>Choisissez un service</option>
                                        <option value="1">Cardiologie</option>
                                        <option value="2">Pédiatrie</option>
                                        <option value="3">Dermatologie</option>
                                        <option value="4">Psychiatrie</option>
                                    </select>
                                </form>

                                <form class="select-2" action="#" method="get" accept-charset="utf-8">
                                    <select name="medecin" class="my_select2">
                                        <option value="0" selected>Choisissez un médecin</option>
                                        <option value="1">Dr. Kouamé</option>
                                        <option value="2">Dr. Traoré</option>
                                        <option value="3">Dr. Amani</option>
                                    </select>
                                </form>

                                <a href="#" class="rts-btn btn-primary">Trouver un médecin</a>
                            </div>
                        </div>

                        <!-- Image du banner -->
                        <div class="person-image">
                            <img src="{{ asset('assets/images/banner/01.png') }}" alt="Éléphant Santé">

                            <div class="single-tag wow zoomIn" data-wow-delay=".2s" data-wow-duration=".8s">
                                <img src="{{ asset('assets/images/banner/icons/heart.svg') }}" alt="cardio">
                                <span>Cardiologie</span>
                            </div>
                            <div class="single-tag two wow zoomIn" data-wow-delay=".4s" data-wow-duration=".8s">
                                <img src="{{ asset('assets/images/banner/icons/neuron.svg') }}" alt="neuro">
                                <span>Neurologie</span>
                            </div>
                            <div class="single-tag three wow zoomIn" data-wow-delay=".6s" data-wow-duration=".8s">
                                <img src="{{ asset('assets/images/banner/icons/orthopedics.svg') }}" alt="ortho">
                                <span>Orthopédie</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- banner area end -->

    <!-- short service -->
    <div class="short-service-area rts-section-gap2">
        <div class="container">
            <div class="row g-5">

                <!-- Prendre rendez-vous -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".2s"
                    data-wow-duration=".8s">
                    <a href="appoinment.html" class="single-short-service">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/01.svg') }}" alt="service">
                        </div>
                        <h5 class="title">
                            Prendre <br> Rendez-vous
                        </h5>
                    </a>
                </div>

                <!-- Trouver un médecin -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".4s"
                    data-wow-duration=".8s">
                    <a href="doctors-one.html" class="single-short-service">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/02.svg') }}" alt="service">
                        </div>
                        <h5 class="title">
                            Trouver <br> un Médecin
                        </h5>
                    </a>
                </div>

                <!-- Appel d'urgence -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".6s"
                    data-wow-duration=".8s">
                    <a href="tel:+2250102030405" class="single-short-service">
                        <div class="icon">
                            <img src="assets/images/service/03.svg" alt="service">
                        </div>
                        <h5 class="title">
                            Urgence <br> 24h/24
                        </h5>
                    </a>
                </div>

                <!-- Assistance -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 wow fadeInRight" data-wow-delay=".8s"
                    data-wow-duration=".8s">
                    <a href="contact.html" class="single-short-service">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/04.svg') }}" alt="service">
                        </div>
                        <h5 class="title">
                            Assistance <br> en Ligne
                        </h5>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- short service end -->


    <!-- service area start -->
    <div class="service-area position-relative rts-section-gapBottom">
        <div class="container">
            <div class="row g-5">

                <!-- Introduction -->
                <div class="col-lg-6 col-md-6">
                    <div class="title-wrapper-left">
                        <span class="pre wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s">
                            Nos Services
                        </span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".8s">
                            Nous offrons une large <br>
                            gamme de services <br>
                            médicaux et en ligne
                        </h2>
                        <p class="disc wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                            Avec Éléphant Santé, vous pouvez réserver vos consultations en quelques clics,
                            accéder à des spécialistes et suivre vos rendez-vous, le tout en ligne.
                        </p>
                    </div>
                </div>

                <!-- Service 1 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/09.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Cardiologie</h4>
                        <p class="disc">
                            Suivi du cœur, dépistage et traitement des maladies cardiovasculaires.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                <!-- Service 2 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/10.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Neurologie</h4>
                        <p class="disc">
                            Prise en charge des maladies du cerveau, des nerfs et du système nerveux.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                <!-- Service 3 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".2s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/11.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Soins Dentaires</h4>
                        <p class="disc">
                            Consultations dentaires, nettoyage, soins préventifs et esthétiques.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                <!-- Service 4 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/12.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Santé Mentale</h4>
                        <p class="disc">
                            Psychiatrie, psychologie et accompagnement pour le bien-être mental.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                <!-- Service 5 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/13.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Médecine Générale</h4>
                        <p class="disc">
                            Consultations, suivi médical et prise en charge des maladies courantes.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

                <!-- Service 6 -->
                <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".8s" data-wow-duration=".8s">
                    <div class="single-service-area">
                        <div class="icon">
                            <img src="{{ asset('assets/images/service/14.svg') }}" alt="service">
                        </div>
                        <h4 class="title">Orthopédie</h4>
                        <p class="disc">
                            Diagnostic et traitement des os, articulations et blessures musculaires.
                        </p>
                        <a href="service-details.html" class="btn-transparent">En savoir plus <i
                                class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Image décorative -->
        <div class="service-content-iamge">
            <img src="{{ asset('assets/images/service/elephant-services.png') }}" alt="Nos Services">
        </div>
    </div>

    <!-- srvice area end -->


    <!-- why choose us section start -->
    <div class="why-choose-us-area">
        <div class="container-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="why-choose-area-wrapper bg-light rts-section-gap">
                        <div class="container">
                            <div class="row align-items-end">

                                <!-- Texte à gauche -->
                                <div class="col-xl-5 col-lg-6 mb_md--80 mb_sm--60">
                                    <div class="why-choose-us-area-wrapper-main">
                                        <div class="title-wrapper-left">
                                            <span class="pre wow fadeInUp" data-wow-delay=".2s"
                                                data-wow-duration=".8s">
                                                Pourquoi nous choisir ?
                                            </span>
                                            <h2 class="title wow fadeInUp" data-wow-delay=".4s"
                                                data-wow-duration=".8s">
                                                Pourquoi nos patients nous recommandent
                                            </h2>
                                            <p class="disc wow fadeInUp" data-wow-delay=".6s"
                                                data-wow-duration=".8s">
                                                Avec <strong>Éléphant Santé</strong>, bénéficiez de soins fiables,
                                                rapides et
                                                accessibles, avec un suivi 100% en ligne ou en présentiel.
                                            </p>
                                        </div>

                                        <div class="why-choose-us-main-wrapper">

                                            <!-- Avantage 1 -->
                                            <div class="single-choose-us wow fadeInLeft" data-wow-delay=".2s"
                                                data-wow-duration=".8s">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/service/icon/01.svg') }}"
                                                        alt="service">
                                                </div>
                                                <div class="info">
                                                    <h6 class="title">Soins centrés sur le patient</h6>
                                                    <p>Chaque consultation est personnalisée pour votre bien-être.</p>
                                                </div>
                                            </div>

                                            <!-- Avantage 2 -->
                                            <div class="single-choose-us wow fadeInLeft" data-wow-delay=".4s"
                                                data-wow-duration=".8s">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/service/icon/02.svg') }}"
                                                        alt="service">
                                                </div>
                                                <div class="info">
                                                    <h6 class="title">Assistance d'urgence</h6>
                                                    <p>Un médecin disponible rapidement en cas de besoin urgent.</p>
                                                </div>
                                            </div>

                                            <!-- Avantage 3 -->
                                            <div class="single-choose-us wow fadeInLeft" data-wow-delay=".6s"
                                                data-wow-duration=".8s">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/service/icon/03.svg') }}"
                                                        alt="service">
                                                </div>
                                                <div class="info">
                                                    <h6 class="title">Médecins qualifiés</h6>
                                                    <p>Un réseau d’experts reconnus dans plusieurs spécialités.</p>
                                                </div>
                                            </div>

                                            <!-- Avantage 4 -->
                                            <div class="single-choose-us wow fadeInLeft" data-wow-delay=".8s"
                                                data-wow-duration=".8s">
                                                <div class="icon">
                                                    <img src="{{ asset('assets/images/service/icon/04.svg') }}"
                                                        alt="service">
                                                </div>
                                                <div class="info">
                                                    <h6 class="title">Urgence 24h/24</h6>
                                                    <p>Contactez-nous à tout moment, nous sommes là pour vous.</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Image à droite -->
                                <div class="col-xl-6 col-lg-6 offset-xl-1">
                                    <div class="right-whychoose-us-style-one">
                                        <div class="feature-bg-primary">
                                            <img src="{{ asset('assets/images/feature/02.webp') }}"
                                                alt="Éléphant Santé">
                                        </div>
                                        <div class="thumbnail-image">
                                            <img src="{{ asset('assets/images/feature/01.png') }}"
                                                alt="Consultation en ligne">
                                        </div>
                                        <div class="inner-content">
                                            <div class="top">
                                                <h3 class="title">Besoin d'aide ?</h3>
                                                <div class="time-shedule">
                                                    <img src="{{ asset('assets/images/feature/03.svg') }}"
                                                        alt="Horaires">
                                                    <span>24/7</span>
                                                </div>
                                            </div>
                                            <div class="call-us">
                                                <img src="{{ asset('assets/images/feature/04.svg') }}"
                                                    alt="Téléphone">
                                                <span>+225 01 02 03 04 05</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- row -->
                        </div> <!-- container -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- why choose us section end -->



    <!-- why team us section start -->
    <div class="team-area-start">
        <div class="container-80">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-style-wrapper bg-light rts-section-gap">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="title-between-area">
                                        <div class="title-wrapper-left">
                                            <span class="pre wow fadeInUp" data-wow-delay=".2s"
                                                data-wow-duration=".8s">
                                                Nos Médecins
                                            </span>
                                            <h2 class="title wow fadeInUp" data-wow-delay=".4s"
                                                data-wow-duration=".8s">
                                                Découvrez notre <br> équipe d'experts
                                            </h2>
                                        </div>
                                        <p class="disc wow fadeInUp" data-wow-delay=".6s" data-wow-duration=".8s">
                                            L’équipe d’<strong>Éléphant Santé</strong> est composée de médecins
                                            qualifiés,
                                            passionnés par la santé de nos patients et experts dans leurs spécialités.
                                            Vous êtes entre de bonnes mains.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-5 mt--20">
                                <div class="col-lg-12">
                                    <div class="team-swiper-wrapper-1">
                                        <div class="swiper team-swiper-container-h1">
                                            <div class="swiper-wrapper">

                                                <!-- Médecin 1 -->
                                                <div class="swiper-slide">
                                                    <div class="single-team-area-start">
                                                        <a href="doctor-details.html" class="thumbnail">
                                                            <img src="{{ asset('assets/images/team/01.jpg') }}"
                                                                alt="team">
                                                        </a>
                                                        <div class="bottom">
                                                            <a href="doctor-details.html">
                                                                <h6 class="title">Dr. Rachel Evans</h6>
                                                            </a>
                                                            <p>Spécialiste en Oncologie</p>
                                                            <div class="social-area-tranaparent">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-youtube"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-twitter"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Médecin 2 -->
                                                <div class="swiper-slide">
                                                    <div class="single-team-area-start">
                                                        <a href="doctor-details.html" class="thumbnail">
                                                            <img src="{{ asset('assets/images/team/02.jpg') }}"
                                                                alt="team">
                                                        </a>
                                                        <div class="bottom">
                                                            <a href="#">
                                                                <h6 class="title">Dr. Emily Carter</h6>
                                                            </a>
                                                            <p>Spécialiste en Pédiatrie</p>
                                                            <div class="social-area-tranaparent">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-youtube"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-twitter"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Médecin 3 -->
                                                <div class="swiper-slide">
                                                    <div class="single-team-area-start">
                                                        <a href="doctor-details.html" class="thumbnail">
                                                            <img src="{{ asset('assets/images/team/03.jpg') }}"
                                                                alt="team">
                                                        </a>
                                                        <div class="bottom">
                                                            <a href="doctor-details.html">
                                                                <h6 class="title">Dr. Lisa Morgan</h6>
                                                            </a>
                                                            <p>Spécialiste en Cardiologie</p>
                                                            <div class="social-area-tranaparent">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-youtube"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-twitter"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Médecin 4 -->
                                                <div class="swiper-slide">
                                                    <div class="single-team-area-start">
                                                        <a href="doctor-details.html" class="thumbnail">
                                                            <img src="{{ asset('assets/images/team/04.jpg') }}"
                                                                alt="team">
                                                        </a>
                                                        <div class="bottom">
                                                            <a href="doctor-details.html">
                                                                <h6 class="title">Dr. Jessica Lee</h6>
                                                            </a>
                                                            <p>Spécialiste en Neurologie</p>
                                                            <div class="social-area-tranaparent">
                                                                <ul>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-facebook-f"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-linkedin-in"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-youtube"></i></a>
                                                                    </li>
                                                                    <li><a href="#"><i
                                                                                class="fa-brands fa-twitter"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="swiper-pagination"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- why team us section end -->

    <!-- rts testimonials area start -->
    <div class="rts-testimonials-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-area-center">
                        <span class="pre">Avis de nos patients</span>
                        <h2 class="title text-center">Ils nous font <br> confiance</h2>
                    </div>
                </div>
            </div>
            <div class="row mt--0 g-5">
                <div class="col-lg-12">
                    <div class="swiper swiper-container-h1">
                        <div class="swiper-wrapper">

                            <!-- Témoignage 1 -->
                            <div class="swiper-slide">
                                <div class="single-testimonials-style">
                                    <div class="quots">
                                        <img src="{{ asset('assets/images/testimonials/quotes.png') }}"
                                            alt="témoignage">
                                    </div>
                                    <p class="disc">
                                        Grâce à Éléphant Santé, j’ai pu prendre un rendez-vous rapidement et être suivi
                                        par un excellent cardiologue. Service rapide et fiable !
                                    </p>
                                    <div class="author-area">
                                        <a href="#" class="img">
                                            <img src="{{ asset('assets/images/testimonials/01.png') }}"
                                                alt="patient">
                                        </a>
                                        <div class="info">
                                            <h6 class="name">David Konan</h6>
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shape">
                                        <img src="{{ asset('assets/images/testimonials/02.png') }}" alt="service">
                                    </div>
                                </div>
                            </div>

                            <!-- Témoignage 2 -->
                            <div class="swiper-slide">
                                <div class="single-testimonials-style">
                                    <div class="quots">
                                        <img src="{{ asset('assets/images/testimonials/quotes.png') }}"
                                            alt="témoignage">
                                    </div>
                                    <p class="disc">
                                        L’interface est simple à utiliser et j’ai eu toutes mes analyses en ligne.
                                        Je recommande Éléphant Santé à 100 % !
                                    </p>
                                    <div class="author-area">
                                        <a href="#" class="img">
                                            <img src="{{ asset('assets/images/testimonials/03.png') }}"
                                                alt="patient">
                                        </a>
                                        <div class="info">
                                            <h6 class="name">Mariam Coulibaly</h6>
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shape">
                                        <img src="{{ asset('assets/images/testimonials/02.png') }}" alt="service">
                                    </div>
                                </div>
                            </div>

                            <!-- Témoignage 3 -->
                            <div class="swiper-slide">
                                <div class="single-testimonials-style">
                                    <div class="quots">
                                        <img src="{{ asset('assets/images/testimonials/quotes.png') }}"
                                            alt="témoignage">
                                    </div>
                                    <p class="disc">
                                        Service client impeccable et médecins très compétents.
                                        Une vraie révolution pour la prise de rendez-vous médicaux en ligne.
                                    </p>
                                    <div class="author-area">
                                        <a href="#" class="img">
                                            <img src="{{ asset('assets/images/testimonials/04.png') }}"
                                                alt="patient">
                                        </a>
                                        <div class="info">
                                            <h6 class="name">Jean Koffi</h6>
                                            <div class="stars-area">
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                                <i class="fa-sharp fa-solid fa-star"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="shape">
                                        <img src="{{ asset('assets/images/testimonials/02.png') }}" alt="service">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- rts testimonials area end -->

    <!-- request appoinment area start -->
    <div class="request-appoinment-area rts-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="request-appoinemnt-area-main-wrapper bg_image rts-section-gap">
                        <span class="pre">Prendre Rendez-vous</span>
                        <h2 class="title">
                            Réservez votre <br>
                            <span>Consultation</span>
                        </h2>
                        <a href="appoinment.html" class="rts-btn btn-primary">Je prends rendez-vous</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- request appoinment area end -->


    <!-- header area start -->
    <!-- rts footer area start -->
    <div class="rts-footer-area footer-bg pt--105 pt_sm--50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- subscribe area start -->
                    <div class="subscribe-area-start pb--30">
                        <a href="#" class="logo">
                            <img src="{{ asset('assets/images/logo/elephant-sante-logo.svg') }}"
                                alt="Éléphant Santé">
                        </a>
                        <!-- subscribe area start -->
                        <div class="subscribe-area">
                            <input type="text" placeholder="Entrez votre email">
                            <button class="rts-btn btn-primary">S’abonner</button>
                        </div>
                        <!-- subscribe area end -->
                    </div>
                    <!-- subscribe area end -->
                </div>
                <div class="col-lg-12">
                    <div class="footer-wrapper-style-between">

                        <!-- Contact -->
                        <div class="single-wized">
                            <h6 class="title">Contact</h6>
                            <div class="body">
                                <p class="location">
                                    Abidjan, Côte d’Ivoire <br>
                                    Cocody – Angré, Carrefour Golgotha
                                </p>
                                <a href="mailto:contact@elephantsante.com">kwlegaltech.com</a><br>
                                <a href="tel:+2250102030405">+225 01 02 03 04 05</a>
                            </div>
                        </div>

                        <!-- Company -->
                        <div class="single-wized">
                            <h6 class="title">Entreprise</h6>
                            <div class="body">
                                <ul class="nav-bottom">
                                    <li><a href="about.html">À propos</a></li>
                                    <li><a href="services.html">Nos services</a></li>
                                    <li><a href="appoinment.html">Prendre rendez-vous</a></li>
                                    <li><a href="contact.html">Nous contacter</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Nos Services -->
                        <div class="single-wized">
                            <h6 class="title">Nos Services</h6>
                            <div class="body">
                                <ul class="nav-bottom">
                                    <li><a href="service-details.html">Consultations</a></li>
                                    <li><a href="service-details.html">Psychiatrie</a></li>
                                    <li><a href="service-details.html">Cardiologie</a></li>
                                    <li><a href="service-details.html">Analyses & examens</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Horaires -->
                        <div class="single-wized">
                            <h6 class="title">Horaires</h6>
                            <div class="body">
                                <p class="location">Lun - Ven : 8h00 - 18h00</p>
                                <p class="location">Samedi : 9h00 - 14h00</p>
                                <p class="location">Dimanche : Fermé</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-area-inner">
                        <p>© 2025 . Tous droits réservés.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts footer area end -->
    <!-- header area end -->


    <div class="loader-wrapper">
        <div class="loader">
        </div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <div id="anywhere-home">
    </div>
    <!-- progress area start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
            </path>
        </svg>
    </div>
    <!-- progress area end -->
    <!-- Script pour afficher la vraie date -->
    <script>
        function updateDateTime() {
            const now = new Date();
            const optionsDate = {
                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'
            };
            const date = now.toLocaleDateString('fr-FR', optionsDate);
            const time = now.toLocaleTimeString('fr-FR', {
                hour: '2-digit',
                minute: '2-digit'
            });
            document.getElementById('currentDateTime').textContent = `${date} | ${time}`;
        }

        updateDateTime(); // Initial
        setInterval(updateDateTime, 60000); // Mise à jour chaque minute
    </script>


    <script src="assets/js/plugins/jquery.js"></script>
    <script src="assets/js/plugins/jquery-ui.js"></script>
    <script src="assets/js/vendor/waw.js"></script>
    <script src="assets/js/plugins/swiper.js"></script>
    <script src="assets/js/plugins/metismenu.js"></script>
    <script src="assets/js/plugins/jarallax.js"></script>
    <script src="assets/js/plugins/smooth-scroll.js"></script>
    <script src="assets/js/plugins/magnifying-popup.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <!-- main js here -->
    <script src="assets/js/main.js"></script>
</body>

</html>
