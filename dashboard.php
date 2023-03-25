<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Main Dashboard</title>
    <link rel="stylesheet" href="font/helvetica-now-display/stylesheet.css">
    <link rel="stylesheet" href="css/var.css">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/header-footer.css">
    <link rel="stylesheet" href="css/module.css">
    <script src="js/dashboard.js"></script>
    <script src="https://kit.fontawesome.com/e6e0351429.js" crossorigin="anonymous"></script>
</head>

<body>
    <header class="container">
        <div class="fill-container">
            <div class="left">
                <p class="logo">
                    LOGO HERE
                </p>
            </div>
            <div class="middle">
                <nav>
                    <a href="#">Search</a>
                    <a href="#">My Dashboard</a>
                    <a href="#">Community</a>
                    <a href="#">Help</a>
                </nav>
            </div>
            <div class="right settings">
                <div class="horizontal-container fit-width">
                    <p>English-US</p>
                    <img src="images/canada-flag.png">
                    <img src="svgs/arrow-down.svg">
                </div>
                <div class="horizontal-container fit-width">
                    <p>Hi, Jason</p>
                    <img src="images/profile-picture.png">
                    <img src="svgs/arrow-down.svg">
                </div>
            </div>
        </div>
    </header>
    <main>
        <article class="panel page-title">
            <h2>Home / Jason /</h2>
            <div class="title">
                <h1>Jason's Dashboard</h1>
                <div class="container">
                    <img src="svgs/edit.svg">
                </div>
            </div>
        </article>
        <article>
            <div class="block panel">
                <div  class="module small" id="module-1"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                            <div class="api-category">/Top Products 1</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                    <?php
                            include "php/modules.php";

                            // $coins = retrieveAllCoins($con);
                            foreach($data as $coin){
                                print_r($coin);
                                echo 
                                "<div class=\"product-card\">
                                    <div class=\"icon-container\">
                                        <a class=\"icon-overlay\" href=\"#\">
                                            <img src=\"svgs/goto.svg\">
                                        </a>
                                        <a class=\"icon-overlay\" href=\"#\">
                                            <img src=\"svgs/bookmark.svg\">
                                        </a>
                                    </div>
                                        <div class=\"product-image-mask\">
                                        <div class=\"product-image\" style=\"background-image: url(".$coin["img"].");\"></div>
                                    </div><div class=\"product-info-container\">
                                        <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                        <strong class=\"product-price\">79.99$ -4.24%</strong>
                                        <div class=\"price-trend-container\">
                                            <p>7D: 84.99$</p>
                                            <p>30D: 94.99$</p>
                                            <p>60D: 94.99$</p>
                                            <p>120D: 99.99$</p>
                                        </div>
                                    </div>
                                </div>";
                            }
                        ?>
                    </div>
                        <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                        <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                        <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
            </div>
            <div class="block panel">
                <div  class="module small" id="module-2"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                                                        <div class="api-category">/Top Products 2</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                        <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                        <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
                <div  class="module small" id="module-3"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                                                        <div class="api-category">/Top Products 3</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                                            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
                <div  class="module small" id="module-4"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                                                        <div class="api-category">/Top Products 4</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                                            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
            </div>
            <div class="block panel">
                <div  class="module small" id="module-5"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                                                        <div class="api-category">/Top Products 5</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                                            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
                <div  class="module small" id="module-6"> 
                    <div class="module-header">
                        <div class="api-details">
                            <img class="api-logo-image" src="images/amazon-logo-1.png"></img>
                                                        <div class="api-category">/Top Products 6</div>
                            <a class="icon-overlay" href="#">
                                <img src="svgs/goto.svg">
                            </a>
                        </div>
                        <div class="dropdowns">
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                            <select class="dropdown">
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                                <option>Deals Only</option>
                            </select>
                        </div>
                    </div>
                    <div class="module-gallery">
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                            <div class="product-card">
                            <div class="icon-container">
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/goto.svg">
                                </a>
                                <a class="icon-overlay" href="#">
                                    <img src="svgs/bookmark.svg">
                                </a>
                            </div>
                                                        <div class="product-image-mask">
                                <div class="product-image" style="background-image: url(https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80);"></div>
                            </div><div class="product-info-container">
                                <h3>Lorem ipsum dolor sit amet consectetur. Erat facilisi Lorem ipsum dolor</h3>
                                <strong class="product-price">79.99$ -4.24%</strong>
                                <div class="price-trend-container">
                                    <p>7D: 84.99$</p>
                                    <p>30D: 94.99$</p>
                                    <p>60D: 94.99$</p>
                                    <p>120D: 99.99$</p>
                                </div>
                            </div>
                        </div>
                    </div>
                                        <div class="module-footer">
                        <div class="prev">
                            <img class="prev-icon" src="svgs/arrow-left-long.svg">
                            <p>Previous</p>
                        </div>
                        <div class="next">
                            <p>Next</p>
                            <img class="next-icon" src="svgs/arrow-right-long.svg">
                        </div>
                    </div>
                    <div draggable="true" class="module-settings-btn">
                                            <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    <i class="fa-solid fa-ellipsis-vertical fa-lg"></i>
                    </div>
                </div>
            </div>
        </article>
    </main>
    <footer>
        <a id="view-edit-btn" class="icon-overlay" href="#">
            <img src="svgs/view.svg">
        </a>
        <div class="fill-container">
            <div class="left">
                <p>Aminbhavi Suyash & Jason Ramos</p>
            </div>
            <div class="middle">
                <nav>
                    <a href="#">My Dashboard</a>
                    <a href="#">Community</a>
                    <a href="#">Help</a>
                </nav>  
            </div>
            <div class="right">
                <p href="#">© COSC 360 Group, Inc</p>
                <p href="#">Back To Top</p>
            </div>
        </div>
    </footer>
    <script src="js/modules.js"></script>
</body>
</html>