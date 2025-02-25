import { showToast } from "./showToast.js";

export const addToCart = async (event, product_id, stock, name) => {
  const currentProdElem = document.querySelector(`#card${product_id}`);
  
  let quantity = currentProdElem.querySelector(".productQuantity").innerText;
  let price = currentProdElem.querySelector(".productPrice").innerText;

  price = price.replace("रु", "");
  // price = price * quantity;

   // console.log(quantity, price);

  const cartData = new FormData();
  cartData.append("product_id", product_id);
  cartData.append("quantity", quantity);
  cartData.append("price", price);

  try {
    const response = await fetch("addToCart.php", {
      method: "POST",
      body: cartData,
    });

    const text = await response.text(); // Get raw response text first
    console.log(text);
    try {
      const result = JSON.parse(text); // Try to parse JSON
      if (!result.success) {
        alert(result.message);
        if (result.message.includes("Login is necessary")) {
          window.location.href = "./Login/login.php"; // Redirect to login page
        }
      } else {
        alert(result.message);
        showToast("add", name);
        updateCartValue();
      }
    } catch (jsonError) {
      console.error("Invalid JSON response:", text);
      alert("An unexpected error occurred. Please try again.");
    }
  } catch (error) {
    console.error("Error adding to cart:", error);
    alert("An error occurred while adding to the cart.");
  }
};


// Updating the cart count 

 export const updateCartValue = async () => {
  try {
    const response = await fetch("getCartCount.php");
    const result = await response.json();

    if (result.success) {
      const cartCountBtn = document.querySelector("#cartValue");
      if (cartCountBtn) {
        // Updating cart count value
        cartCountBtn.innerHTML = `<i class="fa-solid fa-cart-shopping"> &nbsp;${result.totalItems} </i>`
      } 
    } else {
      console.error("Failed to fetch cart count: ", result.message)
    }
  } catch (error) {
    console.error("Error updating cart count: ", error);
  }
};

document.addEventListener("DOMContentLoaded", updateCartValue);
