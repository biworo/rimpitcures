import './bootstrap';


document.querySelector(".hamburger-menu").addEventListener('click', function () {
    this.classList.toggle('active');
    document.querySelector('.main-menu').classList.toggle('active');
});

document.addEventListener('DOMContentLoaded', function () {

    // Smooth scrolling effect for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector('.main-menu').classList.toggle('active');
            const targetId = this.getAttribute('href');

            // remove all active calss
            // document.querySelectorAll('.nav-link').forEach((item) => {
            //     item.classList.remove('active');
            // })

            // add class active regarding the active section #
            // this.classList.add('active');

            // Mendapatkan elemen target berdasarkan ID dari href
            const targetElement = document.querySelector(targetId);

            // Mendapatkan posisi elemen target
            const targetPosition = targetElement.offsetTop;

            // Menyesuaikan posisi dengan nilai tertentu (misalnya, 45px)
            const adjustedPosition = targetPosition - 77;

            // Menggunakan scrollIntoView dengan efek scroll halus
            window.scrollTo({
                top: adjustedPosition,
                behavior: 'smooth'
            });
        });
    });


    const links = document.querySelectorAll('.navbar-nav a[href^="#"]');
    const sections = document.querySelectorAll('.section-wrapper');

    function changeLinkState() {
        let index = sections.length;


        while (--index && window.scrollY + 100 < sections[index].offsetTop) { }

        links.forEach((link) => link.classList.remove('active'));
        links[index].classList.add('active');
    }

    changeLinkState();
    window.addEventListener('scroll', changeLinkState);



});

