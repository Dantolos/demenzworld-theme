jQuery(document).ready(function ($) {
  $("#custom-chat-form").on("submit", function (e) {
    e.preventDefault();
    var message = $('input[name="custom_chat_message"]').val();
    $.ajax({
      url: "2VNyrtl9iP37irEqq35sFHTGsYvYobYj",
      type: "POST",
      data: JSON.stringify({ message: message }),
      contentType: "application/json",
      headers: {
        Authorization: "Bearer 2VNyrtl9iP37irEqq35sFHTGsYvYobYjY",
      },
      success: function (response) {
        $("#custom-chat-response").html("<p>" + response.data + "</p>");
      },
      error: function (error) {
        console.log(error);
        $("#custom-chat-response").html(
          "<p>Es gab einen Fehler beim Senden der Nachricht.</p>",
        );
      },
    });
  });
});
