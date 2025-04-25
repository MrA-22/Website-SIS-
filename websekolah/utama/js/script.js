// Function to toggle the sidebar
function toggleMenu() { 
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("main-content");

    if (sidebar.style.left === "0px") {
        sidebar.style.left = "-250px";  // Hide sidebar
        mainContent.classList.remove("main-content-shift");
    } else {
        sidebar.style.left = "0px";     // Show sidebar
        mainContent.classList.add("main-content-shift");
    }
}

// Swiper configuration
var swiper = new Swiper('.swiper-container', {
    loop: true, // Looping
    autoplay: {
        delay: 1000, // Delay between slides
        disableOnInteraction: false, // Continue autoplay after interaction
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true, // Make pagination clickable
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    slidesPerView: 2, // Display 2 images simultaneously
    spaceBetween: 20, // Space between images
});

// Update statistics bar
document.querySelectorAll('.stat-item').forEach(function (item) {
    const max = item.getAttribute('data-max'); // Get max value from data-max attribute
    const value = item.querySelector('.stat-number').textContent; // Value from stat-number
    const bar = item.querySelector('.bar');
    
    // Calculate percentage
    const percentage = (value / max) * 100;
    
    // Update bar width based on percentage
    bar.style.width = percentage + '%';
});

// Highcharts configuration for population chart
Highcharts.chart('population-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Jumlah Aparat dan Siswa'
    },
    xAxis: {
        categories: ['Guru', 'Siswa']
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        }
    },
    series: [{
        name: 'Guru dan Siswa',
        data: [73, 61]
    }]
});
