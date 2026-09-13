<!DOCTYPE html>
<html>

<head>
    <title>Sign Up — Amiable 7th</title>
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
            <a href="login.php" class="text-white font-bold">Log In</a>
        </nav>
    </header>

    <div class="flex justify-center py-10 px-4">
        <div class="w-full max-w-sm bg-white border border-purple-main rounded-xl p-8 text-center shadow-sm">
            <h1 class="font-title text-4xl text-purple-deep mb-2">Create an Account</h1>
            <p class="text-sm text-gray-500 mb-6">Join Amiable 7th to pre-order the book and follow the story.</p>

            <form class="flex flex-col text-left gap-1">
                <label for="username" class="font-accent text-xs font-semibold text-purple-main mt-2">Username</label>
                <input type="text" id="username" name="username"
                    class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

                <label for="email" class="font-accent text-xs font-semibold text-purple-main mt-2">Email</label>
                <input type="email" id="email" name="email"
                    class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

                <label for="password" class="font-accent text-xs font-semibold text-purple-main mt-2">Password</label>
                <input type="password" id="password" name="password"
                    class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

                <label for="confirm_password" class="font-accent text-xs font-semibold text-purple-main mt-2">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password"
                    class="border border-purple-light rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-purple-main/30 focus:border-purple-main">

                <button type="submit"
                    class="font-accent tracking-wide mt-5 bg-gradient-to-br from-purple-deep via-purple-main to-purple-light text-white font-bold py-3 rounded-lg hover:shadow-lg hover:-translate-y-1 transition">
                    Sign Up
                </button>
            </form>

            <p class="text-sm mt-4">Already have an account? <a href="login.php" class="text-purple-main font-bold underline">Log in</a></p>
        </div>
    </div>
</body>

</html>