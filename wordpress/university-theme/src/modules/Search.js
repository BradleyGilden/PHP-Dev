const $ = window.jQuery;

const search = () => {
  let isOpen = false;
  let typingTimer;
  // condition to manage the loading animation
  let isSpinning = false;

  const getSearchResults = () => {
    $.getJSON(`${universityData.root_url}/wp-json/wp/v2/posts`, { search: $("#search-term").val() }, (posts) => {
      $("#search-overlay__results").html(`
        <h2 class="search-overlay__section-title">General Information</h2>
        ${posts.length ? '<ul class="link-list min-list">' : '<p>No general information matches search query</p>' }
          ${posts.map((post) => `<li><a href="${post.link}">${post.title.rendered}</a></li>`).join(' ')}
        ${posts.length ? '</ul>' : ''}
      `);
      isSpinning = false;
    });
  }

  // display search field
  $(".js-search-trigger, .search-overlay__close").on("click", () => {
    $(".search-overlay").toggleClass("search-overlay--active");
    $("body").toggleClass("body-no-scroll");

    if ($(".search-overlay").hasClass("search-overlay--active")) {
      setTimeout(() => {$("#search-term").focus()}, 300);
    } else {
      setTimeout(() => {$("#search-term").blur()}, 300);
    }
  });

  // escape to close
  $(document).on("keyup", (event) => {
    if (event.keyCode === 27 && isOpen) {
      $(".search-overlay").removeClass("search-overlay--active");
      $("body").removeClass("body-no-scroll");
      setTimeout(() => {$("#search-term").blur()}, 300);
      isOpen = false;
    } else if(event.keyCode === 83 && !isOpen && !$("input, textarea").is(":focus")) {
      $(".search-overlay").addClass("search-overlay--active");
      $("body").addClass("body-no-scroll");
      setTimeout(() => {$("#search-term").focus()}, 300);
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
