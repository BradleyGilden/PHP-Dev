const $ = window.jQuery;

const search = () => {
  $(".js-search-trigger").on("click", function () {
    $(".search-overlay").toggleClass("search-overlay--active");
    $("body").toggleClass("body-no-scroll");
  });
  $(".search-overlay__close").on("click", function () {
    $(".search-overlay").toggleClass("search-overlay--active");
    $("body").toggleClass("body-no-scroll");
  });
};

export default search;
