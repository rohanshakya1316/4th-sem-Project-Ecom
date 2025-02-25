export function showToast(operation, name) {
    const toast = document.createElement("div");
    toast.classList.add("toast");
  
    // Set the text content of the toast based on the operation
    if (operation === "add") {
      toast.textContent = `Product ${name} has been added to the cart.`;
    } else if (operation === "remove") {
      toast.textContent = `Product ${name} has been removed from the cart.`;
    } else {
        toast.textContent = `Payment for the product ${name} is successfull.`;
        
    }
  
    document.body.appendChild(toast);
  
    // Automatically remove the toast after a few seconds
    setTimeout(() => {
      toast.remove();
    }, 2000);
  }