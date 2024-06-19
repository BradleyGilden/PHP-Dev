const $ = window.jQuery;

function editable(parentNode, state) {
  if (state) {
    parentNode
      .find('.note-title-field, .note-body-field')
      .removeAttr('readonly')
      .removeClass('arrow')
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
  } else {
    parentNode
      .find('.note-title-field, .note-body-field')
      .attr('readonly', true)
      .addClass('arrow')
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
  }
}

function myNotes() {
  // the param after click is the one the event is acted upon if it exits inside my-notes
  $("#my-notes").on("click", ".delete-note", (e) => {
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

  $("#my-notes").on("click", ".edit-note", (e) => {
    const parentNode = $(e.target).closest("li");

    if (!parentNode.find('.note-title-field, .note-body-field').attr('readonly')) {
      editable(parentNode, false);
    } else {
      editable(parentNode, true);
    }
  });

  $("#my-notes").on("click", ".update-note", (e) => {
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
        editable(parentNode, false)
        console.log(response)
      })
      .catch((err) => {
        console.log(err);
      })
  });

  $(".submit-note").on("click", (e) => {
    fetch(`${universityData.root_url}/wp-json/wp/v2/note/`, {
      method: 'POST',
      headers: {
        'X-WP-Nonce': universityData.nonce,  // nonce used to authorize request
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
        'title': $('.new-note-title').val(),
        'content': $('.new-note-body').val(),
        'status': 'publish'
      })
    })
      .then((response) => {
        if (!response.ok) throw new Error(`delete request failed with error code ${response.status}`);
        $('.new-note-title, .new-note-body').val('');
        console.log(response)
        return response.json()
      })
      .then((jsonResponse) => {
        $(`
          <li data-id="${jsonResponse.id}">
            <input readonly class="note-title-field arrow" value="${jsonResponse.title.raw}" type="text">
            <span class="edit-note">
              <i class="fa fa-pencil" aria-hidden="true"></i>
              Edit
            </span>
            <span class="delete-note">
              <i class="fa fa-trash-o" aria-hidden="true"></i>
              Delete
            </span>
            <textarea readonly class="note-body-field arrow">${jsonResponse.content.raw}</textarea>
            <span class="update-note btn btn--blue btn--small">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              Save
            </span>
          </li>
        `)
          .prependTo('#my-notes')
          .hide()
          .slideDown();
      })
      .catch((err) => {
        console.log(err);
      })
  });
}

export default myNotes;
