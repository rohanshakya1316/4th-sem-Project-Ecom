<?php
session_start();
include "../dbconfig.php";
if (!$_SESSION['loggedIn'] == true) {
    echo '<script>
    alert("Login in required to access the Admin Panel!")
    </script>;';
    echo '<meta http-equiv = "refresh" content = "0; url = ../Login/login.php"/>';
    //header("location: ../Login/login.php");
}
if ($_SESSION['loggedIn'] === true) {
    $adminName = $_SESSION['admin_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;700&family=Poppins:wght@200;300;400;600&family=Quicksand:wght@300;400;500;600;700&family=Urbanist:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>
    <div class="container">
        <!-- =============== Navigation Starts================ -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="storefront"></ion-icon>
                        </span>
                        <span class="title">ShopVerse</span>
                    </a>
                </li>

                <li onclick="displayContent('dashboard')">
                    <a href="#dashboard">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li onclick="displayContent('product')">
                    <a href="#product">
                        <span class="icon">
                            <ion-icon name="cart-outline"></ion-icon>
                        </span>
                        <span class="title">Products</span>
                    </a>
                </li>

                <li onclick="displayContent('profile')">
                    <a href=" #profile">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Profiles</span>
                    </a>
                </li>

                <li onclick="displayContent('order')">
                    <a href=" #order">
                        <span class="icon">
                            <ion-icon name="bicycle-outline"></ion-icon>
                        </span>
                        <span class="title">Orders</span>
                    </a>
                </li>

                <li onclick="displayContent('customer')">
                    <a href=" #customer">
                        <span class="icon">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li onclick="displayContent('message')">
                    <a href=" #message">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Message</span>
                    </a>
                </li>

                <li>
                    <a href="../Login/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Log Out</span>
                    </a>

                </li>
            </ul>
        </div>
        <!-- =============== Navigation Ends================ -->

        <!-- ========================= Main Starts==================== -->
        <div class="main">
            <!-- ========================= Top bar Starts==================== -->
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- <div class="search">
                    <label>
                        <input type="text" placeholder="Search here" />
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div> -->
                <div> <?php echo '<p>Welcome admin, ' . $adminName . '</p>'; ?>
                </div>

                <div class="user">
                    <img src="assets/imgs/customer01.png" alt="" />
                </div>
            </div>

            <!-- ========================= Top bar Ends==================== -->
            <!-- Dashboard Content Starts -->
            <div id="dashboard" class="dashboard" style="display:block;">
                <!-- ======================= Cards Box Starts ================== -->
                <div class="cardBox">
                    <div class="card">
                        <div>
                            <div class="numbers">
                                <?php 
                                    $sql = "SELECT SUM(price) AS earnings
                                            FROM cart_items
                                            WHERE payment_status = 'paid';";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc(); 
                                                echo "रु". intval($row['earnings']);
                                            }       
                                ?>
                            </div>
                            <div class="cardName">Earning</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cash-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">
                                <?php 
                                    $sql = "SELECT COUNT(*) AS messages FROM contactus;";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) { 
                                        $row = $result->fetch_assoc();
                                        echo $row['messages']; 
                                    }
                                ?>
                            </div>
                            <div class="cardName">Enquiry</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="chatbubbles-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">
                                <?php 
                                    $sql = "SELECT SUM(quantity) AS total_sales_quantity FROM cart_items WHERE payment_status = 'paid';";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) { 
                                        $row = $result->fetch_assoc();
                                        echo  $row['total_sales_quantity'];
                                    }
                                ?>

                            </div>
                            <div class="cardName">Sales</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="cart-outline"></ion-icon>
                        </div>
                    </div>

                    <div class="card">
                        <div>
                            <div class="numbers">
                                <?php 
                                    $sql = "SELECT COUNT(user_id) AS total_customers FROM `login` WHERE usertype = 'User';";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) { 
                                        $row = $result->fetch_assoc();
                                        echo  $row['total_customers'];
                                    }
                                ?>
                            </div>
                            <div class="cardName">Customers</div>
                        </div>

                        <div class="iconBx">
                            <ion-icon name="people-outline"></ion-icon>
                        </div>
                    </div>

                </div>
                <!-- ======================= Cards Box Ends ================== -->

                <!-- ================ Details List Starts ================= -->
                <div class="details">
                    <!-- ================ Recent Order Details List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Orders</h2>
                            <a href="#order" class="btn">View All</a>
                        </div>

                        <table>
                            <thead>
                                <tr>
                                    <td>Product</td>
                                    <td>Customer</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Payment</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT 
                                        l.username, 
                                        p.name AS product, 
                                        ci.quantity, 
                                        ci.price, 
                                        ci.payment_status, 
                                        MAX(ci.added_at) AS last_added_at
                                        FROM login l
                                        JOIN carts c ON l.user_id = c.user_id
                                        JOIN cart_items ci ON c.cart_id = ci.cart_id
                                        JOIN products p ON ci.product_id = p.product_id
                                        GROUP BY l.username, p.name, ci.quantity, ci.price, ci.payment_status
                                        ORDER BY last_added_at DESC
                                        LIMIT 7;
                                        ";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                <tr>
                                    <td><?php echo $row['product']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['payment_status']; ?></td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ================ Recent Order Details List Ends ================= -->

                    <!-- ================= Recent Customers Starts ================ -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                            <a href="#customer" class="btn">View All</a>

                        </div>

                        <table>
                            <?php
                            $sql = "SELECT l.username, MAX(ci.added_at) AS last_added_at
                            FROM login l
                            JOIN carts c ON l.user_id = c.user_id
                            JOIN cart_items ci ON c.cart_id = ci.cart_id
                            GROUP BY l.username
                            ORDER BY last_added_at DESC
                            LIMIT 5
                            ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx">
                                        <!-- <img src="assets/imgs/customer02.jpg" alt="" /> -->
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                </td>
                                <td>
                                    <h4>
                                        <?php echo $row['username'] ?><br />
                                        <span>Nepal</span>
                                    </h4>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <!-- ================= Recent Customers Ends ================ -->
                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Dashboard Content Ends -->

            <!-- Product Content Starts -->
            <div id="product" class="dashboard" style="display:block;">
                <!-- ================ Details List Starts ================= -->
                <div class="details grid">
                    <!-- ================ Product Details List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Products List</h2>
                            <a class="btn add-product-btn" onclick="openAddPopup()">Add Product</a>
                            <div class="popup-overlay" id="popupAdd">
                                <div class="popup-form">
                                    <h2>Add New Product</h2>

                                    <label for="name">Name:</label>
                                    <input type="text" id="name" name="name" placeholder="Enter product name" required
                                        autocomplete="off">

                                    <label for="category">Category:</label>
                                    <input type="text" id="category" name="category" placeholder="Enter category"
                                        required autocomplete="off">

                                    <label for="brand">Brand:</label>
                                    <input type="text" id="brand" name="brand" placeholder="Enter brand name" required
                                        autocomplete="off">

                                    <label for="price">Price:</label>
                                    <input type="number" id="price" name="price" placeholder="Enter price" required
                                        autocomplete="off">

                                    <label for="stock">Stock:</label>
                                    <input type="number" id="stock" name="stock" placeholder="Enter stock quantity"
                                        required autocomplete="off">

                                    <label for="description">Description:</label>
                                    <textarea id="description" name="description" rows="3"
                                        placeholder="Enter product description" required autocomplete="off"></textarea>

                                    <label for="image_path">Image Path:</label>
                                    <input type="text" id="image_path" name="image_path" placeholder="Enter image URL"
                                        required autocomplete="off">

                                    <div class="popup-buttons">
                                        <button class="save-btn" onclick="addProduct()">Add Product</button>
                                        <button class="close-btn" onclick="closeAddPopup()">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table border="2px">
                            <thead>
                                <tr>
                                    <td>S.N.</td>
                                    <td>Name</td>
                                    <td>Category</td>
                                    <td>Brand</td>
                                    <td>Price</td>
                                    <td>Stock</td>
                                    <td>Description</td>
                                    <td>Image Path</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `products`;";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $sn = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['category']; ?></td>
                                    <td><?php echo $row['brand']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['stock']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td><?php echo $row['image_path']; ?></td>
                                    <td><a class="btn-edit" data-id=<?php echo $row['product_id']; ?>>Edit</a>
                                        <div class="popup-overlay" id="popupUpdate">
                                            <div class="popup-form">
                                                <h2>Update Product</h2>

                                                <label for="nameUpdate">Name:</label>
                                                <input type="text" id="nameUpdate" name="name"
                                                    placeholder="Update product name" required autocomplete="off">

                                                <label for="categoryUpdate">Category:</label>
                                                <input type="text" id="categoryUpdate" name="category"
                                                    placeholder="Update category" required autocomplete="off">

                                                <label for="brandUpdate">Brand:</label>
                                                <input type="text" id="brandUpdate" name="brand"
                                                    placeholder="Update brand name" required autocomplete="off">

                                                <label for="priceUpdate">Price:</label>
                                                <input type="number" id="priceUpdate" name="price"
                                                    placeholder="Update price" required autocomplete="off">

                                                <label for="stockUpdate">Stock:</label>
                                                <input type="number" id="stockUpdate" name="stock"
                                                    placeholder="Update stock quantity" required autocomplete="off">

                                                <label for="descriptionUpdate">Description:</label>
                                                <textarea id="descriptionUpdate" name="description" rows="3"
                                                    placeholder="Update product description" required
                                                    autocomplete="off"></textarea>

                                                <label for="image_pathUpdate">Image Path:</label>
                                                <input type="text" id="image_pathUpdate" name="image_path"
                                                    placeholder="Update image URL" required autocomplete="off">

                                                <div class="popup-buttons">
                                                    <button class="save-btn" onclick="updateProduct()">Update
                                                        Product</button>
                                                    <button class="close-btn"
                                                        onclick="closeUpdatePopup()">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a class="btn-delete" data-id=<?php echo $row['product_id']; ?>
                                            onclick="deleteProduct(<?php echo $row['product_id']; ?>)">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                        $sn++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ================ Product Details List Ends ================= -->
                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Product Content Ends -->

            <!-- Profile Content Starts -->
            <div id="profile" class="dashboard" style="display:block;">
                <!-- ================ Details List Starts ================= -->
                <div class="details grid">
                    <!-- ================ User List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Users List</h2>
                            <a class="btn" onclick="openAddUserPopup()">Add User</a>
                            <div class="popup-overlay" id="popupAddUser">
                                <div class="popup-form">
                                    <h2>Add New User</h2>

                                    <label for="nameProfile">Username:</label>
                                    <input type="text" id="nameProfile" placeholder="Enter username" required
                                        autocomplete="off" />
                                    <span id="user_error" class="error"></span>


                                    <label for="emailProfile">Email:</label>
                                    <input type="email" id="emailProfile" placeholder="Enter email" required
                                        autocomplete="off" />
                                    <span id="email_error" class="error"></span>


                                    <label for="passProfile">Password: </label>
                                    <input type="password" id="passProfile" placeholder="Enter password" required
                                        autocomplete="off" />
                                    <span id="pass_error" class="error"></span>


                                    <label for="cpassProfile">Confirm Password: </label>
                                    <div>
                                        <input type="password" id="cpassProfile" placeholder="Enter confirm password"
                                            required autocomplete="off" />
                                        <span id="cpass_error" class="error"></span>
                                    </div>
                                    <div class="role-selection">
                                        <select name="usertype" class="role">
                                            <option value="User" selected>User</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>

                                    <div class="popup-buttons">
                                        <button class="save-btn add-user-btn" onclick="addUser()">
                                            Add User
                                        </button>
                                        <button class="close-btn" onclick="closeAddUserPopup()">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <table border="2px">
                            <thead>
                                <tr>
                                    <td>S.N.</td>
                                    <td>Userame</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td>Cpassword</td>
                                    <td>Usertype</td>
                                    <td>Action</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $sql = "SELECT * FROM `login`;";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    $sn = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['cpassword']; ?></td>
                                    <td><?php echo $row['usertype']; ?></td>
                                    <td><a class="btn-edit1" data-id=<?php echo $row['user_id']; ?>
                                            onclick="openUpdateUserPopup(<?php echo $row['user_id']; ?>)">Edit</a>
                                        <div class="popup-overlay" id="popupUpdateUser">
                                            <div class="popup-form">
                                                <h2>Update User</h2>

                                                <label for="nameProfile">Username:</label>
                                                <input type="text" class="nameProfile" placeholder="Enter username"
                                                    required autocomplete="off" />
                                                <span id="userUpdate_error" class="error"></span>


                                                <label for="emailProfile">Email:</label>
                                                <input type="email" class="emailProfile" placeholder="Enter email"
                                                    required autocomplete="off" />
                                                <span id="emailUpdate_error" class="error"></span>


                                                <label for="passProfile">Password: </label>
                                                <input type="password" class="passProfile" placeholder="Enter password"
                                                    required autocomplete="off" />
                                                <span id="passUpdate_error" class="error"></span>


                                                <label for="cpassProfile">Confirm Password: </label>
                                                <div>
                                                    <input type="password" class="cpassProfile"
                                                        placeholder="Enter confirm password" required
                                                        autocomplete="off" />
                                                    <span id="cpassUpdate_error" class="error"></span>
                                                </div>
                                                <div class="role-selection">
                                                    <select name="usertype" class="role" id="usertypeUpdate">
                                                        <option value="User">User</option>
                                                        <option value="Admin">Admin</option>
                                                    </select>
                                                </div>

                                                <div class="popup-buttons">
                                                    <button class="save-btn" onclick="updateUser()">
                                                        Update User
                                                    </button>
                                                    <button class="close-btn"
                                                        onclick="closeUpdateUserPopup()">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                        &nbsp;
                                        <a class="btn-delete btn-delete-user" data-id=<?php echo $row['user_id']; ?>
                                            onclick="deleteUser(<?php echo $row['user_id'] ?>)">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                        $sn++;
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ================ User Details List Ends ================= -->


                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Profile Content Ends -->

            <!-- Order Content Starts -->
            <div id="order" class="dashboard" style="display:block;">
                <!-- ================ Details List Starts ================= -->
                <div class="details grid">
                    <!-- ================ Order Details List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Orders List</h2>
                            <a class="btn" href="#customer">View Customer</a>

                        </div>

                        <table border="2px">
                            <thead>
                                <tr>
                                    <td>S.N.</td>
                                    <td>Product</td>
                                    <td>Customer</td>
                                    <td>Quantity</td>
                                    <td>Price</td>
                                    <td>Payment</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT 
                                            l.username, 
                                            p.name AS product, 
                                            ci.quantity, 
                                            ci.price, 
                                            ci.payment_status, 
                                            MAX(ci.added_at) AS last_added_at
                                            FROM login l
                                            JOIN carts c ON l.user_id = c.user_id
                                            JOIN cart_items ci ON c.cart_id = ci.cart_id
                                            JOIN products p ON ci.product_id = p.product_id
                                            GROUP BY l.username, p.name, ci.quantity, ci.price, ci.payment_status
                                            ORDER BY last_added_at ASC
                                            ;
                                            ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $sn = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['product']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['quantity']; ?></td>
                                    <td><?php echo $row['price']; ?></td>
                                    <td><?php echo $row['payment_status']; ?></td>
                                </tr>
                                <?php
                                            $sn++;
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ================ Order Details List Ends ================= -->


                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Order Content Ends -->

            <!-- Customer Content Starts -->
            <div id="customer" class="dashboard" style="display:block;">
                <!-- ================ Details List Starts ================= -->
                <div class="details grid">
                    <!-- ================ Customer Details List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Customer List</h2>
                            <a class="btn" href="#order">View Order</a>

                        </div>

                        <table>
                            <?php
                            $sql = "SELECT l.username, MAX(ci.added_at) AS last_added_at
                            FROM login l
                            JOIN carts c ON l.user_id = c.user_id
                            JOIN cart_items ci ON c.cart_id = ci.cart_id
                            GROUP BY l.username
                            ORDER BY last_added_at ASC
                            ";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                            <tr>
                                <td width="60px">
                                    <div class="imgBx">
                                        <!-- <img src="assets/imgs/customer02.jpg" alt="" /> -->
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                </td>
                                <td>
                                    <h4>
                                        <?php echo $row['username'] ?><br />
                                        <span>Nepal</span>
                                    </h4>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                    <!-- ================ Customer Details List Ends ================= -->


                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Customer Content Ends -->

            <!-- Contact Us Content Starts -->
            <div id="message" class="dashboard" style="display:block;">
                <!-- ================ Details List Starts ================= -->
                <div class="details grid">
                    <!-- ================ Customer Details List Starts ================= -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Message List</h2>
                            <a class="btn" href="#dashboard">Dashboard</a>

                        </div>

                        <table border="2px">
                            <thead>
                                <tr>
                                    <td>S.N.</td>
                                    <td>Full Name</td>
                                    <td>Email</td>
                                    <td>Subject</td>
                                    <td>Message</td>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT 
                                            *
                                            FROM contactus;
                                            ";
                                    $result = $conn->query($sql);
                                    if ($result->num_rows > 0) {
                                        $sn = 1;
                                        while ($row = $result->fetch_assoc()) {
                                            ?>
                                <tr>
                                    <td><?php echo $sn; ?></td>
                                    <td><?php echo $row['fullname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['subject']; ?></td>
                                    <td><?php echo $row['message']; ?></td>
                                </tr>
                                <?php
                                            $sn++;
                                        }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- ================ Customer Details List Ends ================= -->


                </div>
                <!-- ================ Details List Ends ================= -->
            </div>
            <!-- Contact Us Content Ends -->
        </div>
        <!-- =============== Main Ends================ -->
    </div>

    <!-- =========== Scripts =========  -->
    <script src=" assets/js/main.js" defer></script>

    <!-- ====== ionicons scripts======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">
    </script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js">
    </script>
</body>

</html>