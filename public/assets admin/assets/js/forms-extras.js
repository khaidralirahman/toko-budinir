// Memastikan DOM telah dimuat sepenuhnya sebelum menjalankan kode JavaScript
document.addEventListener("DOMContentLoaded", function() {
    // Menangkap elemen button dengan atribut data-repeater-create
    var addButton = document.querySelector('[data-repeater-create]');

    // Menambahkan event listener untuk button create
    addButton.addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah perilaku default dari button

        // Mendapatkan template field repeater
        var repeaterItem = document.querySelector('[data-repeater-item]');

        // Menggandakan template field repeater
        var clone = repeaterItem.cloneNode(true);

        // Menambahkan field repeater yang baru ke dalam DOM
        repeaterItem.parentNode.appendChild(clone);

        // Menambahkan event listener untuk tombol delete pada field repeater yang baru
        var deleteButton = clone.querySelector('[data-repeater-delete]');
        deleteButton.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default dari button

            // Menghapus field repeater yang berada di dalam parentnya
            this.closest('[data-repeater-item]').remove();

            // Memeriksa apakah masih ada form yang tersisa
            var remainingForms = document.querySelectorAll('[data-repeater-item]');
            if (remainingForms.length === 0) {
                // Jika tidak ada, tambahkan form baru
                addButton.click();
            }
        });
    });

    // Menangkap elemen button dengan atribut data-repeater-delete
    var deleteButtons = document.querySelectorAll('[data-repeater-delete]');

    // Menambahkan event listener untuk setiap button delete
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Mencegah perilaku default dari button

            // Menghapus field repeater yang berada di dalam parentnya
            this.closest('[data-repeater-item]').remove();

            // Memeriksa apakah masih ada form yang tersisa
            var remainingForms = document.querySelectorAll('[data-repeater-item]');
            if (remainingForms.length === 0) {
                // Jika tidak ada, tambahkan form baru
                addButton.click();
            }
        });
    });
  });
