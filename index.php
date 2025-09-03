<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>𝗕𝗬𝗧𝗥𝗢𝗫 𝗦𝗖𝗥𝗜𝗣𝗧</title>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background: url("bak.gif") no-repeat center center fixed;
      background-size: cover;
      font-family: Arial, sans-serif;
      color: #fff;
    }

    /* Animation text styles */
    #animatedText {
      position: absolute;
      top: 20px;
      text-align: center;
      font-size: 1.8em;
      font-weight: bold;
      color: #00ff00;
      text-shadow: 0 0 5px #fff, 0 0 15px #0f0, 0 0 25px #0f0;
      animation: fadeInOut 6s infinite;
    }

    @keyframes fadeInOut {
      0% { opacity: 0; }
      10% { opacity: 1; }
      40% { opacity: 1; }
      50% { opacity: 0; }
      60% { opacity: 1; }
      90% { opacity: 1; }
      100% { opacity: 0; }
    }

    .gif-container {
      position: relative;
      width: 200px;   /* 50% smaller than before */
      height: 200px;  /* 50% smaller than before */
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .gif-container img {
      width: 100%;
      height: 100%;
      border-radius: 50%;
      opacity: 0.5;
    }

    #crashValue {
      position: absolute;
      font-size: 2em;
      font-weight: bold;
      color: #e60000; /* Yopiq qizil */
text-shadow: 
  0 0 2px #fff, 
  0 0 6px #fff, 
  0 0 12px #e60000, 
  0 0 24px #b30000;

      text-align: center;
    }

    #logo {
      width: 60px;
      height: 60px;
      position: absolute;
      bottom: 15px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Animated text -->
  <div id="animatedText">@BYTROX_1</div>

  <div class="gif-container">
    <img src="bytrox.gif" alt="GIF">
    <div id="crashValue">0.00</div>
  </div>

  <img id="logo" src="bytrox.gif" alt="gif" onclick="window.location.href='https://t.me/bytrox_1'">

  <script>
    let crashElement = document.getElementById("crashValue");
    let socket = null;

    function connectWebSocket() {
      socket = new WebSocket("wss://eg1xbet.com/games-frame/sockets/crash?appGuid=00000000-0000-0000-0000-000000000000&whence=110&fcountry=66&ref=1&gr=0&lng=ar");

      socket.onopen = function () {
        console.log("CONNECTED");
        socket.send('{"protocol":"json","version":1}\x1e');
        socket.send('{"arguments":[{"activity":30,"currency":119}],"invocationId":"0","target":"Guest","type":1}\x1e');
      };

      socket.onmessage = function (event) {
        try {
          let data = event.data.slice(0, -1);
          let json = JSON.parse(data);

          console.log("DATA:", json);

          if (json.target === "OnCrash") {
            let value = json.arguments[0].f;
            crashElement.innerText = value;
          }
        } catch (err) {
          console.error("Parse error:", err);
        }
      };

      socket.onerror = function (err) {
        console.error("WebSocket error:", err);
      };

      socket.onclose = function () {
        console.log("CLOSED, reconnecting...");
        setTimeout(connectWebSocket, 3000);
      };
    }

    connectWebSocket();

    // Animated text switching
    const animatedText = document.getElementById("animatedText");
    const texts = ["@BYTROX_1", "t.me/appleking077s"];
    let index = 0;

    setInterval(() => {
      index = (index + 1) % texts.length;
      animatedText.textContent = texts[index];
    }, 3000);
  </script>

</body>
</html>
