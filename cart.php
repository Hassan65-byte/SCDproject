<?php
session_start();

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle AJAX request to load cart items
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'loadCart') {
    echo json_encode($_SESSION['cart']);
    exit;
}

// Handle form submission to add items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item'])) {
    $item = json_decode($_POST['item'], true);
    $_SESSION['cart'][] = $item;
}

$cartItems = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Cart</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Your Cart</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody id="cart-items">
                <!-- Cart items will be loaded here -->
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Render cart items
    cart.forEach(item => {
        $('#cart-items').append(`
          <tr>
              <td>
                  <img src="${item.img}" alt="${item.img}" class="img-thumbnail" style="width: 100px;">
              </td>
              <td>${item.name}</td>
              <td class="quantity">${item.quantity}</td>
              <td>$${parseFloat(item.price).toFixed(2)}</td>
              <td>$${(item.quantity * item.price).toFixed(2)}</td>
              <!-- New column for decrement button -->
              <td>
                  <button class="btn btn-danger btn-sm decrement-btn">-</button>
              </td>
          </tr>
        `);
    });


        // Optionally, handle AJAX for adding items to PHP session (if needed)
        $('#add-to-cart-button').on('click', function() {
            const item = JSON.stringify(cart[cart.length - 1]); // Use the last item for demonstration
            $.post('cart.php', {
                item: item
            }, function(response) {
                console.log('Item added to PHP session');
            });
        });
    });


    $(document).on('click', '.decrement-btn', function() {
    const row = $(this).closest('tr');
    const itemName = row.find('td:nth-child(2)').text(); // Get the item name
    const quantityCell = row.find('.quantity'); // Reference to the quantity cell
    let currentQuantity = parseInt(quantityCell.text()); // Get the current quantity

    // Get the cart from localStorage
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Find the item in the cart by name or another unique property (like id)
    const itemIndex = cart.findIndex(item => item.name === itemName);

    if (itemIndex !== -1) {
        if (currentQuantity > 1) {
            // Decrease the quantity in both cart and display
            cart[itemIndex].quantity--;
            currentQuantity--; // Decrease the quantity for display
            quantityCell.text(currentQuantity); // Update the quantity displayed in the table

            // Update the total price for this item in the table
            const price = parseFloat(row.find('td:nth-child(4)').text().replace('$', ''));
            row.find('td:nth-child(5)').text('$' + (currentQuantity * price).toFixed(2));
        } else {
            // Remove the item from cart if quantity is 1
            cart.splice(itemIndex, 1);
            row.remove(); // Remove the row from the display
        }
    }

    // Update the localStorage with the new cart
    localStorage.setItem('cart', JSON.stringify(cart));

    // Optionally: Update the session on the server side via an AJAX request
    $.post('update_cart.php', { cart: JSON.stringify(cart) }, function(response) {
        console.log('Cart updated on server');
    });

    // Check if cart is empty after update
    if (cart.length === 0) {
        localStorage.removeItem('cart'); // Remove the cart completely if it's empty
    }

    alert(itemName + ' has been deleted from the cart.');
});




function updateLocalStorage(itemId, newQuantity) {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const item = cart.find(i => i.id === itemId);
    if (item) {
        item.quantity = newQuantity; // Update the quantity
        localStorage.setItem('cart', JSON.stringify(cart));
    }
}

function removeFromLocalStorage(itemId) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    cart = cart.filter(i => i.id !== itemId); // Remove the item
    localStorage.setItem('cart', JSON.stringify(cart));
}



    </script>
<script src="index.js"></script>
</body>


</html>