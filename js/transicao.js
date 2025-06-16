 window.addEventListener('DOMContentLoaded', () => {
        document.body.classList.add('fade-in');
    });

    const links = document.querySelectorAll("a[href]");
    links.forEach(link => {
        link.addEventListener("click", function(e) {
            const url = this.href;
            if (url && !url.includes("#")) {
                e.preventDefault();
                document.body.classList.remove("fade-in");
                document.body.style.opacity = "0";
                setTimeout(() => {
                    window.location.href = url;
                }, 500); 
            }
        });
    });
