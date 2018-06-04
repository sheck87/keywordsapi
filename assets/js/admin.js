$(function () {
    $('#logout-btn').on('click', () => {
        if (!confirm('Уверены?')) {
            return;
        }

        $.post('admin.php', {action: 'logout'}, function () {
            document.location.reload();
        })
    });
});