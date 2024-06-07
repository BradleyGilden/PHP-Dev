const $ = window.jQuery;

const search = () => {
  let isOpen = false;
  let typingTimer;
  // display search field
  $(".js-search-trigger").on("click", () => {
    $(".search-overlay").toggleClass("search-overlay--active");
    $("body").toggleClass("body-no-scroll");
  });

  // close search field
  $(".search-overlay__close").on("click", () => {
    $(".search-overlay").toggleClass("search-overlay--active");
    $("body").toggleClass("body-no-scroll");
  });

  // escape to close
  $(document).on("keyup", (event) => {
    if (event.keyCode === 27 && isOpen) {
      $(".search-overlay").removeClass("search-overlay--active");
      $("body").removeClass("body-no-scroll");
      isOpen = false;
    } else if(event.keyCode === 83 && !isOpen) {
      $(".search-overlay").addClass("search-overlay--active");
      $("body").addClass("body-no-scroll");
      isOpen = true;
    }
  })

  // typing
  $("#search-term").on("input", (event) => {
    clearTimeout(typingTimer);
    typingTimer = setTimeout(() => { console.log("Word Typed") }, 1000);
  })
};

export default search;
