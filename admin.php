<?php
session_start();

if (!isset($_SESSION['account_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php?status=" . urlencode("Please log in as an admin to access this page."));
    exit;
}

require_once "db.php";

$msgResult = $conn->query("SELECT message_id, name, email, message, created_at FROM messages ORDER BY created_at DESC");
$msgCount = $msgResult ? $msgResult->num_rows : 0;

$acctResult = $conn->query("SELECT account_id, username, email, role FROM accounts ORDER BY account_id ASC");
$acctCount = $acctResult ? $acctResult->num_rows : 0;
?>
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
        <div class="flex items-center gap-6">
            <nav>
                <a href="index.php" class="text-white font-bold">Home</a>
                <a href="index.php#characters" class="text-white font-bold">Characters</a>
                <a href="preorder.php" class="text-white font-bold">Pre-Order</a>
                <a href="about.php" class="text-white font-bold">About Naige</a>
            </nav>

            <div class="flex items-center gap-3 text-white text-sm font-accent font-bold">
                <span>Hi, <?= htmlspecialchars($_SESSION['username']) ?></span>
                <a href="logout.php" class="bg-white/20 hover:bg-white/30 px-3 py-1 rounded-lg transition">Log Out</a>
            </div>
        </div>
    </header>

    <div class="welcome-section bg-gradient-to-br from-purple-deep via-purple-main to-purple-light border-none">
        <h1 class="font-title text-5xl text-white">Admin Dashboard</h1>
        <p class="text-purple-light">Manage contact messages and user accounts.</p>
    </div>

    
    <div class="flex flex-wrap items-center justify-between gap-3 max-w-4xl mx-auto mb-4 px-2 mt-8">
        <h2 class="font-accent text-xl text-purple-deep font-bold">Contact Messages (<?= $msgCount ?>)</h2>
        <button id="clearAllBtn" class="font-accent text-sm font-bold text-white bg-gradient-to-br from-purple-deep via-purple-main to-purple-light px-4 py-2 rounded-lg hover:shadow-lg hover:-translate-y-0.5 transition">
            Clear All
        </button>
    </div>
            Clear All
        </button>
    </div>

    <div class="max-w-4xl mx-auto grid gap-4 px-2 pb-8">
        <?php if ($msgCount > 0): ?>
            <?php while ($row = $msgResult->fetch_assoc()): ?>
                <div class="bg-white border border-purple-main rounded-xl p-5 flex flex-col sm:flex-row sm:items-center gap-4 message-card"
                     data-id="<?= (int)$row['message_id'] ?>"
                     data-name="<?= htmlspecialchars($row['name']) ?>"
                     data-email="<?= htmlspecialchars($row['email']) ?>"
                     data-message="<?= htmlspecialchars($row['message']) ?>"
                     data-date="<?= htmlspecialchars($row['created_at']) ?>">
                    <div class="flex-1 min-w-0 text-left">
                        <p class="font-accent font-bold text-purple-deep"><?= htmlspecialchars($row['name']) ?></p>
                        <p class="text-xs text-gray-400 mb-1"><?= htmlspecialchars($row['email']) ?> • <?= htmlspecialchars($row['created_at']) ?></p>
                        <p class="text-sm text-gray-700 truncate"><?= htmlspecialchars($row['message']) ?></p>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button type="button" class="viewBtn font-accent text-xs font-bold text-white bg-purple-main px-3 py-2 rounded-lg hover:bg-purple-deep transition">View</button>
                        <button type="button" class="deleteMsgBtn font-accent text-xs font-bold text-white bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-purple-main font-bold">No messages yet.</p>
        <?php endif; ?>
    </div>

    
    <div class="flex flex-wrap items-center justify-between gap-3 max-w-4xl mx-auto mb-4 px-2 mt-12">
        <h2 class="font-accent text-xl text-purple-deep font-bold">Accounts (<?= $acctCount ?>)</h2>
    </div>

    <div class="max-w-4xl mx-auto grid gap-4 px-2 pb-16">
        <?php if ($acctCount > 0): ?>
            <?php while ($row = $acctResult->fetch_assoc()): ?>
                <div class="bg-white border border-purple-main rounded-xl p-5 flex flex-col sm:flex-row sm:items-center gap-4 account-card"
                     data-id="<?= (int)$row['account_id'] ?>"
                     data-username="<?= htmlspecialchars($row['username']) ?>"
                     data-email="<?= htmlspecialchars($row['email']) ?>"
                     data-role="<?= htmlspecialchars($row['role']) ?>">
                    <div class="flex-1 min-w-0 text-left">
                        <p class="font-accent font-bold text-purple-deep">
                            <?= htmlspecialchars($row['username']) ?>
                            <?php if ($row['role'] === 'admin'): ?>
                                <span class="text-xs bg-purple-main text-white px-2 py-0.5 rounded-full ml-2">Admin</span>
                            <?php endif; ?>
                        </p>
                        <p class="text-xs text-gray-400"><?= htmlspecialchars($row['email']) ?></p>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button type="button" class="editAcctBtn font-accent text-xs font-bold text-white bg-purple-main px-3 py-2 rounded-lg hover:bg-purple-deep transition">Edit</button>
                        <?php if ((int)$row['account_id'] !== (int)$_SESSION['account_id']): ?>
                            <button type="button" class="deleteAcctBtn font-accent text-xs font-bold text-white bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600 transition">Delete</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center text-purple-main font-bold">No accounts found.</p>
        <?php endif; ?>
    </div>

    
    <div id="viewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-purple-deep/60">
        <div class="relative w-11/12 max-w-lg bg-white rounded-xl p-8">
            <button type="button" id="closeViewModal" aria-label="Close"
                class="absolute top-2 right-3 text-2xl leading-none text-purple-main hover:text-purple-deep">
                &times;
            </button>

            <h2 class="font-title text-3xl text-purple-deep mb-1">Message</h2>
            <p id="modalDate" class="text-xs text-gray-400 mb-4"></p>

            <div class="grid gap-3 text-left">
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">From</span>
                    <p id="modalName" class="text-sm"></p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Email</span>
                    <p id="modalEmail" class="text-sm"></p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Message</span>
                    <p id="modalMessage" class="text-sm whitespace-pre-wrap"></p>
                </div>
            </div>
        </div>
    </div>
                class="absolute top-2 right-3 text-2xl leading-none text-purple-main hover:text-purple-deep">
                &times;
            </button>

            <h2 class="font-title text-3xl text-purple-deep mb-1">Message</h2>
            <p id="modalDate" class="text-xs text-gray-400 mb-4"></p>

            <div class="grid gap-3 text-left">
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">From</span>
                    <p id="modalName" class="text-sm"></p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Email</span>
                    <p id="modalEmail" class="text-sm"></p>
                </div>
                <div>
                    <span class="font-accent text-xs font-semibold text-purple-main block">Message</span>
                    <p id="modalMessage" class="text-sm whitespace-pre-wrap"></p>
                </div>
            </div>
        </div>
    </div>
  
    <div id="editAcctModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-purple-deep/60">
        <div class="relative w-11/12 max-w-lg bg-white rounded-xl p-8">
            <button type="button" id="closeEditAcctModal" aria-label="Close"
                class="absolute top-2 right-3 text-2xl leading-none text-purple-main hover:text-purple-deep">
                &times;
            </button>

            <h2 class="font-title text-3xl text-purple-deep mb-4">Edit Account</h2>

            <form id="editAcctForm" class="grid gap-3 text-left">
                <input type="hidden" id="editId" name="id">

                <div>
                    <label class="font-accent text-xs font-semibold text-purple-main block">Username</label>
                    <input type="text" id="editUsername" name="username" required
                        class="border border-purple-light rounded-md px-3 py-2 text-sm w-full">
                </div>

                <div>
                    <label class="font-accent text-xs font-semibold text-purple-main block">Email</label>
                    <input type="email" id="editEmail" name="email" required
                        class="border border-purple-light rounded-md px-3 py-2 text-sm w-full">
                </div>

                <div>
                    <label class="font-accent text-xs font-semibold text-purple-main block">Role</label>
                    <select id="editRole" name="role" class="border border-purple-light rounded-md px-3 py-2 text-sm w-full">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>

                <div>
                    <label class="font-accent text-xs font-semibold text-purple-main block">New Password (leave blank to keep current)</label>
                    <input type="text" id="editPassword" name="password"
                        class="border border-purple-light rounded-md px-3 py-2 text-sm w-full">
                </div>

                <button type="submit"
                    class="font-accent tracking-wide mt-3 bg-gradient-to-br from-purple-deep via-purple-main to-purple-light text-white font-bold py-2 rounded-lg hover:shadow-lg transition">
                    Save Changes
                </button>
            </form>
        </div>
    </div>

    <script>
        // view
        const viewModal = document.getElementById('viewModal');

        document.querySelectorAll('.viewBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const card = btn.closest('.message-card');
                document.getElementById('modalName').textContent = card.dataset.name;
                document.getElementById('modalEmail').textContent = card.dataset.email;
                document.getElementById('modalMessage').textContent = card.dataset.message;
                document.getElementById('modalDate').textContent = card.dataset.date;
                viewModal.classList.remove('hidden');
                viewModal.classList.add('flex');
            });
        });

        document.getElementById('closeViewModal').addEventListener('click', () => {
            viewModal.classList.add('hidden');
            viewModal.classList.remove('flex');
        });

        // clear
        document.querySelectorAll('.deleteMsgBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const card = btn.closest('.message-card');
                if (!confirm('Delete this message?')) return;
                fetch('admin_action.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'action=delete&id=' + encodeURIComponent(card.dataset.id)
                }).then(() => location.reload());
            });
        });

        document.getElementById('clearAllBtn').addEventListener('click', () => {
            if (!confirm('Delete ALL messages? This cannot be undone.')) return;
            fetch('admin_action.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'action=clear'
            }).then(() => location.reload());
        });

        // edit
        const editAcctModal = document.getElementById('editAcctModal');

        document.querySelectorAll('.editAcctBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const card = btn.closest('.account-card');
                document.getElementById('editId').value = card.dataset.id;
                document.getElementById('editUsername').value = card.dataset.username;
                document.getElementById('editEmail').value = card.dataset.email;
                document.getElementById('editRole').value = card.dataset.role;
                document.getElementById('editPassword').value = '';
                editAcctModal.classList.remove('hidden');
                editAcctModal.classList.add('flex');
            });
        });

        document.getElementById('closeEditAcctModal').addEventListener('click', () => {
            editAcctModal.classList.add('hidden');
            editAcctModal.classList.remove('flex');
        });

        document.getElementById('editAcctForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const form = e.target;
            const params = new URLSearchParams({
                action: 'edit',
                id: form.id.value,
                username: form.username.value,
                email: form.email.value,
                role: form.role.value,
                password: form.password.value
            });
            fetch('accounts_action.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: params.toString()
            }).then(() => location.reload());
        });

        // delete
        document.querySelectorAll('.deleteAcctBtn').forEach(btn => {
            btn.addEventListener('click', () => {
                const card = btn.closest('.account-card');
                if (!confirm('Delete account "' + card.dataset.username + '"? This cannot be undone.')) return;
                fetch('accounts_action.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'action=delete&id=' + encodeURIComponent(card.dataset.id)
                }).then(() => location.reload());
            });
        });
    </script>
</body>

</html>