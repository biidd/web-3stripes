<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login.php');
};

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_size = $_POST['product_size'];

    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND size = '$product_size' AND user_id = '$user_id'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'product already added to cart!';
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity, size) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity', '$product_size')") or die('query failed');
        $message[] = 'product added to cart!';
    }
};

if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
    $message[] = 'cart quantity updated successfully!';
}

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:cart.php');
}

if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping cart</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/styles.css">

</head>

<body>

    <?php
    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
        }
    }
    ?>

    <div class="container">

        <div class="user-profile">

            <?php
            $select_user = mysqli_query($conn, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
            if (mysqli_num_rows($select_user) > 0) {
                $fetch_user = mysqli_fetch_assoc($select_user);
            };
            ?>
            <p> username : <span><?php echo $fetch_user['name']; ?></span> </p>
            <p> email : <span><?php echo $fetch_user['email']; ?></span> </p>
            <div class="flex">
                <a href="index.php" class="btn">Home</a>
                <a href="cart.php?logout=<?php echo $user_id; ?>" onclick="return confirm('are your sure you want to logout?');" class="delete-btn">logout</a>
            </div>

        </div>

        <div class="products">

            <h1 class="heading">Produk</h1>

            <div class="box-container">

                <?php
                $select_product = mysqli_query($conn, "SELECT * FROM `products`") or die('query failed');
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_product = mysqli_fetch_assoc($select_product)) {
                ?>
                        <form method="post" class="box" action="">
                            <img src="image/<?php echo $fetch_product['image']; ?>" alt="">
                            <div class="name"><?php echo $fetch_product['name']; ?></div>
                            <div class="price">Rp. <?php echo $fetch_product['price']; ?></div>
                            <input type="number" min="1" name="product_quantity" value="1">
                            <select name="product_size" required>
                                <option value="">Select Size</option>
                                <option value="38">38</option>
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="42">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                            </select>
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
                            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
                        </form>
                <?php
                    };
                };
                ?>

            </div>

        </div>

        <div class="shopping-cart">

            <h1 class="heading">Keranjang belanja</h1>

            <div class="cart-items">
                <?php
                $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                $grand_total = 0;
                if (mysqli_num_rows($cart_query) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                ?>
                        <div class="cart-item">
                            <img src="image/<?php echo $fetch_cart['image']; ?>" alt="">
                            <div class="item-details">
                                <h3><?php echo $fetch_cart['name']; ?></h3>
                                <p class="size">Size: <?php echo $fetch_cart['size']; ?></p>
                                <p class="price">Rp. <?php echo $fetch_cart['price']; ?></p>
                                <form action="" method="post" class="quantity-form">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                                <p class="total">Total: Rp.<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?></p>
                                <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn" onclick="return confirm('remove item from cart?');">remove</a>
                            </div>
                        </div>
                <?php
                        $grand_total += $sub_total;
                    }
                } else {
                    echo '<div class="empty-cart">no item added</div>';
                }
                ?>
            </div>

            <div class="cart-total">
                <p>Grand Total: Rp.<?php echo $grand_total; ?></p>
                <a href="cart.php?delete_all" onclick="return confirm('delete all from cart?');" class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete all</a>
            </div>

            <div class="cart-btn">
                <?php
                $checkout_message = "Halo mimin, saya ingin checkout:\n\n";
                $checkout_message .= "Nama: " . $fetch_user['name'] . "\n";
                $checkout_message .= "Email: " . $fetch_user['email'] . "\n\n";
                $checkout_message .= "Pesanan:\n";
                $cart_query_checkout = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
                while ($fetch_cart_checkout = mysqli_fetch_assoc($cart_query_checkout)) {
                    $checkout_message .= "- " . $fetch_cart_checkout['name'] . " (Size: " . $fetch_cart_checkout['size'] . ", Jumlah: " . $fetch_cart_checkout['quantity'] . ", Price: Rp. " . $fetch_cart_checkout['price'] . ")\n";
                }
                $checkout_message .= "\nTotal: Rp. " . $grand_total;
                ?>
                <a href="https://wa.me/6285157756604?text=<?php echo urlencode($checkout_message); ?>" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" <?php echo ($grand_total > 1) ? '' : 'onclick="return false;"'; ?>>checkout</a>
            </div>

        </div>

    </div>
</body>

</html>
