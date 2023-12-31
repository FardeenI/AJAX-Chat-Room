/* CODE FOR THE DYNAMICS USING A CLICK BUTTON TO LISTEN 

$(document).ready(function() {
    // Get form elements
    var chatSend = $('#chatInput');
    var nameSend = $('#nameSend');
    var pass = $('#pass');
    var warn = $('#warning');

    var nameReceived = $('#nameReceive');
    var listen = $('#listen');
    var chatReceive = $('#chatOutput');

  
    // Attach a keyup event handler to the textarea
    chatSend.on('keyup', function() {
      // Get the content of the textarea
      var chatContent = chatSend.val();
      var nameContent = nameSend.val()
      var passContent = pass.val();
  
      // Make an AJAX request to the server-side script
      $.ajax({
        method: 'POST',
        url: 'chatSend.php',
        data: { content: chatContent, name: nameContent, password: passContent },
        success: function(response) {
        console.log('Data saved successfully: ', response);
        warn.val(response);
        },
        error: function(error) {
        console.error('Error saving data: ', error);
        warn.val(error);
        }
      })
    });

    listen.on('click', function() {

        var receivedName = nameReceived.val();

        $.ajax({
        method: 'GET',
        url: 'chatReceive.php',
        data: {nameR: receivedName},
        success: function(response) {
        console.log('Data saved successfully: ', response);
        chatReceive.val(response);
        },
        error: function(error) {
        console.error('Error saving data: ', error);
        chatReceive.val("");
        }
      })
    });

  });
*/

$(document).ready(function() {
    // Get form elements
    var chatSend = $('#chatInput');
    var nameSend = $('#nameSend');
    var pass = $('#pass');
    var warn = $('#warning');
  
    var nameReceived = $('#nameReceive');
    var chatReceive = $('#chatOutput');
  
    // Function to retrieve data from the server
    function retrieveData() {
      var receivedName = nameReceived.val();
  
      // Make an AJAX request to the server-side script
      $.ajax({
        method: 'GET',
        url: 'chatReceive.php',
        data: { nameR: receivedName },
        success: function(response) {
          console.log('Data received successfully: ', response);
          chatReceive.val(response);
        },
        error: function(error) {
          console.error('Error receiving data: ', error);
          chatReceive.val("");
        }
      });
    }
  
    // Set up an interval to retrieve data every 20 ms
    var intervalId = setInterval(retrieveData, 20);
  
    // Attach a keyup event handler to the textarea
    chatSend.on('keyup', function() {
      // Get the content of the textarea
      var chatContent = chatSend.val();
      var nameContent = nameSend.val();
      var passContent = pass.val();
  
      // Make an AJAX request to the server-side script
      $.ajax({
        method: 'POST',
        url: 'chatSend.php',
        data: { content: chatContent, name: nameContent, password: passContent },
        success: function(response) {
          console.log('Data saved successfully: ', response);
          warn.val(response);
        },
        error: function(error) {
          console.error('Error saving data: ', error);
          warn.val(error);
        }
      });
    });
  
    // Stop the interval when the page is unloaded or closed
    $(window).on('beforeunload', function() {
      clearInterval(intervalId);
    });
  });