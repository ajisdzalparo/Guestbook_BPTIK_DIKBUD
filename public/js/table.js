// table
document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('customerTable');
    const tbody = table.querySelector('tbody');
    const rows = Array.from(tbody.querySelectorAll('tr'));

    // Fungsi untuk mengurutkan tabel berdasarkan kolom tertentu
    function sortTable(columnIndex, ascending) {
        rows.sort((a, b) => {
            const aValue = a.children[columnIndex].textContent.trim();
            const bValue = b.children[columnIndex].textContent.trim();
            return ascending ? aValue.localeCompare(bValue) : bValue.localeCompare(aValue);
        });

        rows.forEach(row => tbody.appendChild(row));
    }

    // Inisialisasi sorting
    let currentColumn = -1;
    let ascending = true;
    const ths = Array.from(table.querySelectorAll('thead th'));
    ths.forEach((th, index) => {
        th.addEventListener('click', () => {
            if (currentColumn === index) {
                ascending = !ascending;
            } else {
                currentColumn = index;
                ascending = true;
            }

            ths.forEach(header => header.classList.remove('bg-gray-400', 'bg-gray-200'));
            th.classList.add(ascending ? 'bg-gray-400' : 'bg-gray-200');

            sortTable(index, ascending);
        });
    });

    // Fungsi untuk menyoroti baris yang dipilih
    function highlightRow(row) {
        row.classList.add('bg-yellow-100');
    }

    // Event listener untuk menyoroti baris saat diklik
    rows.forEach(row => {
        row.addEventListener('click', () => {
            rows.forEach(r => r.classList.remove('bg-yellow-100'));
            highlightRow(row);
        });
    });
});