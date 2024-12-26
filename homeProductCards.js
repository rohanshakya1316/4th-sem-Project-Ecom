import { homeQuantityToggle } from "./homeQuantityToogle.js";

const productContainer = document.querySelector("#productContainer");
const productTemplate = document.querySelector("#productTemplate");

export const showProductContainer = (products) => {
    if (!products) {
        return false;
    }

    products.forEach(curProd => {
        const { brand, category, description, product_id, image_path, name, price, stock } = curProd;

        const productClone = document.importNode(productTemplate.content, true);

        productClone.querySelector("#cardValue").setAttribute("id", `card${product_id}`); // for homeQuantityToggle
        
        //productClone.querySelector(".brand").textContent = brand;
        productClone.querySelector(".category").textContent = category;
        productClone.querySelector(".productName").textContent = name;
        productClone.querySelector(".productImage").src = `${image_path}`;
        productClone.querySelector(".productImage").alt = name;
        productClone.querySelector(".productStock").textContent = stock;
        productClone.querySelector(".productDescription").textContent = description;
        productClone.querySelector(".productPrice").textContent = `रु ${price}`;
        productClone.querySelector(".productActualPrice").textContent = `रु ${
        (price * 1.5).toFixed(2)
        }`;


        // Event for product toogling
        productClone.querySelector(".stockElement").addEventListener('click', (event) => {
            homeQuantityToggle(event, product_id, stock);
        });

        productContainer.append(productClone);

    });
}