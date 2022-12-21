document.querySelector(".close_btn").addEventListener("click", () => {
  document.querySelector(".mobile_sidebar").classList.add("hidden");
});
document.querySelector(".dashboard_menu").addEventListener("click", () => {
  document.querySelector(".mobile_sidebar").classList.remove("hidden");
});
