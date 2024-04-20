<!-- import -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@vite('resources/css/components/header.css')

<!-- navbar -->
<header>
    <div class="navbar">
        <div class="logo">
            <div class="imgLogo"></div>
            <h1>{{ env('NOMBRE_LIGA') }}</h1>
        </div>
        @component('_components.headerOptions', ['type' => 'nav-link_p'])
        @endcomponent

        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="dropdown_menu">
        @component('_components.headerOptions', ['type' => 'nav-link'])
        @endcomponent
    </div>

    <script>
        // When the DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            // Select all links with the class '.nav-link'
            const navLinks = document.querySelectorAll('.nav-link_p');
            let activeLink = null; // Store the active link

            // Function to set the 'active' class to the link corresponding to the current page
            function setActiveLink() {
                // Loop through each link
                navLinks.forEach(link => {
                    // Check if the link's href matches the current page's URL
                    if (link.href === window.location.href) {
                        link.classList.add('active'); // Add 'active' class to the matching link
                        activeLink = link; // Store the active link
                    } else {
                        link.classList.remove('active'); // Remove 'active' class from non-matching links
                    }
                });
            }

            // Call setActiveLink function on page load
            setActiveLink();

            // Add event listeners for hover, click, and mouseout to each link
            navLinks.forEach(link => {
                // Add event listener for hover
                link.addEventListener('mouseover', function() {
                    // Remove 'active' class from the current active link
                    if (activeLink !== null && activeLink !== this) {
                        activeLink.classList.remove('active');
                    }
                    this.classList.add('active'); // Add 'active' class to the hovered link
                });

                // Add event listener for mouseout
                link.addEventListener('mouseout', function() {
                    // Set the 'active' class to the link corresponding to the current page
                    if (!this.classList.contains('clicked')) {
                        setActiveLink();
                    }
                });

                // Add event listener for click
                link.addEventListener('click', function() {
                    activeLink = this; // Update the active link when clicked
                    this.classList.add('clicked'); // Mark the link as clicked
                });
            });
        });

        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open')
            const isOpen = dropDownMenu.classList.contains('open')

            toggleBtnIcon.classList = isOpen ?
                'fa-solid fa-xmark' :
                'fa-solid fa-bars'
        }
    </script>
</header>
