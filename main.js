import products from "./api/products.json" with {type: 'json'};
import { showProductContainer } from "./homeProductCards.js";

// Define function named 'showProductContainer' that takes an array of products as input.
showProductContainer(products);
