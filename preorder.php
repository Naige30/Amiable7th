<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Pre-order — Amiable 7th</title>
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&family=Cinzel:wght@500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            corePlugins: {
                preflight: false,
            },
            theme: {
                extend: {
                    fontFamily: {
                        title: ['Parisienne', 'cursive'],
                        accent: ['Cinzel', 'serif'],
                    },
                    colors: {
                        'purple-deep': '#3E2B5C',
                        'purple-main': '#6A4C93',
                        'purple-light': '#B79FDB',
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="bg-gradient-to-br from-purple-deep via-purple-main to-purple-light border-none">
        <div class="site-title">
            <a href="index.php" class="font-title text-3xl text-white font-bold">Amiable 7th</a>
        </div>
        <div class="flex items-center gap-6">
    <nav>
        <a href="index.php" class="text-white font-bold">Home</a>
        <a href="index.php#characters" class="text-white font-bold">Characters</a>
        <a href="preorder.php" class="text-white font-bold">Pre-Order</a>
        <a href="about.php" class="text-white font-bold">About Naige</a>
        <?php if (isset($_SESSION['account_id']) && $_SESSION['role'] === 'admin'): ?>
            <a href="admin.php" class="text-white font-bold">Admin</a>
        <?php endif; ?>
    </nav>

    <?php if (isset($_SESSION['account_id'])): ?>
        <div class="flex items-center gap-3 text-white text-sm font-accent font-bold">
            <span>Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
            <a href="logout.php" class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-lg transition">Log Out</a>
        </div>
    <?php else: ?>
        <a href="login.php" class="text-white font-bold">Log In</a>
    <?php endif; ?>
</div>
    </header>

    <div class="welcome-section">
        <h1>Pre-order Amiable 7th</h1>
        <p>Reserve your copy before release day.</p>
    </div>

    <div class="book-section">
        <div class="book-cover">
            <img src="images/cover.jpg" alt="Amiable 7th book cover">
        </div>

        <div class="book-info">
            <span class="book-genre-tag">Slice of Life</span>
            <span class="book-genre-tag">Coming-of-Age</span>
            <span class="book-genre-tag">Drama</span>

            <h2>Amiable 7th</h2>
            <h3>Book One: Goldenfield Academy</h3>

            <p class="book-release">📅 Releasing December 2026</p>

            <div class="price-options">
                <div class="price-box">
                    <span class="price-label">Ebook</span>
                    <span class="price-amount">₱299</span>
                </div>
                <div class="price-box">
                    <span class="price-label">Paperback</span>
                    <span class="price-amount">₱599</span>
                </div>
            </div>

           <?php if (isset($_SESSION['account_id'])): ?>
    <div class="font-accent tracking-wide inline-block bg-gradient-to-br from-purple-deep via-purple-main to-purple-light text-white font-bold px-7 py-3 rounded-lg">
        🎉 Thanks for supporting, <?= htmlspecialchars($_SESSION['username']) ?>!
    </div>
<?php else: ?>
    <a href="#" id="preorderBtn" class="preorder-btn">Pre-order Now</a>
<?php endif; ?>
            <p class="preorder-note">* Link a real order form/store here once ready.</p>
        </div>
    </div>

    <div class="character-section">
        <h2>Synopsis</h2>
        <p>
            Kairos never expected his last year at Goldenfield Academy to unravel the way it did.
            Between shifting friendships, unspoken feelings, and the quiet weight of growing up,
            Class 7-A's final year becomes a story none of them are ready to let go of.
        </p>
        <p>
            Amiable 7th is a story about the small, ordinary moments that end up mattering most —
            the ones you don't realize you'll miss until they're gone.
        </p>
    </div>

    <div class="perks-section">
        <h2>Pre-order Perks</h2>
        <div class="perks-grid">
            <div class="perk-card">
                <span class="perk-icon">🔖</span>
                <p>Exclusive character bookmark</p>
            </div>
            <div class="perk-card">
                <span class="perk-icon">✍️</span>
                <p>Signed first-print copies</p>
            </div>
            <div class="perk-card">
                <span class="perk-icon">🎨</span>
                <p>Digital wallpaper pack</p>
            </div>
        </div>
    </div>

  
    <div id="loginModalOverlay" class="fixed inset-0 z-50 hidden items-center justify-center bg-purple-deep/60">
        <div class="relative w-11/12 max-w-sm bg-white rounded-xl p-8 text-center">
            <button type="button" id="closeModalBtn" aria-label="Close"
                class="absolute top-2 right-3 text-2xl leading-none text-purple-main hover:text-purple-deep">
                &times;
            </button>

            <h2 class="font-title text-3xl text-purple-deep mb-1">Log In to Pre-order</h2>
            <p class="text-sm text-gray-500 mb-6">Please log in to reserve your copy.</p>

            <form action="loginprocess.php" method="POST" class="flex flex-col text-left gap-1">
    <input type="hidden" name="redirect" value="preorder.php">

    <label for="modalIdentifier" class="font-accent text-xs font-semibold text-purple-main mt-2">Username or Email</label>
    <input type="text" id="modalIdentifier" name="identifier" required
        class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

    <label for="modalPassword" class="font-accent text-xs font-semibold text-purple-main mt-2">Password</label>
    <input type="password" id="modalPassword" name="password" required
        class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

    <button type="submit"
        class="font-accent tracking-wide mt-5 bg-gradient-to-br from-purple-deep via-purple-main to-purple-light text-white font-bold py-3 rounded-lg hover:shadow-lg hover:-translate-y-1 transition">
        Log In
    </button>
</form>

            <p class="text-sm mt-4">Don't have an account? <a href="signup.php" class="text-purple-main font-bold underline">Sign up</a></p>
        </div>
    </div>

   
    <script>
    const preorderBtn = document.getElementById('preorderBtn');
    if (preorderBtn) {
        preorderBtn.addEventListener('click', function (e) {
            e.preventDefault();
            document.getElementById('loginModalOverlay').classList.remove('hidden');
            document.getElementById('loginModalOverlay').classList.add('flex');
        });
    }
            e.preventDefault();
            document.getElementById('loginModalOverlay').classList.remove('hidden');
            document.getElementById('loginModalOverlay').classList.add('flex');
        });
    }

    document.getElementById('closeModalBtn').addEventListener('click', function () {
        document.getElementById('loginModalOverlay').classList.add('hidden');
        document.getElementById('loginModalOverlay').classList.remove('flex');
    });

    document.getElementById('loginModalOverlay').addEventListener('click', function (e) {
        if (e.target === this) {
            this.classList.add('hidden');
            this.classList.remove('flex');
        }
    });
</script>
</body>

</html>