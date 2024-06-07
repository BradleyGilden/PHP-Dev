const $ = window.jQuery;

const search = () => {
  let isOpen = false;
  let typingTimer;
  // condition to manage the loading animation
  let isSpinning = false;

  const getSearchResults = () => {
    console.log("woah");
    $("#search-overlay__results").html("Imagine rendered results...");
    isSpinning = false;
  }

  // display search field
  $(".js-search-trigger, .search-overlay__close").on("click", () => {
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
    clearTimeout(typingTimer);

    // if search bar has contents
    if ($("#search-term").val()) {
      
      if (!isSpinning) {
        $("#search-overlay__results").html('<div class="spinner-loader"></div>');
        isSpinning = true;
      }
  
      typingTimer = setTimeout(getSearchResults, 1000);
    } else {
      $("#search-overlay__results").html('');
      isSpinning = false;
    }
  })
};

export default search;
