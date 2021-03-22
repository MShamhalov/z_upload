    <!DOCTYPE HTML>
    <html lang="ru">
      <head>
        <meta charset="UTF-8">
        <title>z_uploader example page</title>
        <meta name="description" content="z_uploader example page" />
        
        <link rel="icon" href="/img/favicon.png">
        <style>.nl {display: block;margin-top: 1em;}</style>
        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="../z_upload.js"></script>
      </head>
      <body>
          <form method="POST" enctype="multipart/form-data">
            <label for="myfile" class="nl">select file</label>
            <input name="data" type="file" id="myfile" form="data" class="nl"></input>      
            <progress class="nl" id="progress_bar" value="0" max="100"></progress>
            <button class="nl">Загрузить</button>
          </form>
      </body>
    </html>