// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

// Content Toogle
displayContent = (contentId) => {
  const contents = document.querySelectorAll(".dashboard");

  contents.forEach((currentContent) => {
    currentContent.style.display = "none";
  });

  const activeContent = document.getElementById(contentId);
  if (activeContent) {
    activeContent.style.display = "block";
  }
};

// Product Management
// Add product Popup and storing in database.
openAddPopup = () => {
  document.getElementById("popupAdd").style.display = "flex";
};

closeAddPopup = () => {
  document.getElementById("popupAdd").style.display = "none";
};

addProduct = async () => {
  let productData = {
    name: document.getElementById("name").value,
    category: document.getElementById("category").value,
    brand: document.getElementById("brand").value,
    price: document.getElementById("price").value,
    stock: document.getElementById("stock").value,
    description: document.getElementById("description").value,
    image_path: document.getElementById("image_path").value,
  };

  // Check if any value in the productData object is null or undefined or an empty string
  for (let key in productData) {
    if (
      productData[key] === null ||
      productData[key] === undefined ||
      productData[key].trim() === ""
    ) {
      alert("Please fill all the information to add the product.");
      return;
    }
  }

  try {
    let response = await fetch("addProductToDB.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(productData),
    });
    let result = await response.json();
    alert(result.message);
    location.reload();
    closePopup();
  } catch (error) {
    console.error("Error adding product: ", error);
  }
};
// End of add product functionality

// update product popup and updating the database.
document.querySelectorAll(".btn-edit").forEach((a) => {
  a.addEventListener("click", async (event) => {
    event.preventDefault();
    let productId = event.currentTarget.getAttribute("data-id"); // use this in place of event.currentTarget if you are using normal function ()
    // console.log(productId);

    //Fetching the existing data from the database.
    let response = await fetch(
      "getProductForUpdate.php?product_id=" + productId
    );
    let product = await response.json();

    // populating form fields with existing data.
    document.getElementById("nameUpdate").value = product.name;
    document.getElementById("categoryUpdate").value = product.category;
    document.getElementById("brandUpdate").value = product.brand;
    document.getElementById("priceUpdate").value = product.price;
    document.getElementById("stockUpdate").value = product.stock;
    document.getElementById("descriptionUpdate").value = product.description;
    document.getElementById("image_pathUpdate").value = product.image_path;

    // storing product ID for updating
    document
      .getElementById("popupUpdate")
      .setAttribute("data-id", product.product_id);

    //Showing the popup Update form
    document.getElementById("popupUpdate").style.display = "flex";
  });
});

closeUpdatePopup = () => {
  document.getElementById("popupUpdate").style.display = "none";
};

// update function start
updateProduct = async () => {
  let productId = document
    .getElementById("popupUpdate")
    .getAttribute("data-id");

  let productData = {
    product_id: productId,
    name: document.getElementById("nameUpdate").value,
    category: document.getElementById("categoryUpdate").value,
    brand: document.getElementById("brandUpdate").value,
    price: document.getElementById("priceUpdate").value,
    stock: document.getElementById("stockUpdate").value,
    description: document.getElementById("descriptionUpdate").value,
    image_path: document.getElementById("image_pathUpdate").value,
  };
  //console.log(productData);

  // Check if any value in the productData object is null or undefined or an empty string
  for (let key in productData) {
    if (
      productData[key] === null ||
      productData[key] === undefined ||
      productData[key].trim() === ""
    ) {
      alert("Please fill all the information to update the product.");
      return;
    }
  }

  try {
    let response = await fetch("updateProductToDB.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(productData),
    });
    let result = await response.json();
    //console.log(result);
    alert(result.message);
    location.reload();
    closePopup();
  } catch (error) {
    console.error("Error updating product: ", error);
  }
};
// update function end

// delete functionality starts
deleteProduct = async (productId) => {
  //document.querySelectorAll(".btn-delete").forEach((a) => {
  //a.addEventListener("click", async (event) => {
  //event.preventDefault();
  //let productId = event.currentTarget.getAttribute("data-id");
  // console.log(productId);
  if (!confirm("Are you sure you want to delete this product?")) {
    return;
  }
  try {
    let response = await fetch(
      "deleteProductFromDB.php?product_id=" + productId,
      {
        method: "GET",
      }
    );
    let result = await response.json();
    if (result.success) {
      alert(result.message);
      location.reload();
    } else {
      alert("Failed to delete product!");
    }
  } catch (error) {
    console.error("Error: ", error);
  }
  //});
  //});
};
// delete functionality ends

// User Profile Management
// Add product Popup and storing in database.
openAddUserPopup = () => {
  document.getElementById("popupAddUser").style.display = "flex";
};

closeAddUserPopup = () => {
  document.getElementById("popupAddUser").style.display = "none";
};

addUser = async () => {
  try {
    const username = document.querySelector("#nameProfile").value;
    const email = document.querySelector("#emailProfile").value;
    const password = document.querySelector("#passProfile").value;
    const cpassword = document.querySelector("#cpassProfile").value;

    function clearErrors() {
      errors = document.getElementsByClassName("error");
      for (let item of errors) {
        item.innerHTML = "";
      }
    }

    function setError(id, error) {
      document.getElementById(id).innerHTML = error;
    }

    // Form Validation
    let returnval = true;

    // Regular Expressions
    const usernameRegex = /^[A-Za-z0-9]{3,15}$/;
    const emailRegex =
      /^[A-Za-z0-9]+(?:[.%_+][A-Za-z0-9]+)*@[A-Za-z0-9]+\.[A-Za-z]{2,}$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    clearErrors();

    if (!usernameRegex.test(username)) {
      setError("user_error", "Username Invalid!");
      returnval = false;
    }

    if (username.length == 0) {
      setError("user_error", "Username cannot be empty!");
      returnval = false;
    }

    if (!emailRegex.test(email)) {
      setError("email_error", "Invalid Email! Enter valid email address.");
      returnval = false;
    }

    if (!passwordRegex.test(password)) {
      setError(
        "pass_error",
        "8 character uppercase lowercase & special characters!"
      );
      returnval = false;
    }

    if (cpassword !== password) {
      setError("cpass_error", "Password and Confirm password should match!");
      returnval = false;
    }
    if (!returnval) {
      alert("Fill the appropriate information in the form.");
      return; // if validation fails return.
    }
    let userData = {
      username: username,
      email: email,
      password: password,
      cpassword: cpassword,
      usertype: document.querySelector(".role").value,
    };
    console.log(userData);

    let response = await fetch("addUserToDB.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userData),
    });

    let result = await response.json();
    if (result.success) {
      alert(result.message);
      location.reload();
      closePopup();
    } else {
      alert("Failed to add new user.");
    }
  } catch (error) {
    console.error("Error adding user: ", error);
  }
};
// new user adding functionality ends.

// deletion of new user functionality starts.
deleteUser = async (userId) => {
  // document.querySelectorAll(".btn-delete-user").forEach((a) => {
  // a.addEventListener("click", async (event) => {
  // event.preventDefault();
  // let userId = currentTarget.getAttribute("data-id");
  // console.log(productId);
  if (!confirm("Are you sure you want to delete this user?")) {
    return;
  }
  try {
    let response = await fetch("deleteUserFromDB.php?user_id=" + userId, {
      method: "GET",
    });
    let result = await response.json();
    if (result.success) {
      alert(result.message);
      location.reload();
    } else {
      alert("Failed to delete the user!");
    }
  } catch (error) {
    console.error("Error: ", error);
  }
  // });
  //});
};
// deletion of new user functionality ends

// updation of new user functionality starts
openUpdateUserPopup = async (userId) => {
  try {
    let response = await fetch("getUserForUpdate.php?user_id=" + userId, {
      method: "GET",
    });
    let user = await response.json();
    document.querySelector(".nameProfile").value = user.username;
    document.querySelector(".emailProfile").value = user.email;
    document.querySelector(".passProfile").value = user.password;
    document.querySelector(".cpassProfile").value = user.cpassword;
    let roleSelect = document.querySelector(".role-selection .role");
    //console.log(roleSelect);
    roleSelect.value = user.usertype;
    //console.log(user);

    // storing user ID for updating
    document
      .getElementById("popupUpdateUser")
      .setAttribute("data-id", user.user_id);
  } catch (error) {
    console.error("Error updating the user: ", error);
  }

  document.getElementById("popupUpdateUser").style.display = "flex";
};

closeUpdateUserPopup = () => {
  document.getElementById("popupUpdateUser").style.display = "none";
};

updateUser = async () => {
  try {
    let userId = document
      .getElementById("popupUpdateUser")
      .getAttribute("data-id");
    function clearErrors() {
      errors = document.getElementsByClassName("error");
      for (let item of errors) {
        item.innerHTML = "";
      }
    }

    function setError(id, error) {
      document.getElementById(id).innerHTML = error;
    }
    const username = document.querySelector(".nameProfile").value;
    const email = document.querySelector(".emailProfile").value;
    const password = document.querySelector(".passProfile").value;
    const cpassword = document.querySelector(".cpassProfile").value;
    const usertype = document.querySelector("#usertypeUpdate").value;
    // Form Validation
    let returnval = true;

    // Regular Expressions
    const usernameRegex = /^[A-Za-z0-9]{3,15}$/;
    const emailRegex =
      /^[A-Za-z0-9]+(?:[.%_+][A-Za-z0-9]+)*@[A-Za-z0-9]+\.[A-Za-z]{2,}$/;
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    clearErrors();

    if (!usernameRegex.test(username)) {
      setError("userUpdate_error", "Username Invalid!");
      returnval = false;
    }

    if (username.length == 0) {
      setError("userUpdate_error", "Username cannot be empty!");
      returnval = false;
    }

    if (!emailRegex.test(email)) {
      setError(
        "emailUpdate_error",
        "Invalid Email! Enter valid email address."
      );
      returnval = false;
    }

    if (!passwordRegex.test(password)) {
      setError(
        "passUpdate_error",
        "8 character uppercase lowercase & special characters!"
      );
      returnval = false;
    }

    if (cpassword !== password) {
      setError(
        "cpassUpdate_error",
        "Password and Confirm password should match!"
      );
      returnval = false;
    }
    if (!returnval) {
      // alert("Fill the appropriate information in the form.");
      return; // if validation fails return.
    }
    console.log(usertype);

    let userData = {
      user_id: userId,
      username: username,
      email: email,
      password: password,
      cpassword: cpassword,
      usertype: usertype,
    };

    console.log(userData);

    let response = await fetch("updateUserToDB.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(userData),
    });
    let result = await response.json();
    //console.log(result);
    if (result.success) {
      alert(result.message);
      location.reload();
      closePopup();
    } else {
      alert("Failed to update user.");
    }
  } catch (error) {
    console.error("Error updating product: ", error);
  }
};

// updation of new user functionality ends
