<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>Ecommerce Website</title>
</head>

<body>
    <!-- Navbar Section Start -->
    <?php include "navBar.php" ?>
    <!-- Navbar Section End -->

    <!-- Home Hero Section Start -->
    <main>
        <section class="section-hero">
            <div class="container grid grid-two--cols">
                <div class="section-hero--content">
                    <p class="hero-subheading"> Explore the Latest Products in Market</p>
                    <h1 class="hero-heading">
                        Your Universe for Quality Products!
                    </h1>
                    <p class="hero-para">
                        Welcome to ShopVerse, your ultimate destination for Latest
                        and Trending Products! Explore the trends in the market and ready
                        to style with us. Shop now and discover a world of possibilities!
                    </p>
                    <div class="hero-btn">
                        <a href="#productInfo" class="btn"> Explore Our
                            Products</a>
                    </div>
                </div>
                <div class="section-hero-image" data-aos="fade-up" data-aos-delay="600">
                    <figure>
                        <img src="./images/heroSectionImage.png" alt="hero-section-image">
                    </figure>
                </div>
            </div>
            <div class="custom-shape-divider-bottom-1730795620">
                <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                    preserveAspectRatio="none">
                    <path
                        d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z"
                        opacity=".25" class="shape-fill"></path>
                    <path
                        d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z"
                        opacity=".5" class="shape-fill">
                    </path>
                    <path
                        d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"
                        class="shape-fill">
                    </path>
                </svg>
            </div>
        </section>
    </main>
    <!-- Home Hero Section End -->

    <!-- Extra Product Section Start -->
    <section class="section-extra-product">
        <div class="container grid grid-three--cols">
            <div class="div-extra grid grid-two--cols">
                <div class="extra-text">
                    <p>Winter Offer!</p>
                    <h3>Get extra 40% off</h3>
                    <a href="#">Show now</a>
                </div>
                <div class="extra-img extra-shoes">
                    <img src="./images/sneaker.png" alt="Shoes">
                </div>
            </div>

            <div class="div-extra grid grid-two--cols">
                <div class="extra-text">
                    <p>Winter Offer!</p>
                    <h3>Get extra 20% off</h3>
                    <a href="#">Show now</a>
                </div>
                <div class="extra-img extra-tshirt">
                    <img src="./images/weTheOnes.png" alt="T-Shirt">
                </div>
            </div>

            <div class="div-extra grid grid-two--cols">
                <div class="extra-text">
                    <p>Winter Offer!</p>
                    <h3>Get extra 10% off</h3>
                    <a href="#">Show now</a>
                </div>
                <div class="extra-img extra-hoodie">
                    <img src="./images/hoodie.png" alt="Pullover Hoodie">
                </div>
            </div>
        </div>
    </section>
    <!-- Extra Product Section End -->

    <!-- Policy and Rules Start -->
    <section class="section-policy">
        <div class="container grid grid-four--cols">
            <div class="div-policy">
                <div class="icons">
                    <i class="fa-solid fa-dollar-sign"></i>
                </div>
                <div class="div-policy-text">
                    <p>Money Back Guarantee</p>
                    <p>7-Days Guarantee Return</p>
                </div>
            </div>

            <div class="div-policy">
                <div class="icons">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div class="div-policy-text">
                    <p>Worldwide Shipping</p>
                    <p>Order Above $500</p>
                </div>
            </div>

            <div class="div-policy">
                <div class="icons">
                    <i class="fa-solid fa-repeat"></i>
                </div>
                <div class="div-policy-text">
                    <p>Easy 7 Day Return</p>
                    <p>Back Return in 7 days</p>
                </div>
            </div>

            <div class="div-policy">
                <div class="icons">
                    <i class="fa-solid fa-wifi"></i>
                </div>
                <div class="div-policy-text">
                    <p>Easy Online Support</p>
                    <p>24/7 any time Support</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Policy and Rules End -->

    <!-- Products Section Start -->
    <section class="section-products container">
        <div class="">
            <h2 id="productInfo" class="section-common--heading" style="transition: 0.3s ease-in-out;">Explore ShopVerse
                Products</h2>
        </div>

        <section class="container">
            <div id="productContainer"></div>
        </section>
    </section>
    <!-- Product Template Section Start -->
    <?php include "productsFromDB.php"; ?>
    <template id="productTemplate">
        <div class="cards" id="cardValue">
            <article class="information [card]">
                <span class="category"></span>
                <div class="imageContainer">
                    <img src="" alt="" class="productImage">
                </div>
                <h2 class="productName"></h2>

                <div class="productRating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>

                <p class="productDescription"></p>

                <div class="productPriceElement">
                    <p class="productPrice"></p>
                    <p class="productActualPrice"></p>
                </div>

                <div class="productStockElement">
                    <p class="productProperty">Stock:</p>
                    <p class="productStock"></p>
                </div>

                <div class="productQuantityElement">
                    <p class="productProperty">Quantity(Pieces)</p>
                    <div class="stockElement">
                        <button class="cartDecrement">-</button>
                        <p class="productQuantity">1</p>
                        <button class="cartIncrement">+</button>
                    </div>
                </div>

                <button class="add-to-cart-button">
                    <i class="fa-solid fa-cart-shopping"></i> Add To Cart
                </button>
            </article>
        </div>
    </template>
    <!-- Product Template Section End -->

    <!-- Products Section End -->

    <!-- Why choose us section Start -->
    <section class="section-why--choose" id="aboutInfo" style="transition: 0.3s ease-in-out;">
        <div class="container">
            <h2 class="section-common--heading">ShopVerse: Why to Choose?</h2>
            <p class="section-common-subheading">
                Choose ShopVerse for the seamless shopping experience, unmatched convenience, and
                24/7 access to the products you adore, at your fingertips.
            </p>
        </div>

        <div class="container grid grid-three--cols">
            <div class="choose-left-div text-align--right">
                <div class="why-choose--div">
                    <p class="common-text--highlight">1</p>
                    <h3 class="section-common--title">Your One-Stop Online Shop</h3>
                    <p>
                        Explore an extensive collection of products across various categories, designed to meet your
                        every need. With our streamlined platform and reliable delivery service, we make shopping
                        effortless
                        and enjoyable.
                    </p>
                </div>

                <div class="why-choose--div">
                    <p class="common-text--highlight">2</p>
                    <h3 class="section-common--title">Convenience Redefined</h3>
                    <p>
                        Shop at your own pace, anytime and anywhere, with our intuitive eCommerce platform.
                        Whether you're looking for essentials or indulging in something special, our website
                        ensures a hassle-free shopping experience.
                    </p>
                </div>

                <div class="why-choose--div">
                    <p class="common-text--highlight">3</p>
                    <h3 class="section-common--title">Where Quality Meets Affordability</h3>
                    <p>
                        Why choose between quality and price when you can have both? Browse our curated selection
                        of premium products offered at competitive rates, making it easier than ever to shop smart.
                    </p>
                </div>
            </div>

            <div class="choose-center-div">
                <figure>
                    <img src="images/why-choose-us-removebg-preview.png" alt="Why-Choose-Us-Photo">
                </figure>
            </div>

            <div class="choose-right-div">
                <div class="why-choose--div">
                    <p class="common-text--highlight">4</p>
                    <h3 class="section-common--title">Excellent Services</h3>
                    <p>
                        ShopVerse is committed to providing excellent service to our customers. From prompt
                        assistance
                        with inquiries to efficient handling of orders and deliveries, we prioritize your
                        satisfaction
                        every step of the way.
                    </p>
                </div>

                <div class="why-choose--div">
                    <p class="common-text--highlight">5</p>
                    <h3 class="section-common--title">Fast. Easy. Reliable.</h3>
                    <p>
                        Experience the joy of effortless shopping with our lightning-fast website, seamless payment
                        options, and dependable delivery, so you can spend less time shopping and more time
                        enjoying.
                    </p>
                </div>

                <div class="why-choose--div">
                    <p class="common-text--highlight">6</p>
                    <h3 class="section-common--title">Your Trusted Online Partner</h3>
                    <p>
                        We prioritize your satisfaction with secure payment options, dedicated customer support,
                        and a commitment to delivering exceptional products every time you shop with us.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Why choose us section End -->

    <!-- Footer Section Start -->
    <?php include "footer.php"; ?>
    <!-- Footer Section Start -->

    <script type="module" src="./main.js"></script>
</body>

</html>