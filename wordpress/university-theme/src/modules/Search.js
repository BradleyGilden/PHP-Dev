const $ = window.jQuery;

const search = () => {
  let isOpen = false;
  let typingTimer;
  // condition to manage the loading animation
  let isSpinning = false;

  const getSearchResults = () => {
      $.getJSON(`${universityData.root_url}/wp-json/university/v1/search`, { term: $("#search-term").val() }, function (results) {
        $("#search-overlay__results").html(`
          <div class="row">
            <div class="one-third">
              <h2 class="search-overlay__section-title" >General Information</h2>
              ${results.generalInfo.length ? '<ul class="link-list min-list">' : '<p>No general information matches search query</p>' }
                ${results.generalInfo.map((post) => `<li><a href="${post.permalink}">${post.title}</a>${post.type=='post' ? ` by ${post.authorName}`: ''}</li>`).join(' ')}
              ${results.generalInfo.length ? '</ul>' : ''}
            </div>
            <div class="one-third">
              <h2 class="search-overlay__section-title" >Programs</h2>
              ${results.programs.length ? '<ul class="link-list min-list">' : `<p>No program matches search query. <a href="${universityData.root_url}/programs">View All Programs</a></p>` }
                ${results.programs.map((post) => `<li><a href="${post.permalink}">${post.title}</a></li>`).join(' ')}
              ${results.programs.length ? '</ul>' : ''}
              <h2 class="search-overlay__section-title" >Professors</h2>
              ${results.professors.length ? '<ul class="professor-cards">' : `<p>No professor matches search query</p>` }
                ${results.professors.map((post) => `
                  <li class="professor-card__list-item">
                    <a class="professor-card" href="${post.permalink}">
                    <img class="professor-card__image" src="${post.imageUrl}" alt="professor profile" />
                    <span class="professor-card__name">"${post.title}"</span>
                    </a>
                  </li>
                `).join(' ')}
              ${results.professors.length ? '</ul>' : ''}
            </div>
            <div class="one-third">
              <h2 class="search-overlay__section-title" >Campuses</h2>
              <h2 class="search-overlay__section-title" >Events</h2>
              ${results.events.length ? '<ul class="link-list min-list">' : `<p>No program matches search query. <a href="${universityData.root_url}/events">View All Events</a></p>` }
                ${results.events.map((post) => `
                  <div class="event-summary">
                    <a class="event-summary__date t-center" href="${post.permalink}">
                      <span style="color: white;" class="event-summary__month">${post.month}</span>
                      <span style="color: white;" class="event-summary__day">${post.day}</span>
                    </a>
                    <div class="event-summary__content">
                      <h5 class="event-summary__title headline headline--tiny"><a href="${post.permalink}">${post.title}</a></h5>
                      <p>${post.excerpt} <a href="${post.permalink}" class="nu gray">Read more</a></p>
                    </div>
                  </div>
                `).join(' ')}
              ${results.events.length ? '</ul>' : ''}
            </div>
          </div>
        `);
        isSpinning = false;
      })
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

// const getSearchResults = () => {
//   $.when (
//     $.getJSON(`${universityData.root_url}/wp-json/wp/v2/posts`, { search: $("#search-term").val(), _fields: 'link,title,author_name,type' }),
//     $.getJSON(`${universityData.root_url}/wp-json/wp/v2/pages`, { search: $("#search-term").val(), _fields: 'link,title,type' })
//   ).then((posts, pages) => {
//     const results = [...posts[0], ...pages[0]];
//     $("#search-overlay__results").html(`
//       <h2 class="search-overlay__section-title">General Information</h2>
      // ${results.length ? '<ul class="link-list min-list">' : '<p>No general information matches search query</p>' }
      //   ${results.map((post) => `<li><a href="${post.link}">${post.title.rendered}</a>${post.type=='post' ? ` by ${post.authorName}`: ''}</li>`).join(' ')}
      // ${results.length ? '</ul>' : ''}
//     `);
//     isSpinning = false;
//   }).catch((_err) => {
//     $("#search-overlay__results").html('<p>Unexpected Error Occured</p>');
//   });
// }
