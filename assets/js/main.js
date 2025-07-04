(function() {
  "use strict";

  function toggleScrolled() {
    const selectBody = document.querySelector('body');
    const selectHeader = document.querySelector('#header');
    if (!selectHeader.classList.contains('scroll-up-sticky') && !selectHeader.classList.contains('sticky-top') && !selectHeader.classList.contains('fixed-top')) return;
    window.scrollY > 100 ? selectBody.classList.add('scrolled') : selectBody.classList.remove('scrolled');
  }

  document.addEventListener('scroll', toggleScrolled);
  window.addEventListener('load', toggleScrolled);

  const mobileNavToggleBtn = document.querySelector('.mobile-nav-toggle');

  function mobileNavToogle() {
    document.querySelector('body').classList.toggle('mobile-nav-active');
    mobileNavToggleBtn.classList.toggle('bi-list');
    mobileNavToggleBtn.classList.toggle('bi-x');
  }
  mobileNavToggleBtn.addEventListener('click', mobileNavToogle);

  document.querySelectorAll('#navmenu a').forEach(navmenu => {
    navmenu.addEventListener('click', () => {
      if (document.querySelector('.mobile-nav-active')) {
        mobileNavToogle();
      }
    });

  });

  document.querySelectorAll('.navmenu .toggle-dropdown').forEach(navmenu => {
    navmenu.addEventListener('click', function(e) {
      e.preventDefault();
      this.parentNode.classList.toggle('active');
      this.parentNode.nextElementSibling.classList.toggle('dropdown-active');
      e.stopImmediatePropagation();
    });
  });

  const preloader = document.querySelector('#preloader');
  if (preloader) {
    window.addEventListener('load', () => {
      preloader.remove();
    });
  }


  let scrollTop = document.querySelector('.scroll-top');

  function toggleScrollTop() {
    if (scrollTop) {
      window.scrollY > 100 ? scrollTop.classList.add('active') : scrollTop.classList.remove('active');
    }
  }
  scrollTop.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  });

  window.addEventListener('load', toggleScrollTop);
  document.addEventListener('scroll', toggleScrollTop);

  function aosInit() {
    AOS.init({
      duration: 600,
      easing: 'ease-in-out',
      once: true,
      mirror: false
    });
  }
  window.addEventListener('load', aosInit);

  const glightbox = GLightbox({
    selector: '.glightbox'
  });


  new PureCounter();

  function initSwiper() {
    document.querySelectorAll(".init-swiper").forEach(function(swiperElement) {
      let config = JSON.parse(
        swiperElement.querySelector(".swiper-config").innerHTML.trim()
      );

      if (swiperElement.classList.contains("swiper-tab")) {
        initSwiperWithCustomPagination(swiperElement, config);
      } else {
        new Swiper(swiperElement, config);
      }
    });
  }

  window.addEventListener("load", initSwiper);
  window.addEventListener('load', function(e) {
    if (window.location.hash) {
      if (document.querySelector(window.location.hash)) {
        setTimeout(() => {
          let section = document.querySelector(window.location.hash);
          let scrollMarginTop = getComputedStyle(section).scrollMarginTop;
          window.scrollTo({
            top: section.offsetTop - parseInt(scrollMarginTop),
            behavior: 'smooth'
          });
        }, 100);
      }
    }
  });
  let navmenulinks = document.querySelectorAll('.navmenu a');

  function navmenuScrollspy() {
    navmenulinks.forEach(navmenulink => {
      if (!navmenulink.hash) return;
      let section = document.querySelector(navmenulink.hash);
      if (!section) return;
      let position = window.scrollY + 200;
      if (position >= section.offsetTop && position <= (section.offsetTop + section.offsetHeight)) {
        document.querySelectorAll('.navmenu a.active').forEach(link => link.classList.remove('active'));
        navmenulink.classList.add('active');
      } else {
        navmenulink.classList.remove('active');
      }
    })
  }
  window.addEventListener('load', navmenuScrollspy);
  document.addEventListener('scroll', navmenuScrollspy);

})();

document.getElementById("calculatePriceBtn").addEventListener("click", function () {
  const form = document.querySelector(".php-email-form");

  if (!form.checkValidity()) {
    form.reportValidity(); 
    return;
  }

  const name = document.getElementById("name").value;
  const phone = document.getElementById("phone").value;
  const plan = document.getElementById("plan").value;
  const meals = Array.from(document.getElementById("Meal_Type").selectedOptions).map(opt => opt.text);
  const days = Array.from(document.getElementById("delivery_days").selectedOptions).map(opt => opt.text);
  const payment = document.getElementById("payment").value;

  let pricePerMeal = 0;
  if (plan === 'Diet') pricePerMeal = 30000;
  if (plan === 'Protein') pricePerMeal = 40000;
  if (plan === 'Royal') pricePerMeal = 60000;

  const totalPrice = pricePerMeal * meals.length * days.length * 4.3;

  document.getElementById("summaryName").textContent = name;
  document.getElementById("paymentMethod").textContent = payment;
  document.getElementById("summaryPhone").textContent = phone;
  document.getElementById("summaryPlan").textContent = plan + " Plan";
  document.getElementById("summaryMeals").textContent = meals.join(", ");
  document.getElementById("summaryDays").textContent = days.join(", ");
  document.getElementById("summaryPrice").textContent = "Rp" + totalPrice.toLocaleString('id-ID');

  const modal = new bootstrap.Modal(document.getElementById("paymentModal"));
  modal.show();
});

document.addEventListener("DOMContentLoaded", function () {
  const confirmPayBtn = document.querySelector("#confirmPayBtn");

  if (confirmPayBtn) {
    confirmPayBtn.addEventListener("click", function () {
      const form = document.querySelector(".php-email-form");

      if (!form.checkValidity()) {
        form.reportValidity();
        return;
      }

      const paymentModalEl = document.getElementById("paymentModal");
      if (paymentModalEl) {
        const paymentModal = bootstrap.Modal.getInstance(paymentModalEl);
        if (paymentModal) paymentModal.hide();
      }

      const loadingModalEl = document.getElementById("loadingModal");
      const loadingModal = new bootstrap.Modal(loadingModalEl);
      loadingModal.show();

      form.submit();  
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
    const params = new URLSearchParams(window.location.search);
    if (params.get("status") === "success") {
      const modal = new bootstrap.Modal(document.getElementById("successModal"));
      modal.show();
    } else if (params.get("status") === "error") {
      const modal = new bootstrap.Modal(document.getElementById("errorModal"));
      modal.show();
    }
    
    if (params.has("status")) {
      const url = window.location.origin + window.location.pathname;
      window.history.replaceState({}, document.title, url);
    }
});

document.addEventListener("DOMContentLoaded", function () {
  const params = new URLSearchParams(window.location.search);
  if (params.get("testimonial") === "success") {
    new bootstrap.Modal(document.getElementById("testimonialSuccessModal")).show();
  } else if (params.get("testimonial") === "error") {
    new bootstrap.Modal(document.getElementById("testimonialErrorModal")).show();
  }

  if (params.has("testimonial")) {
    const cleanUrl = window.location.origin + window.location.pathname;
    window.history.replaceState({}, document.title, cleanUrl);
  }
});

document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('[id^="start_date-"]').forEach(startDateInput => {
    const id = startDateInput.id.split('-')[1];
    const endDateInput = document.getElementById(`end_date-${id}`);
    
    startDateInput.addEventListener('change', function() {
      const startDate = new Date(this.value);
      const minEndDate = new Date(startDate);
      minEndDate.setDate(minEndDate.getDate() + 1);
      
      const maxEndDate = new Date(startDate);
      maxEndDate.setDate(maxEndDate.getDate() + 30);
      
      endDateInput.min = minEndDate.toISOString().split('T')[0];
      endDateInput.max = maxEndDate.toISOString().split('T')[0];
      endDateInput.value = '';
    });
  });
});

function previewImage(input, previewId) {
  const preview = document.getElementById(previewId);
  const file = input.files[0];
  const reader = new FileReader();
  
  reader.onload = function(e) {
    preview.src = e.target.result;
  }
  
  if (file) {
    reader.readAsDataURL(file);
  }
}

document.getElementById('newPassword').addEventListener('input', function() {
  const password = this.value;
  const strengthBadge = document.getElementById('passwordStrength');

});

async function loadCustomers() {
    const response = await fetch('customer.php');
    const html = await response.text();
    const temp = document.createElement('div');
    temp.innerHTML = html;
    const rows = temp.querySelectorAll('tr');
    const tbody = document.querySelector('#customers-section tbody');
    tbody.innerHTML = '';
    rows.forEach(row => tbody.appendChild(row));
}

window.addEventListener('DOMContentLoaded', () => {
    loadCustomers();
});

// Fungsi untuk mengambil data dari endpoint PHP
async function fetchData(url, elementId, subtextId, growth = false) {
    try {
        const response = await fetch(url);
        const data = await response.json();

        if (data.error) {
            console.error(data.error);
            return;
        }

        // Update nilai di dashboard
        document.getElementById(elementId).textContent = data.count || data.revenue || '--';
        
        // Update subtext jika ada
        if (subtextId && data.subtext) {
            document.getElementById(subtextId).textContent = data.subtext;
        }

        // Update indikator pertumbuhan jika diperlukan
        if (growth && data.growth !== undefined) {
            const trendElement = document.querySelector(`#${subtextId} .trend-indicator`);
            trendElement.innerHTML = `<i class="bi bi-arrow-${data.growth >= 0 ? 'up' : 'down'}"></i> ${Math.abs(data.growth)}%`;
            trendElement.classList.toggle('trend-up', data.growth >= 0);
            trendElement.classList.toggle('trend-down', data.growth < 0);
        }
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

// Fungsi untuk memuat semua data saat halaman dimuat
function loadDashboardData() {
    // Ambil parameter tanggal dari input filter
    const dateStart = document.getElementById('dateStart').value;
    const dateEnd = document.getElementById('dateEnd').value;

    // URL dengan parameter tanggal jika ada
    const params = new URLSearchParams();
    if (dateStart) params.append('dateStart', dateStart);
    if (dateEnd) params.append('dateEnd', dateEnd);

    // Ambil data dari endpoint PHP
    fetchData(`get_active_subscriptions.php?${params.toString()}`, 'subGrowth', 'subGrowthSubtext', true);
    fetchData(`get_monthly_revenue.php?${params.toString()}`, 'mrr', 'mrrSubtext');
    fetchData(`get_reactivations.php?${params.toString()}`, 'reactivations', 'reactivationsSubtext');
}

// Jalankan saat halaman dimuat
document.addEventListener('DOMContentLoaded', loadDashboardData);

// Tambahkan event listener untuk tombol filter
document.getElementById('filterBtn').addEventListener('click', loadDashboardData);

// Reset filter
document.getElementById('resetBtn').addEventListener('click', function() {
    document.getElementById('dateStart').value = '';
    document.getElementById('dateEnd').value = '';
    loadDashboardData();
});
