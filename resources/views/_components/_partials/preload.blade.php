<!-- imports for component -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@vite('resources/css/components/preload.css')

<!-- component html -->
<div class="centrado" id="onload">
    <div class="loader"></div>
</div>

<!-- component javascript-->
<script>
    window.onload = function() {
        $('#onload').fadeOut();
        $('body').removeClass('hidden')
    }
</script>
