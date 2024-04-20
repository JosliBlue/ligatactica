<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 999;
        display: none;
        user-select: none;
    }

    .floating_window {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #1a1a1a;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        min-height: 150px;
        z-index: 1000;
        display: none;
    }

    .floating_window .message {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .show_floating_window_btn,
    .hide_floating_window_btn {
        display: block;
        margin: 20px auto;
        padding: 10px 20px;
        font-size: 16px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

</style>

<button class="show_floating_window_btn">{{ $textShow }}</button>

<div class="overlay">
    <div class="floating_window">
        <div class="content">
            {{ $content }}
            <button class="hide_floating_window_btn">{{ $textClose }}</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const showFloatingWindowBtns = document.querySelectorAll(".show_floating_window_btn");
        const floatingWindows = document.querySelectorAll(".floating_window");
        const hideFloatingWindowBtns = document.querySelectorAll(".hide_floating_window_btn");
        const overlays = document.querySelectorAll(".overlay");

        showFloatingWindowBtns.forEach(function(showBtn, index) {
            showBtn.addEventListener("click", function() {
                floatingWindows[index].style.display = "block";
                overlays[index].style.display = "block";
            });
        });

        hideFloatingWindowBtns.forEach(function(hideBtn, index) {
            hideBtn.addEventListener("click", function() {
                floatingWindows[index].style.display = "none";
                overlays[index].style.display = "none";
            });
        });
    });
</script>
