<?php
include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart BookStore</title>
    
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->
    <header>
        <nav class="navbar">
            <div class="logo">
                <i class="fas fa-book-open"></i>
                <span>Smart BookStore</span>
            </div>
            
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="about.php">About</a></li>
               <li><a href="#contact">Contact</a></li>
            </ul>
            
            <div class="nav-buttons">
                <a href="login.php" class="login-btn">Login</a>
                <a href="register.php" class="register-btn">Register</a>
            </div>
        </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
        <div class="hero-content">
            <h1>
                Welcome to
                <span>Smart BookStore</span>
            </h1>
            <p>
                Discover thousands of books from different categories.
                Read, Learn and Grow with us.
            </p>
            
            <div class="hero-buttons">
                <a href="books.php" class="browse-btn">Browse Books</a>
                <a href="login.php" class="hero-login">Login</a>
            </div>
        </div>

        <div class="hero-image">
            <img src="book.jpg" alt="BookStore">
        </div>
    </section>

    <!-- FEATURED BOOKS SECTION - APPEARS ONLY ONCE -->
    <section class="featured-books">
        <div class="section-title">
            <h2>Featured Books</h2>
            <p>Discover our latest collection of books</p>
        </div>
        
        <span class="badge">Latest</span>

        <div class="book-grid">
            <?php
            $result = mysqli_query($conn, "SELECT * FROM books LIMIT 4");
            
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="book-card">
                    <img src="images/book.png" alt="Book">
                    
                    <h3><?php echo $row['book_name']; ?></h3>
                    
                    <p><strong>Author:</strong> <?php echo $row['author']; ?></p>
                    
                    <p class="category"><?php echo $row['category']; ?></p>
                    
                    <h4>₹<?php echo $row['price']; ?></h4>
                    
                    <a href="books.php" class="book-btn">View Details</a>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- CATEGORIES SECTION -->
    <section class="categories">
        <h2>Book Categories</h2>
        
        <div class="category-container">
            <div class="category-card">
                <span>💻</span>
                <h5>Programming</h5>
            </div>

            <div class="category-card">
                <span>📖</span>
                <h4>Novel</h4>
            </div>

            <div class="category-card">
                <span>🧪</span>
                <h4>Science</h4>
            </div>

            <div class="category-card">
                <span>🏛️</span>
                <h4>History</h4>
            </div>

            <div class="category-card">
                <span>👤</span>
                <h4>Biography</h4>
            </div>

            <div class="category-card">
                <span>📚</span>
                <h4>Education</h4>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE US SECTION -->
    <section class="why">
        <h2>Why Choose Our BookStore?</h2>
        
        <div class="why-container">
            <div class="why-card">
                <span>📚</span>
                <h3>Huge Collection</h3>
                <p>Thousands of books from every category.</p>
            </div>

            <div class="why-card">
                <span>🔒</span>
                <h3>Secure Login</h3>
                <p>Safe and secure authentication system.</p>
            </div>

            <div class="why-card">
                <span>⚡</span>
                <h3>Fast Search</h3>
                <p>Find your favourite books instantly.</p>
            </div>

            <div class="why-card">
                <span>📱</span>
                <h3>Responsive Design</h3>
                <p>Works perfectly on mobile and desktop.</p>
            </div>
        </div>
    </section>

    <!-- STATISTICS SECTION -->
    <section class="stats">
        <div class="section-title">
            <h2>Our Achievements</h2>
            <p>Trusted by hundreds of readers</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <h1>500+</h1>
                <p>Books Available</p>
            </div>

            <div class="stat-card">
                <h1>200+</h1>
                <p>Happy Users</p>
            </div>

            <div class="stat-card">
                <h1>50+</h1>
                <p>Authors</p>
            </div>

            <div class="stat-card">
                <h1>100%</h1>
                <p>Secure Website</p>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="testimonials">
        <div class="section-title">
            <h2>What Our Readers Say</h2>
            <p>Customer Reviews</p>
        </div>

        <div class="testimonial-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <h3>Rahul</h3>
                <p>Amazing collection of books. Easy to use website.</p>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <h3>Priya</h3>
                <p>Best online bookstore for students.</p>
            </div>

            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <h3>Arjun</h3>
                <p>Very fast and responsive website.</p>
            </div>
        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section class="contact" id="contact">
        <div class="section-title">
            <h2>Contact Us</h2>
            <p>We would love to hear from you.</p>
        </div>

        <div class="contact-box">
            <div>
                <h3>📧 Email</h3>
                <p>Smartbookstore@gmail.com</p>
            </div>

            <div>
                <h3>📞 Phone</h3>
                <p>+91 9391584347</p>
            </div>

            <div>
                <h3>📍 Location</h3>
                <p>Visakhapatnam, Andhra Pradesh</p>
            </div>
        </div>
    </section>

    <!-- SEARCH SECTION -->
    <section class="search-section">
        <form action="books.php" method="GET">
            <input 
                type="text" 
                name="search" 
                placeholder="Search Books..."
                required>
            <button type="submit">Search</button>
        </form>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">
            <h2>📚 Smart BookStore</h2>
            <p>Your one-stop destination for books.</p>
            <p>© 2026 Smart BookStore. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="script.js"></script>
   
    
    <style>
        html{

    scroll-behavior:smooth;

}
    </style>
  
   
</body>

</html>
