if ($("#sidebar a").hasClass('active')) {
    $("#sidebar a.active").parents('div:first').collapse();
}

$("body").on("click", ".confirm-delete", function (e) {
    if (confirm('are you sure?')) {
        let form = $(this).closest('form');
        form.submit();
    }
});