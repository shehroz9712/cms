<!DOCTYPE html>
<html lang="en">
<!-- head start  -->
@include('front.layouts.partials.head')

<!-- head end  -->


<body>
    <!-- navbar start  -->
    @include('front.layouts.partials.navbar')
    @dd('here')
    <!-- navbar end  -->
    <main>
        <style>
            .main-bg {
                position: absolute;
                width: 100%;
                top: 0;
                left: 0;
                z-index: -1;
            }

            .backgrounds img {
                width: 100%;
                height: auto;
                transform-origin: center;
                transition: transform 0.3s ease;
            }

            .moon .heading {
                position: absolute;
                top: -100px;
                opacity: 0;
                text-align: center;
                width: 100%;
                transition: top 0.3s ease, opacity 0.3s ease;
            }

            /* Add styles for overlay */
            .overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8);
                display: none;
                align-items: center;
                justify-content: center;
            }

            /* Style for the overlay paragraph */
            .overlay-paragraph {
                color: white;
                text-align: center;
            }

            .about-container {
                position: relative;
                /* height: 100vh; */
                /* Adjust this value as needed */
                /* overflow: hidden; */
                /* Hide the overflow to prevent scrolling */
            }

            .about-section {

                transition: transform 0.5s ease-in-out;
            }
        </style>


        <section class="p-0">
            <div class="scroll-container"
                style="background-image: url(/assets/image/slider/background-1.png);background-size: cover;background-repeat: no-repeat;">
                <!-- <div class="main-bg">
                    <img src="/assets/image/slider/top.png" alt="Background Image" class="w-100">
                </div> -->
                <div class="moon">
                    <img src="/assets/image/slider/bott-layer.png" alt="Background Image" class="position-absolute"
                        style="width: 40%;left: 30%;">
                    <!-- <h1 class="heading">AI Powered <br> software <br> house</h1> -->
                </div>
                <div class="backgrounds">
                    <img src="/assets/image/slider/FRONT-LAYER.png" alt="Background Image" class="w-100"
                        style="overflow:hidden;transform: scale(1) translateY(0px);">
                </div>
            </div>
        </section>

        <!-- <div class="about-section "> -->

        <!-- About Us section will appear after scrolling 300px and fade in -->
        <div class="about-container">
            <section class="about-section about-section1 pt-0">
                <div class="container">
                    <div class="justify-content-center row ">
                        <div class="col-md-8">
                            <div class="card border-0 text-center d-flex">
                                <h3 class="my-5"> <a href="https://www.designrush.com/agency/profile/kleinbott">See
                                        Kleinbott Profile On DesignRush</a>
                                </h3>
                                <h1 class="heading">
                                    About us
                                </h1>
                                <style>

                                </style>
                                <div class="text-center">
                                    <p class="initial-content">
                                        KLEINBOTT. software development company is an end-to-end development venture
                                        making
                                        AI-backed software solutions accessible for all businesses. We help you scale
                                        your
                                        business with our innovative ideas and extensive expertise. Our company serves
                                        as a
                                        lasting partner for your business, ensuring exponential growth every step of the
                                        way.
                                        With our modern AI-backed software tools, we develop a complete digital plan to
                                        speed up
                                        your business growth.
                                    </p>
                                    <p id="second-para" class="text-center read-more-content" style="display: none;">
                                        Our company keeps modernization and professionalism at its core. With an
                                        emphasis on an
                                        ethical work environment, we build partnerships based on trust and transparency.
                                        We
                                        leverage a broad array of AI-backed digital assets and resources to create a
                                        functional
                                        plan that best fits your specific industry. Taking our focus on progress and
                                        evolution
                                        to the next level, we're also developing our own AI-backed software to help you
                                        further
                                        grow your business.
                                    </p>
                                    <a href="javascript:" id="read-more-btn">Read More</a>
                                </div>
                                <script></script>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- about us end   -->
        <!-- counter start  -->
        <section class="counter-section">
            <div class="container">
                <div class="justify-content-center row">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card p-4 card-shadow">
                            <a href="">
                                <h6 class="counter-heading counter" data-target="365" data-icon=" ">1<span>K</span>
                                </h6>
                                <div class="break"></div>
                                <p class="fs-5 mt-5 text-white">days a year of human-to-human coordination and
                                    unparalleled
                                    client support.</p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card p-4 card-shadow">
                            <a href="">
                                <h6 class="counter-heading counter" data-target="15" data-icon="+">1<span>K</span></h6>
                                <div class="break"></div>
                                <p class="fs-5 mt-5 text-white">years of experience in delivering business growth
                                    solutions
                                    to companies worldwide.
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="card p-4 card-shadow">
                            <a href="">
                                <h6 class="counter-heading counter" data-target="95" data-icon="%">1<span>%</span></h6>
                                <div class="break"></div>
                                <p class="fs-5 mt-5 text-white">client retention rate, prioritizing providing
                                    exceptional
                                    client satisfaction above
                                    all.
                                </p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- counter end   -->
        <!-- badge slider start  -->
        <section class="badge-section">
            <div class="container-fluid2">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="heading">
                            WHERE YOU CAN FIND US
                        </h2>
                    </div>
                </div>
                <div class="break height-10"></div>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-lg-12 slick owl-carousel owl-theme">
                            <div class="item">
                                <a href="https://www.crunchbase.com/organization/kleinbott-software-development-company"
                                    target="_blank">
                                    <img src="/assets/image/badge/image-5.png" alt="" srcset=""></a>
                            </div>
                            <div class="item">
                                <img src="/assets/image/badge/image-23.png" alt="" srcset="">
                            </div>
                            <div class="item">
                                <a href="https://www.trustpilot.com/review/kleinbott.com" target="_blank">
                                    <img src="/assets/image/badge/image-24.png" alt="" srcset="">
                                </a>
                            </div>

                            <div class="item">
                                <img src="/assets/image/badge/image-25.png" alt="" srcset="">
                            </div>
                            <div class="item">
                                <img src="/assets/image/badge/image-26.png" alt="" srcset="">
                            </div>
                            <div class="item">
                                <img src="/assets/image/badge/image-27.png" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="break height-10"></div>
        </section>
        <!-- badge slider end  -->
        <!-- services start  -->
        <section class="pt-5 service-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="heading">
                            Services
                        </h2>
                    </div>
                    <div class="col-lg-5">
                        <ul class="nav nav-tabs flex-column border-0" id="myTabs" role="tablist">
                            <?php print_r($services_result->fetch_assoc()); ?>
                            <?php $count = 1;
                            foreach ($services as $row) {
                            ?>
                            <li class="mb-4 nav-item" role="presentation">
                                <button class="nav-link <?php if ($count === 1) {
                                    echo 'active';
                                } ?>  theme-button m-3 p-3 w-100 fs-4"
                                    id="tab<?php echo $row['id']; ?>" data-bs-toggle="tab"
                                    data-bs-target="#panel<?php echo $row['id']; ?>" type="button" role="tab"
                                    aria-controls="panel<?php echo $row['id']; ?>"
                                    aria-selected="true"><?php echo $row['title']; ?></button>
                            </li>
                            <?php $count++;
                            } ?>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class=" pt-2 px-5 tab-content mt-3" id="myTabContent">
                            <?php
                            $count = 1;
                            foreach ($services as $row) {
                            ?>
                            <div class="tab-pane fade px-5 <?php if ($count === 1) {
                                echo 'show active';
                            } ?>" id="panel<?php echo $row['id']; ?>"
                                role="tabpanel" aria-labelledby="tab<?php echo $row['id']; ?>">
                                <?php echo $row['home_para']; ?>
                                <!-- <P> tag | tag | tag | tag</P> -->
                                <a class="fs-4 " href="service/<?php echo $row['slug']; ?>">Learn more</a>
                            </div>
                            <?php $count++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- services end  -->
        <!-- cta Start -->
        <?php include 'cta-bar.php'; ?>
        <!-- cta end -->
        <!-- portfolio Start -->
        <section class="portfolio-section pt-5">
            <div class="row">
                <?php include 'portfolio-section.php'; ?>
            </div>
        </section>
        <!-- portfolio end -->
        <!-- case Study  Start -->
        <!-- <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card" id="casestudy" style="
                            /* background: #2c0202 !important; */
                            border-radius: 10px;
                            height: 1000px;
                            overflow: hidden;
                            max-height: 1000px;
                        ">
                            <div class="card-body">
                                <a href="#"><img id="image1" class="mouse-bg lr"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?">
                                    <span class="image-title">Image 1</span></a>
                                <a href="#"><img id="image2" class="mouse-bg lr2"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 2</span></a>
                                <a href="#"><img id="image3" class="mouse-bg lr3"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 3</span></a>
                                <a href="#"><img id="image4" class="mouse-bg lr4"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 4</span></a>
                                <a href="#"><img id="image5" class="mouse-bg lr5"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 5</span></a>
                                <a href="#"><img id="image6" class="mouse-bg lr6"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 6</span></a>
                                <a href="#"><img id="image7" class="mouse-bg lr7"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 7</span></a>
                                <a href="#"><img id="image8" class="mouse-bg lr8"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 8</span></a>
                                <a href="#"><img id="image9" class="mouse-bg lr9"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 9</span></a>
                                <a href="#"><img id="image10" class="mouse-bg lr10"
                                        src="/assets/image/casestudy/commingsoon.jpg"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 10</span></a>
                                <a href="#"><img id="image11" class="mouse-bg lr11"
                                        src="/assets/image/casestudy/commingsoon.jpgp"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 11</span></a>
                                <a href="#"><img id="image12" class="mouse-bg lr12"
                                        src="/assets/image/casestudy/commingsoon.jpgp"
                                        title="sapiente suscipit consectetur non eveniet. Voluptatem itaque libero ea animi?"><span
                                        class="image-title">Image 12</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- case Study end -->
        <!-- contact form  Start -->
        <section class=" pt-0">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class="card contact-card mb-0">
                            <h2 class="heading">
                                let's get connected
                            </h2>
                            <form action="/send.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" placeholder="Your Email">
                                        </div>
                                        <div class="form-group mt-4">
                                            <textarea name="msg" id="msg" placeholder="Detail" style="resize: none;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <h3>I’m interested in</h3>
                                        <div class="form-group">
                                            <?php foreach ($services as $row) { ?>
                                            <input type="radio" class="form-check-input radio-input"
                                                onclick="javascript:yesnoCheck();" id="<?php echo $row['slug']; ?>"
                                                value="<?php echo $row['title']; ?>" name="service" />
                                            <label class="form-check-label radio-btn btn btn radio-btn"
                                                for="<?php echo $row['slug']; ?>"><?php echo $row['title']; ?></label>
                                            <?php } ?>
                                            <input type="radio" class="form-check-input radio-input"
                                                onclick="javascript:yesnoCheck();" id="other" value="Other"
                                                name="service" />
                                            <label class="form-check-label radio-btn btn btn radio-btn"
                                                for="other">OTHER</label>
                                            <div id="ifYes" style="visibility:hidden">
                                                <input type='text' id='yes' name='other'
                                                    placeholder="If yes, explain:">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group text-end">
                                        <button class="btn theme-button" type="submit\">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact form  end -->
        <!-- footer start  -->
        <?php require 'footer.php'; ?>
        </div>
        <!-- footer end  -->
