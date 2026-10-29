document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("menu-toggle-btn");
  const navigation = document.getElementById("site-navigation");

  if (toggleBtn && navigation) {
    toggleBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      const isExpanded = toggleBtn.getAttribute("aria-expanded") === "true";
      toggleBtn.setAttribute("aria-expanded", !isExpanded);
      navigation.classList.toggle("is-active");
    });

    // Close dropdown when clicking outside
    document.addEventListener("click", function (e) {
      if (!navigation.contains(e.target) && !toggleBtn.contains(e.target)) {
        navigation.classList.remove("is-active");
        toggleBtn.setAttribute("aria-expanded", "false");
      }
    });
  }
});






document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".nookCategorySwiper", {
    slidesPerView: 4,
    spaceBetween: 25,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 10,
      },
      576: {
        slidesPerView: 2,
        spaceBetween: 15,
      },
      768: {
        slidesPerView: 3,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 4,
        spaceBetween: 25,
      },
    },
  });
});





document.addEventListener("DOMContentLoaded", function () {
  const tabBtns = document.querySelectorAll(".collection-tabs .tab-btn");
  const productCards = document.querySelectorAll(
    ".popular-products-grid .product-card",
  );

  tabBtns.forEach((btn) => {
    btn.addEventListener("click", function () {
      tabBtns.forEach((b) => b.classList.remove("active"));
      this.classList.add("active");

      let filter = this.getAttribute("data-filter");

      productCards.forEach((card) => {
        let category = card.getAttribute("data-category");
        if (filter === "all" || category === filter) {
          card.style.display = "block";
        } else {
          card.style.display = "none";
        }
      });
    });
  });
});