import { paymentCartProduct } from "./paymentCartProduct.js";
import { removeProductFromCart } from "./removeProductFromCart.js";

const cartProductContainer = document.querySelector("#productCartContainer");
const productTemplate = document.querySelector("#productCartTemplate");
// export const showCartProductContainer = (cartProducts) => {
//   if (!cartProducts) {
//     return false;
//   }

//   cartProducts.forEach((curProd) => {
//     const { name, category, image_path, price, quantity, stock, product_id } =
//       curProd;
//     // console.log(curProd);

//     const productClone = document.importNode(productTemplate.content, true);

//     // for remove product from cart and payment functionality
//     productClone
//       .querySelector("#cardValue")
//       .setAttribute("id", `card${product_id}`);

//     productClone.querySelector(".category").textContent = category;
//     productClone.querySelector(".productCartImage").src = `${image_path}`;
//     productClone.querySelector(".productCartImage").alt = name;
//     productClone.querySelector(".productName").textContent = name;
//     productClone.querySelector(".productPrice").textContent = `रु ${price}`;
//     productClone.querySelector(".productQuantity").textContent = quantity;
//     // productClone.querySelector(".productStock").textContent = stock;

//     productClone
//       .querySelector(".pay-to-cart-button")
//       .addEventListener("click", (event) => {
//         console.log("pay button clicked: ", product_id);
//         paymentCartProduct(product_id);
//       });

//     productClone
//       .querySelector(".remove-to-cart-button")
//       .addEventListener("click", (event) => {
//         removeProductFromCart(product_id);
//       });

//     cartProductContainer.append(productClone);
//   });
// };


export const showCartProductContainer = async () => {
    try {
        let response = await fetch("getCartProducts.php");
        let cartProducts = await response.json();

        if (!cartProducts) return false;

        cartProducts.forEach(curProd => {
            const { name, category, image_path, price, quantity, product_id, payment_status } = curProd;

            const productClone = document.importNode(productTemplate.content, true);

            productClone.querySelector("#cardValue").setAttribute("id", `card${product_id}`); 
            productClone.querySelector(".category").textContent = category;
            productClone.querySelector(".productCartImage").src = `${image_path}`;
            productClone.querySelector(".productCartImage").alt = name;
            productClone.querySelector(".productName").textContent = name;
            productClone.querySelector(".productPrice").textContent = `रु ${price}`;
            productClone.querySelector(".productQuantity").textContent = quantity;

            let payButton = productClone.querySelector(".pay-to-cart-button");
            payButton.setAttribute("id", `payButton${product_id}`);

            // Check payment status from the database
            if (payment_status === "paid") {
                payButton.innerText = "Paid";
                payButton.disabled = true;
            } else {
                payButton.addEventListener('click', () => {
                    paymentCartProduct(product_id, name);
                });
            }

            productClone.querySelector(".remove-to-cart-button").addEventListener("click", (event) => {
                removeProductFromCart(product_id, name);
            });

            cartProductContainer.append(productClone);
        });
    } catch (error) {
        console.error("Error fetching cart products:", error);
    }
};
