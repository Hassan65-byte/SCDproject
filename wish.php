<?php
session_start();

// Initialize wishlist if it doesn't exist
if (!isset($_SESSION['wishlist'])) {
    $_SESSION['wishlist'] = [];
}

// Handle AJAX request to sync wishlist from localStorage to session
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'syncWishlist') {
    $wishlist = json_decode($_POST['wishlist'], true);
    $_SESSION['wishlist'] = $wishlist; // Sync localStorage wishlist to PHP session
    echo json_encode(['status' => 'success']);
    exit;
}

// Handle form submission to add items to the wishlist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item'])) {
    $item = json_decode($_POST['item'], true);

    // Check if the item already exists in the session wishlist
    $itemExists = false;
    foreach ($_SESSION['wishlist'] as &$wishlistItem) {
        if ($wishlistItem['name'] === $item['name']) {
            $wishlistItem['quantity']++; // Increment quantity if item exists
            $itemExists = true;
            break;
        }
    }

    // Only add the item if it doesn't already exist
    if (!$itemExists) {
        $item['quantity'] = 1; // Set initial quantity to 1
        $_SESSION['wishlist'][] = $item;
    }

    echo json_encode(['status' => 'success']);
    exit;
}

// Output wishlist for rendering (in case you want to load it directly)
$wishlistItems = $_SESSION['wishlist'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wishlist</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Your Wishlist</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody id="wishlist-items">
                <tr>
                    <td colspan="5">Your wishlist is empty!</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        // Load wishlist from localStorage
        let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

        // Render wishlist items in the table
        function renderWishlist() {
            const wishlistContainer = $('#wishlist-items');
            wishlistContainer.empty();

            if (wishlist.length === 0) {
                wishlistContainer.append('<tr><td colspan="5">Your wishlist is empty!</td></tr>');
            } else {
                wishlist.forEach(item => {
                    wishlistContainer.append(`
                           <tr>
    <td>
        <img src="${item.img}" alt="${item.img}" class="img-thumbnail" style="width: 100px;">
    </td>
    <td>${item.name}</td>
    <td>$${parseFloat(item.price).toFixed(2)}</td>
    <td>
        <button class="btn btn-danger btn-sm decrement-btn">-</button>
    </td>
</tr>

                        `);
                });
            }
        }

        // Initial render
        renderWishlist();

        // Sync localStorage with PHP session
        if (wishlist.length > 0) {
            $.post('wishlist.php', {
                wishlist: JSON.stringify(wishlist),
                action: 'syncWishlist'
            }, function(response) {
                console.log('Wishlist synced with session');
            });
        }

        // Handle decrement button
        $(document).on('click', '.decrement-btn', function() {
            const row = $(this).closest('tr');
            const itemName = row.find('td:nth-child(2)').text(); // Get the item name
            const quantityCell = row.find('.quantity'); // Reference to the quantity cell
            let currentQuantity = parseInt(quantityCell.text()); // Get the current quantity

            // Get the wishlist from localStorage
            let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

            // Find the item in the wishlist by name
            const itemIndex = wishlist.findIndex(item => item.name === itemName);

            if (itemIndex !== -1) {
                if (currentQuantity > 1) {
                    wishlist[itemIndex].quantity--;
                    currentQuantity--; // Decrease the quantity for display
                    quantityCell.text(currentQuantity); // Update the quantity displayed in the table
                } else {
                    // Remove the item from wishlist if quantity is 1
                    wishlist.splice(itemIndex, 1);
                    row.remove(); // Remove the row from the display
                }
            }

            // Update localStorage and sync with session
            localStorage.setItem('wishlist', JSON.stringify(wishlist));
            $.post('wishlist.php', {
                wishlist: JSON.stringify(wishlist),
                action: 'syncWishlist'
            });

            if (wishlist.length === 0) {
                $('#wishlist-items').html('<tr><td colspan="5">Your wishlist is empty!</td></tr>');
            }
        });

        // Example of adding an item to the wishlist (manually)
        function addToWishlist(item) {
            const itemExists = wishlist.some(wishlistItem => wishlistItem.name === item.name);

            if (!itemExists) {
                item.quantity = 1;
                wishlist.push(item);
                localStorage.setItem('wishlist', JSON.stringify(wishlist));

                // Sync with PHP session
                $.post('wishlist.php', {
                    item: JSON.stringify(item)
                });

                renderWishlist(); // Re-render the wishlist
                alert(item.name + ' has been added to the wishlist.');
            } else {
                alert(item.name + ' is already in your wishlist.');
            }
        }
    });
    </script>
</body>

</html>