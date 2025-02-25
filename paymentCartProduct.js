import { showToast } from "./showToast.js";

export const paymentCartProduct = async (product_id, name) => {
    try {
        let response = await fetch("paymentCartProduct.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded" }, 
            body: `product_id=${product_id}`
        });

        let data = await response.json();

        if (data.success) {
            alert("Payment Successful!");
            showToast("payment", name);
            let payBtn = document.querySelector(`#payButton${product_id}`);
            payBtn.innerText = "Paid";
            payBtn.disabled = true; 
        } else {
            alert("Payment Failed!");
        }
    } catch (error) {
        console.error("Error: ", error);
        alert("Some errors occured. Please try again!");
    }
};