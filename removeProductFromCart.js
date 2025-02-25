import { updateCartValue } from "./addToCart.js";
import { showToast } from "./showToast.js";

export const removeProductFromCart = async (product_id, name) => {
    try {
        let response = await fetch("removeProductFromCart.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `product_id=${product_id}`
        });

        let data = await response.json();

        if (data.success) {
            // Removing the item from the frontend
            document.querySelector(`#card${product_id}`).remove();
            alert("Product removed successfully!");
            showToast("remove", name);
            updateCartValue();

        } else {
            alert("Failed to remove product.");
        }
    } catch (error) {
        console.error("Error: ", error);
        alert("Some errors occured!");
    }
};