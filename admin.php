<!DOCTYPE html>
<html>

<head>
    <title>Admin — Amiable 7th</title>
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
        <nav>
            <a href="index.php" class="text-white font-bold">Home</a>
            <a href="index.php#characters" class="text-white font-bold">Characters</a>
            <a href="preorder.php" class="text-white font-bold">Pre-Order</a>
            <a href="about.php" class="text-white font-bold">About Naige</a>
        </nav>
    </header>

    <div class="welcome-section bg-gradient-to-br from-purple-deep via-purple-main to-purple-light border-none">
        <h1 class="font-title text-5xl text-white">Admin — Contact Messages</h1>
        <p class="text-purple-light">Messages submitted through the "Contact Naige" form on the About page.</p>
    </div>

    <div class="flex flex-wrap items-center justify-between gap-3 max-w-4xl mx-auto mb-4 px-2">
        <span class="font-accent text-sm text-purple-deep font-bold">3 messages</span>
        <button class="font-accent text-sm font-bold text-white bg-gradient-to-br from-purple-deep via-purple-main to-purple-light px-4 py-2 rounded-lg hover:shadow-lg hover:-translate-y-0.5 transition">
            Clear All
        </button>
    </div>

    <div class="max-w-4xl mx-auto grid gap-4 px-2 pb-16">

        <!-- Sample message card 1 -->
        <div class="bg-white border border-purple-main rounded-xl p-5 flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="flex-1 min-w-0 text-left">
                <p class="font-accent font-bold text-purple-deep">Heather Cruz</p>
                <p class="text-xs text-gray-400 mb-1">heather.cruz@email.com • Sep 10, 2026, 3:42 PM</p>
                <p class="text-sm text-gray-700 truncate">I just finished reading the character bios and I'm already attached to Kairos...</p>
            </div>
            <div class="flex gap-2 shrink-0">
                <button class="font-accent text-xs font-bold text-white bg-purple-main px-3 py-2 rounded-lg hover:bg-purple-deep transition">View</button>
                <button class="font-accent text-xs font-bold text-white bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
            </div>
        </div>

        <!-- Sample message card 2 -->
        <div class="bg-white border border-purple-main rounded-xl p-5 flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="flex-1 min-w-0 text-left">
                <p class="font-accent font-bold text-purple-deep">Marco Villanueva</p>
                <p class="text-xs text-gray-400 mb-1">marco.v@email.com • Sep 9, 2026, 11:05 AM</p>
                <p class="text-sm text-gray-700 truncate">When is the paperback pre-order opening? Also loved the wallpaper pack teaser!</p>
            </div>
            <div class="flex gap-2 shrink-0">
                <button class="font-accent text-xs font-bold text-white bg-purple-main px-3 py-2 rounded-lg hover:bg-purple-deep transition">View</button>
                <button class="font-accent text-xs font-bold text-white bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
            </div>
        </div>

        <!-- Sample message card 3 -->
        <div class="bg-white border border-purple-main rounded-xl p-5 flex flex-col sm:flex-row sm:items-center gap-4">
            <div class="flex-1 min-w-0 text-left">
                <p class="font-accent font-bold text-purple-deep">Jamie Santos</p>
                <p class="text-xs text-gray-400 mb-1">jamie.santos@email.com • Sep 7, 2026, 8:19 PM</p>
                <p class="text-sm text-gray-700 truncate">Class 7-A's chip list made my day, will there be a Class 7-B spotlight soon?</p>
            </div>
            <div class="flex gap-2 shrink-0">
                <button class="font-accent text-xs font-bold text-white bg-purple-main px-3 py-2 rounded-lg hover:bg-purple-deep transition">View</button>
                <button class="font-accent text-xs font-bold text-white bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
            </div>
        </div>

    </div>

    <!-- Empty state, for reference — hidden by default since sample cards are shown above -->
    <p class="text-center text-purple-main font-bold hidden">
        No messages yet.
    </p>

    <!-- "View" popup — just the visual design. Not connected to the buttons above yet. -->
    <div class="fixed inset-0 z-50 hidden items-center justify-center bg-purple-deep/60">
        <div class="relative w-11/12 max-w-lg bg-white rounded-xl p-8">
            <button type="button" aria-label="Close"
                class="absolute top-2 right-3 text-2xl leading-none text-purple-main hover:text-purple-deep">
                &times;
            </button>

            <h2 class="font-title text-3xl text-purple-deep mb-1">Message</h2>
            <p class="text-xs text-gray-400 mb-4">Sep 10, 2026, 3:42 PM</p>

            <div class="grid gap-3 text-left">
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">From</span>
                    <p class="text-sm">Heather Cruz</p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Email</span>
                    <p class="text-sm">heather.cruz@email.com</p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Message</span>
                    <p class="text-sm whitespace-pre-wrap">I just finished reading the character bios and I'm already attached to Kairos. Can't wait for the paperback!</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>