<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fast food website</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">

    <!-- header section start page -->

    <header class="header">
        <a href="#" class="logo"> <i class="fas fa-shopping-basket"></i> cake </a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#shop">Shop</a>
            <a href="#about">About</a>
            <a href="#review">Review</a>
            <a href="#blog">Blog</a>
            <a href="#contact">Contact</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>
            <a href="cart.php" id="cart-link">
                <div id="cart-btn" class="fas fa-cart-plus"></div>
            </a>
            <a href="wish.php" id="wish-link">
                <div id="login-btn" class="fas fa-heart"></div>
            </a>

        </div>


    </header>

    <!-- home section start -->

    <section class="home" id="home">
        <div class="slides-container">

            <div class="slide active">
                <div class="content">
                    <span>  Delicius Fast Food</span>
                    <h3>upto 70% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="img/img1.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Delicius Fast Food</span>
                    <h3>upto 70% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="img/img2.png" alt="">
                </div>
            </div>

            <div class="slide">
                <div class="content">
                    <span>Delicius Fast Food</span>
                    <h3>upto 70% off</h3>
                    <a href="#" class="btn">Shop Now</a>
                </div>
                <div class="img">
                    <img decoding="async" src="img/img3.png" alt="">
                </div>
            </div>

        </div>
        <div id="next-slide" class="fas fa-angle-right" onclick="next()"></div>
        <div id="prev-slide" class="fas fa-angle-left" onclick="next()"></div>

    </section>


    <section class="banner-container">

        <div class="banner">
            <img decoding="async" src="img/ban2.png" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img decoding="async" src="img/ban1.png" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

        <div class="banner">
            <img decoding="async" src="img/ban3.png" alt="">
            <div class="content">
                <span>limited sales</span>
                <h3>upto 50% off</h3>
                <a href="#" class="btn">shop now</a>
            </div>
        </div>

    </section>


    <!-- category start  -->

    <div class="heading">
        <h1>our shop</h1>
    </div>

    <section class="category" id="shop">

        <h1 class="title"> our <span>category</span> <a href="#">view all >></a> </h1>

        <div class="box-container">

            <a href="#" class="box">
                <img decoding="async" src="img/cat1.png" alt="">
                <h3>fresh food</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="img/cat2.png" alt="">
                <h3>tasty food</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="img/cat3.png" alt="">
                <h3>delicious biryani</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="img/cat4.png" alt="">
                <h3>tasty burger</h3>
            </a>

            <a href="#" class="box">
                <img decoding="async" src="img/cat5.png" alt="">
                <h3>delicious fries</h3>
            </a>


        </div>

    </section>


    <!-- products section -->

    <section class="products">
    <h1 class="title">Our <span>Products</span> <a href="#">View all >></a></h1>
    <div class="box-container">

        <!-- Product 1 -->
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" data-item-id="1" data-item-name="fries " data-item-price="19.99" data-item-img="img/prod1.png"></a>
                <a href="#" class="fas fa-heart add-to-wishlist" data-item-id="1" data-item-name="burger" data-item-price="19.99" data-item-img="img/prod2.png"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/prod1.png" alt="">
            </div>
            <div class="content">
                <h3>fries</h3>
                <div class="price">$19.99</div>
            </div>
        </div>

        <!-- Product 2 -->
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" data-item-id="2" data-item-name="zinger burger" data-item-price="19.99" data-item-img="img/prod2.png"></a>
                <a href="#" class="fas fa-heart add-to-wishlist" data-item-id="2" data-item-name="zinger burger" data-item-price="19.99" data-item-img="img/prod2.png"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/prod2.png" alt="">
            </div>
            <div class="content">
                <h3>zinger burger</h3>
                <div class="price">$19.99</div>
            </div>
        </div>

        <!-- Product 3 -->
        <div class="box">
            <div class="icons">
                <a href="#" class="fas fa-shopping-cart" data-item-id="3" data-item-name="chicken tikka pizza" data-item-price="19.99" data-item-img="img/prod3.png"></a>
                <a href="#" class="fas fa-heart add-to-wishlist" data-item-id="3" data-item-name="chicken tikka pizza" data-item-price="19.99" data-item-img="img/prod3.png"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="img">
                <img decoding="async" src="img/prod3.png" alt="">
            </div>
            <div class="content">
                <h3>chicken tikka pizza</h3>
                <div class="price">$19.99</div>
            </div>
        </div>

    </div>
</section>






    <!-- about section start -->
    <div class="heading">
        <h1>About us</h1>
    </div>

    <section class="about" id="about">
        <div class="img">
            <img decoding="async" src="img/cat1.png" alt="">
        </div>

        <div class="content">
            <span>welcome to our products</span>
            <h3>fast food products</h3>
            <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                incididunt ut labore et dolore farhan aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                in voluptate </p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                farhan aliqua. Ut enim ad minim veniam, quis</p>
            <a href="#" class="btn">read more</a>
        </div>
    </section>

    <!-- gallery section start -->

    <section class="gallery">
        <h1 class="title"> our <span>gallery</span> <a href="#">view all >></a> </h1>
        <div class="box-container">

            <div class="box">
                <img decoding="async" src="img/cat2.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>

            <div class="box">
                <img decoding="async" src="img/prod3.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>

            <div class="box">
                <img decoding="async" src="img/gal1.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>

            <div class="box">
                <img decoding="async" src="img/gal2.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>

            <div class="box">
                <img decoding="async" src="img/gal3.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>

            <div class="box">
                <img decoding="async" src="img/gal4.png" alt="">
                <div class="icons">
                    <a href="#" class="fas fa-eye"></a>
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share-alt"></a>
                </div>
            </div>
        </div>
    </section>

    <!-- client section start -->

    <div class="heading" id="review">
        <h1>client's review</h1>
    </div>

    <section class="info-container">

        <div class="info">
            <img decoding="async" src="img/icons-1.png" alt="">
            <div class="content">
                <h3>fast delivery</h3>
                <span>within 30 minutes</span>
            </div>
        </div>

        <div class="info">
            <img decoding="async" src="img/icons-2.png" alt="">
            <div class="content">
                <h3>24 / 7 available</h3>
                <span>call us anytime</span>
            </div>
        </div>

        <div class="info">
            <img decoding="async" src="img/icons-3.png" alt="">
            <div class="content">
                <h3>easy payments</h3>
                <span>cash or credit</span>
            </div>
        </div>

    </section>

    <!-- review section start -->

    <section class="review">

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-1.png" alt="">
                <div class="info">
                    <h3>edward bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-2.png" alt="">
                <div class="info">
                    <h3>jenna bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-3.png" alt="">
                <div class="info">
                    <h3>edward bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-4.png" alt="">
                <div class="info">
                    <h3>lisa bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-5.png" alt="">
                <div class="info">
                    <h3>edward bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

        <div class="box">
            <div class="user">
                <img decoding="async" src="img/pic-6.png" alt="">
                <div class="info">
                    <h3>lalisa bey</h3>
                    <span>happ client</span>
                </div>
            </div>
            <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
        </div>

    </section>

    <!-- blog section start -->

    <div class="heading" id="blog">
        <h1>our blogs</h1>
    </div>

    <section class="blogs">
        <h1 class="title"> our <span>blogs</span> <a href="#">view all >></a> </h1>
        <div class="box-container">

            <div class="box">
                <div class="img">
                    <img decoding="async" src="img/cat5.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i> 11 nov, 2024 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="ban1.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i>  11 nov, 2024 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="img/gal1.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i>  11 nov, 2024 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="img/ban3.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i> 12 jan, 2022 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="img/ban2.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i> 12 jan, 2022 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

            <div class="box">
                <div class="img">
                    <img decoding="async" src="img/blog2.png" alt="">
                </div>
                <div class="content">
                    <div class="icons">
                        <a href="#"> <i class="fsa fa-calendar"></i> 12 jan, 2022 </a>
                        <a href="#"> <i class="fsa fa-user"></i> by administrator </a>
                    </div>
                    <h3>blogs title page</h3>
                    <p>Lorem ipsum dolor sit amet, farhan aliqua. Ut enim ad minim veniam, quis</p>
                    <a href="#" class="btn">read more...</a>
                </div>
            </div>

        </div>
    </section>

    <!-- contect section start -->

    <div class="heading" id="contact">
        <h1>Contact us</h1>
    </div>

    <section class="contact">
        <div class="icons-container">

            <div class="icons">
                <i class="fas fa-phone"></i>
                <h3>our number</h3>
                <p>+111-222-3333</p>
                <p>+456-786-7890</p>
            </div>

            <div class="icons">
                <i class="fas fa-envelope"></i>
                <h3>our email</h3>
                <p>hassan@gmail.com</p>
                <p>xyzemail@gmail.com</p>
            </div>

            <div class="icons">
                <i class="fas fa-map-marker-alt"></i>
                <h3>our address</h3>
                <p>Westridge Rwp</p>
            </div>

        </div>

        <div class="row">
            <form action="">
                <h3>get in touch</h3>
                <div class="inputBox">
                    <input type="text" placeholder="enter your name" class="box">
                    <input type="text" placeholder="enter your email" class="box">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="enter your number" class="box">
                    <input type="text" placeholder="enter your subject" class="box">
                </div>
                <textarea placeholder=" your message" cols="30" rows="10"></textarea>
                <input type="submit" value="send message" class="btn">
            </form>
            <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d462560.3011806427!2d54.947543798608436!3d25.076381472700536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1642496355732!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

    </section>

    <div class="space"></div>
    <!-- footer section start -->


    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>quick links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> Home</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Shop</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>About</a>
                <a href="#"> <i class="fas fa-arrow-right"></i> Review</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Blog</a>
                <a href="#"> <i class="fas fa-arrow-right"></i>Contact</a>
            </div>

            <div class="box">
                <h3>extra links</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> my order </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> my favorite </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> my wishlist </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> my account </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> terms or use </a>
            </div>

            <div class="box">
                <h3>follow us</h3>
                <a href="#"> <i class="fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-twitter"></i> twitter </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="#"> <i class="fab fa-linkedin"></i> linkedin </a>
                <a href="#"> <i class="fab fa-pinterest"></i> pinterest </a>
            </div>

            <div class="box">
                <h3>newsletter</h3>
                <p>subscribe for latest update</p>
                <form action="">
                    <input type="email" placeholder="enter your email address">
                    <input type="submit" value="subscribe" class="btn">
                </form>
                <img decoding="async" src="img/payment.png" class="payments" alt="">
            </div>
        </div>
    </section>

    <section class="credit">created by Hassan Mehmood || all rights reserved</section>










    <script>
    // Initialize or get wishlist from local storage
    let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

    // Function to add item to wishlist if not already present
    function addToWishlist(item) {
        // Check if the item is already in the wishlist
        if (!wishlist.some(wishlistItem => wishlistItem.id === item.id)) {
            wishlist.push(item);
            localStorage.setItem('wishlist', JSON.stringify(wishlist)); // Update local storage
            alert(`${item.name} added to wishlist!`);
        } else {
            alert(`${item.name} is already in your wishlist.`);
        }
    }

    // Attach click event to all wishlist icons
    document.querySelectorAll('.add-to-wishlist').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const item = {
                id: this.getAttribute('data-item-id'),
                name: this.getAttribute('data-item-name'),
                price: this.getAttribute('data-item-price'),
                img: this.getAttribute('data-item-img')
            };

            addToWishlist(item); // Call the function to add item to wishlist
        });
    });
</script>




    <!-- custom js file link -->
    <script src="/javascript/main.js"></script>
    <script src="index.js"></script>
</body>

</html>