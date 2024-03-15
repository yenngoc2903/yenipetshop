<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Chatbot Example</title>
<style>
   
</style>
</head>
<body>

<button id="chat-button">Chat</button>

<div id="chat-container">
    <div class="chat-content">
        <p>Người máy AI sẽ giúp bạn giải đáp thắc mắc!</p>
    </div>
    <textarea id="chat-input" placeholder="Type your message..."></textarea>
    <button id="send-button">Gửi</button>
</div>

<script>
    const chatButton = document.getElementById('chat-button');
    const chatContainer = document.getElementById('chat-container');
    const sendButton = document.getElementById('send-button');

    chatButton.addEventListener('click', function() {
        chatContainer.classList.toggle('active');
    });

    sendButton.addEventListener('click', function() {
        const messageInput = document.getElementById('chat-input').value;
        // Here you can implement the functionality to send the message
        console.log("Sending message:", messageInput);
        // For demonstration purpose, let's just clear the input field
        document.getElementById('chat-input').value = '';
    });
</script>

</body>
</html>
