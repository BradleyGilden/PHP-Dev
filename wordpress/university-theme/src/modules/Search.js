const $ = window.jQuery;

const search = () => {
  let isOpen = false;
  let typingTimer;
  // condition to manage the loading animation
  let isTyping = false;

  const getSearchResults = () => {
    console.log("woah");
    $("#search-overlay__results").html("Imagine rendered results...");
    isTyping = false;
  }

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

  // typing delay
  $("#search-term").on("input", () => {
    // clear previous delay
    if (!isTyping) {
      $("#search-overlay__results").html('<div class="spinner-loader"></div>');
      isTyping = true;
    }
    clearTimeout(typingTimer);
    typingTimer = setTimeout(getSearchResults, 1000);
  })
};

export default search;
