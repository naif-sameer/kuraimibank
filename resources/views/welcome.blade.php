<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    body {
      min-height: 100vh;
      background-color: #222;
      color: #eee;

      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      gap: .5rem;
    }

    button,
    input {
      padding: 1rem 2rem;
    }

    div {
      display: flex;
      flex-direction: column
    }
  </style>

  @vite([])
</head>

<body>
  <form action="">

    <div>
      arabic: <input id="value" type="text">
    </div>

    <div>
      english: <input id="key" type="text">
    </div>



    <button type="button">copy</button>
    <button type="reset">reset</button>

  </form>



  <div id="output"></div>

  <script>
    /**
     *@return {HTMLElement}
     * */
    const el = (element) => document.querySelector(element);

    el('button').addEventListener('click', (e) => {
      let key = el('#key').value
        .split(' ')
        .map(item => item.toLowerCase())
        .filter(Boolean)
        .join('-').trim()

      let data = `"${key}"                => "${el('#value').value.trim()}",`

      el('#output').textContent = data;

      copyToClipboard(data)

      console.log('copy to clipboard')
    })


    function copyToClipboard(text) {
      if (window.clipboardData && window.clipboardData.setData) {
        // Internet Explorer-specific code path to prevent textarea being shown while dialog is visible.
        return window.clipboardData.setData("Text", text);

      } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
        var textarea = document.createElement("textarea");
        textarea.textContent = text;
        textarea.style.position = "fixed"; // Prevent scrolling to bottom of page in Microsoft Edge.
        document.body.appendChild(textarea);
        textarea.select();
        try {
          return document.execCommand("copy"); // Security exception may be thrown by some browsers.
        } catch (ex) {
          console.warn("Copy to clipboard failed.", ex);
          return prompt("Copy to clipboard: Ctrl+C, Enter", text);
        } finally {
          document.body.removeChild(textarea);
        }
      }
    }
  </script>
</body>

</html>
