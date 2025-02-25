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
    <title>Products</title>
</head>

<body>
    <?php include "navBar.php"; ?>
    <!-- Show Products Starts -->
    <section class="addToCartElement">
        <div class="container">
            <section>
                <div id="productCartContainer"></div>
            </section>

            <!-- <section class="productCartTotalElem">
                <div class="productCartTotalElement">
                    <p>Selected Offer Summary</p>
                    <div class="productOrderTotal">
                        <div>
                            <p>Sub Total:</p>
                            <p class="productSubTotal">0</p>
                        </div>
                        <div>
                            <p>Tax:</p>
                            <p class="productTax">रु50</p>
                        </div>
                        <hr />
                        <div>
                            <p>Final Total:</p>
                            <p class="productFinalTotal">0</p>
                        </div>
                    </div>
                </div>
            </section> -->
        </div>
    </section>

    <!-- Template for a product -->
    <?php //include "cartProductsFromDB.php"; ?>
    <template id="productCartTemplate">
        <div class="cards" id="cardValue">
            <article class="information [ card ]">
                <div>
                    <span class="category"></span>
                </div>
                <div class="imageContainer">
                    <img class="productCartImage" src="" alt="" />
                </div>

                <h2 class="productName"></h2>

                <p class="productPrice"></p>

                <!-- <p class="productStock" hidden></p> -->
                <!-- <button class="cartDecrement">-</button> -->
                <!-- <button class="cartIncrement">+</button> -->
                <!-- <div class="stockElement">
                </div> -->
                <p class="productQuantity" data-quantity="1" style="
                    padding: 0rem 8rem;">1</p>

                <!-- <button class=" add-to-cart-button">Add To Cart</button> -->
                <div class="pay-remove-btn">
                    <button class="add-to-cart-button pay-to-cart-button" id="payBtn">
                        Pay
                    </button>

                    <button class="add-to-cart-button remove-to-cart-button">
                        Remove
                    </button>
                </div>
            </article>
        </div>
    </template>
    <!-- Show Products Ends -->
    <?php include "footer.php"; ?>
    <script type="module" src="cartProducts.js"></script>
    </bodybody </html>