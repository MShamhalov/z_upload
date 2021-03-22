    <!DOCTYPE HTML>
    <html lang="ru">
      <head>
        <meta charset="UTF-8">
        <title>z_uploader example page</title>
        <meta name="description" content="z_uploader example page" />
        <link rel="icon" href="favicon.ico">
        <style>.nl {display: block;margin-top: 1em;}</style>
       
      </head>
      <body>
            <label for="myfile" class="nl">select file</label>
            <input name="data" type="file" id="myfile" form="data" class="nl"></input>      
            <progress class="nl" id="progress_bar" value="0" max="100"></progress>
          
          <form id="data" method="post" enctype="multipart/form-data">  
            <button class="nl">Загрузить</button>
          </form>
      </body>
    </html>

<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="../z_upload.js"></script>