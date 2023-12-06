const manageBtns = document.querySelectorAll('.manage-btn');
manageBtns.forEach(btn => {
    btn.addEventListener('click', function() {
        const btnId = this.id;
        window.location.href = `${btnId}.php`;
    });
});