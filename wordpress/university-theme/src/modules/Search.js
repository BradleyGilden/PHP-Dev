import $ from 'jquery';

class Search {
  constructor() {
    this.openButton = $(".js-search-trigger");
    this.closeButton = $(".search-overlay__close");
    this.searchOverlay = $(".search-overlay");
    this.events();
  }

  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.openButton.on("click", this.closeOverlay.bind(this));
  }

  openOverlay() {
    this.searchOverlay.addClass("search-overaly--active");
  }

  closeOverlay() {
    this.searchOverlay.removeClass("search-overaly--active");
  }
}

export default Search;
