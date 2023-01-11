<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('image-btn').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=1200,height=700');
        });
    });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image-input').value = $url;
        document.getElementById('image-preview').src = $url;
    }
</script>
