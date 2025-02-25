import cartProducts from "./api/cartProducts.json" with {type: 'json'};
import { showCartProductContainer } from "./cartProductCards.js";

showCartProductContainer(cartProducts); 