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
  });

  $(".edit-note").on("click", (e) => {
    const parentNode = $(e.target).closest("li");

    if (!parentNode.find('.note-title-field, .note-body-field').attr('readonly')) {
    parentNode
      .find('.note-title-field, .note-body-field')
      .attr('readonly', true)
      .removeClass("note-active-field");
    parentNode
      .find('.update-note')
      .removeClass('update-note--visible');
    parentNode
      .find('.edit-note')
      .html(`
        <i class="fa fa-pencil" aria-hidden="true"></i>
        Edit
      `);
    } else {
    parentNode
      .find('.note-title-field, .note-body-field')
      .removeAttr('readonly')
      .addClass("note-active-field");
    parentNode
      .find('.update-note')
      .addClass('update-note--visible');
    parentNode
      .find('.edit-note')
      .html(`
      <i class="fa fa-times" aria-hidden="true"></i>
      Cancel
      `);
    }
  });

  $(".update-note").on("click", (e) => {
    const parentNode = $(e.target).closest("li");
    fetch(`${universityData.root_url}/wp-json/wp/v2/note/${parentNode.data("id")}`, {
      method: 'POST',
      headers: {
        'X-WP-Nonce': universityData.nonce,  // nonce used to authorize request
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        'title': parentNode.find('.note-title-field').val(),
        'content': parentNode.find('.note-body-field').val()
      })
    })
    .then((response) => {
      if (!response.ok) throw new Error(`delete request failed with error code ${response.status}`);
      parentNode
        .find('.note-title-field, .note-body-field')
        .attr('readonly', true)
        .removeClass("note-active-field");
      parentNode
        .find('.update-note')
        .removeClass('update-note--visible');
      parentNode
        .find('.edit-note')
        .html(`
          <i class="fa fa-pencil" aria-hidden="true"></i>
          Edit
        `);
      console.log(response)
    })
    .catch((err) => {
      console.log(err);
    })
  });
}

export default myNotes;
