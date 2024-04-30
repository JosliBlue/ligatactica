<style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        backdrop-filter: blur(5px);
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
        animation: openWindow 0.3s ease-in-out forwards;
    }

    .show_floating_window_btn {
        padding: 0.5rem 1rem;
        background-color: transparent;
        font-size: 16px;
        border: solid 1px #e8a107;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.1s ease-in-out;
    }

    .hide_floating_window_btn {
        width: 100%;
        padding: 0.5rem 1rem;
        background-color: transparent;
        font-size: 16px;
        border: solid 1px #e80729;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.1s ease-in-out;
        margin: 10px 0 1px 0;
    }

    .content{
        width: 400px;
    }

    .show_floating_window_btn:hover {
        color: #e8a107;
        transition: all 0.1s ease-in;
    }

    .hide_floating_window_btn:hover {
        color: #e80729;
        transition: all 0.1s ease-in;
    }

    @keyframes openWindow {
        from {
            transform: translate(-50%, -50%) scale(0.9);
            opacity: 0;
        }

        to {
            transform: translate(-50%, -50%) scale(1);
            opacity: 1;
        }
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
                floatingWindows[index].classList.remove(
                    "closing");
                floatingWindows[index].style.display = "block";
                overlays[index].style.display = "block";
            });
        });

        hideFloatingWindowBtns.forEach(function(hideBtn, index) {
            hideBtn.addEventListener("click", function() {
                floatingWindows[index].classList.add("closing");
                overlays[index].style.display = "none";
            });
        });
    });
</script>
