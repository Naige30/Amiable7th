const filterButtons = document.querySelectorAll('.filter-btn');
const characterCards = document.querySelectorAll('.character-list li');
const searchInput = document.getElementById('searchInput');

let currentFilter = 'all';

function updateDisplay() {
    const searchTerm = searchInput.value.toLowerCase();

    characterCards.forEach(function (card) {
        const matchesFilter = currentFilter === 'all' || card.dataset.class === currentFilter;
        const name = card.querySelector('span').textContent.toLowerCase();
        const matchesSearch = name.includes(searchTerm);

        if (matchesFilter && matchesSearch) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
}

filterButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        currentFilter = button.dataset.filter;

        filterButtons.forEach(function (btn) {
            btn.classList.remove('active');
        });
        button.classList.add('active');

        updateDisplay();
    });
});

searchInput.addEventListener('input', updateDisplay);