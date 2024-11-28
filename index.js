// Initialize an empty cart
let cart = [];

// Load cart from localStorage
function loadCart() {
    const savedCart = localStorage.getItem('cart');
    if (savedCart) {
        cart = JSON.parse(savedCart);
    }
    renderCart(); // Render the cart items on page load
}

// Save cart to localStorage
function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart));
}

// Function to render the cart UI
function renderCart() {
    const cartTableBody = document.querySelector('#cart-table-body'); // Reference to the cart table body
    cartTableBody.innerHTML = ''; // Clear the current table content
    let totalPrice = 0; // Initialize total price

    if (cart.length === 0) {
        cartTableBody.innerHTML = '<tr><td colspan="5">Your cart is empty.</td></tr>'; // Display message if cart is empty
    } else {
        cart.forEach(item => {
            const row = document.createElement('tr');
            const subtotal = item.price * item.quantity; // Calculate subtotal
            totalPrice += subtotal; // Update total price
            
            row.innerHTML = `
                <td><img src="${item.img}" alt="${item.name}" width="50"></td>
                <td>${item.name}</td>
                <td>${item.price.toFixed(2)}</td>
                <td>${item.quantity}</td>
                <td>${subtotal.toFixed(2)}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="decreaseQuantity('${item.id}')">-</button>
                    <button class="btn btn-danger btn-sm" onclick="removeItem('${item.id}')">Remove</button>
                </td>
            `;
            cartTableBody.appendChild(row); // Append the new row to the cart table
        });

        // Display total price
        const totalRow = document.createElement('tr');
        totalRow.innerHTML = `
            <td colspan="4" class="text-right"><strong>Total:</strong></td>
            <td colspan="2"><strong>${totalPrice.toFixed(2)}</strong></td>
        `;
        cartTableBody.appendChild(totalRow);
    }
}

// Function to add item to cart
function addToCart(event) {
    event.preventDefault(); // Prevent default link behavior
    
    const itemId = this.getAttribute('data-item-id');
    const itemName = this.getAttribute('data-item-name');
    const itemPrice = parseFloat(this.getAttribute('data-item-price')); // Parse as float for calculations
    const itemImg = this.getAttribute('data-item-img');

    // Check if item is already in cart
    const existingItem = cart.find(item => item.id === itemId);
    if (existingItem) {
        // If item already exists in cart, increase quantity
        existingItem.quantity += 1; 
        alert(`${itemName} quantity has been increased.`);
    } else {
        // If item doesn't exist, add it to the cart
        const item = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            img: itemImg,
            quantity: 1 // Initialize quantity to 1 for new items
        };
        cart.push(item);
        alert(`${itemName} has been added to your cart.`);
    }

    saveCart(); // Save updated cart to localStorage
    renderCart(); // Update the cart UI

    // Send an AJAX request to update the session
    fetch('update_cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(cart)
    })
    .then(response => response.json())
    .then(data => {
        console.log('Cart updated:', data);
    })
    .catch(error => {
        console.error('Error updating cart:', error);
    });
}

// Function to decrease item quantity
function decreaseQuantity(itemId) {
    const existingItem = cart.find(item => item.id === itemId);
    if (existingItem) {
        if (existingItem.quantity > 1) {
            existingItem.quantity -= 1; // Decrease quantity
            alert(`Quantity of ${existingItem.name} has been decreased.`);
        } else {
            removeItem(itemId); // Remove item if quantity reaches zero
        }
        saveCart(); // Save updated cart
        renderCart(); // Update UI
    }
}

// Function to remove item from cart
function removeItem(itemId) {
    cart = cart.filter(item => item.id !== itemId); // Filter out the removed item
    alert(`Removed item from cart.`);
    saveCart(); // Save updated cart
    renderCart(); // Update UI
}

// Attach click event to all cart icons
document.querySelectorAll('.fas.fa-shopping-cart').forEach(cartIcon => {
    cartIcon.addEventListener('click', addToCart);
});

// Call loadCart when the page loads
loadCart();





$(document).ready(function() {
    $('.fa-shopping-cart').on('click', function(e) {
        e.preventDefault();

        // Get product data
        const itemId = $(this).data('item-id');
        const itemName = $(this).data('item-name');
        const itemPrice = $(this).data('item-price');
        const itemImg = $(this).data('item-img');

        // Create a product object
        const product = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            image: itemImg,
            quantity: 1
        };

        // Add product to local storage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.push(product);
        localStorage.setItem('cart', JSON.stringify(cart));

        alert('Item added to cart!');
    });
});





// decrement btn //
$(document).ready(function() {
    // Remove item functionality
    $('.decrement-btn').on('click', function() {
        const row = $(this).closest('tr');
        const itemName = row.find('td:nth-child(2)').text(); // Get the item name

        // Remove the item from the cart
        row.remove(); // Remove the row from the display

        // Optional: If you want to update the session on the server side, you'd typically make an AJAX call here
        // For example:
        // $.post('remove_item.php', { name: itemName }, function(response) {
        //     // Handle the response if needed
        // });

        alert(itemName + ' has been removed from the cart.');
    });
});

// Function to update the cart quantity badge
function updateCartQuantity() {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    let totalQuantity = cart.reduce((sum, item) => sum + item.quantity, 0); // Calculate total quantity
    $('#cart-quantity').text(totalQuantity); // Update the cart quantity badge
}

$(document).ready(function() {
    // Call this function on page load to show current quantity
    updateCartQuantity();

    // Adding item to cart logic
    $('.fa-shopping-cart').on('click', function(e) {
        e.preventDefault();

        // Get product data
        const itemId = $(this).data('item-id');
        const itemName = $(this).data('item-name');
        const itemPrice = $(this).data('item-price');
        const itemImg = $(this).data('item-img');

        // Create a product object
        const product = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            image: itemImg,
            quantity: 1
        };

        // Add product to local storage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const existingItem = cart.find(item => item.id === product.id);

        if (existingItem) {
            existingItem.quantity += 1; // Increase quantity if item already exists
        } else {
            cart.push(product); // Add new item if it doesn't exist
        }

        localStorage.setItem('cart', JSON.stringify(cart)); // Save the updated cart

        // Show alert and update the cart quantity
        alert('Item added to cart!');
        updateCartQuantity(); // Update the quantity in the header
    });

    // Decrement button logic
    $(document).on('click', '.decrement-btn', function() {
        const row = $(this).closest('tr');
        const itemName = row.find('td:nth-child(2)').text(); // Get the item name
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        const itemIndex = cart.findIndex(item => item.name === itemName);

        if (itemIndex !== -1) {
            if (cart[itemIndex].quantity > 1) {
                cart[itemIndex].quantity--;
            } else {
                cart.splice(itemIndex, 1); // Remove item if quantity is 1
            }

            localStorage.setItem('cart', JSON.stringify(cart)); // Update localStorage
            updateCartQuantity(); // Update the quantity in the header
        }

        if (cart.length === 0) {
            localStorage.removeItem('cart'); // Remove cart if it's empty
        }
    });

    // Also call updateCartQuantity after page load to reflect current cart state
    updateCartQuantity();
});














