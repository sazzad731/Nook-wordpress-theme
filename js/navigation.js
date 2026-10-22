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
