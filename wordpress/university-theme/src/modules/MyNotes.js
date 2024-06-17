const $ = window.jQuery;

function myNotes () {
  $(".delete-note").on("click", (e) => {
    const parentNode = $(e.target).closest("li");
    fetch(`${universityData.root_url}/wp-json/wp/v2/note/${parentNode.data("id")}`, {
      method: 'DELETE',
      headers: {
        'X-WP-Nonce': universityData.nonce  // nonce used to authorize request
      }
    })
    .then((response) => {
      if (!response.ok) throw new Error(`delete request failed with error code ${response.status}`);
      parentNode.slideUp();
      return response.json();
    })
    .then((jsonData) => {
      console.log(jsonData);
    }).catch((err) => {
      console.log(err);
    })
  })
}

export default myNotes;
