<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}" />

   <meta name="robots" content="none"/>
   <meta name="googlebot" content="noindex, nofollow"/>
   <meta name="yandex" content="none"/>
   
   <title>{{$book->name}}</title>

    <style>
      body {
        background-color: #333;
        margin: 0;
        padding: 0;
      }
  
      .container {
        height: 100vh;
      }

      /* styles for licensed version
      .container {
        height: 95vh;
        width: 95%;
        margin: 20px auto;
        border: 2px solid red;
        box-shadow: 0 0 5px red;
      }
  
      .fullscreen {
        background-color: #333;
      } */
    </style>

</head>

<body>

  <div class="container" id="container"></div>

  <script src="js/jquery.min.js"></script>
  <script src="js/html2canvas.min.js"></script>
  <script src="js/three.min.js"></script>
  <script src="js/pdf.min.js"></script>

  <script src="js/3dflipbook.min.js"></script>

  <script type="text/javascript">
  $('.container').FlipBook({pdf: 'books/{{$book->filename}}'});


  // Licensed version script
  //   $('#container').FlipBook({
  //   pdf: 'books/{{$book->filename}}',
    
  //   controlsProps: {
  //     downloadURL: 'books/{{$book->filename}}',
  //     actions: {
  //       cmdFullScreen: {
  //         enabled: true,
  //       },
  //       cmdBackward: {
  //         code: 37,
  //       },
  //       cmdForward: {
  //         code: 39
  //       },
  //     },
  //   },

  //   template: {
  //     sounds: {
  //       startFlip: 'sounds/start-flip.mp3',
  //       endFlip: 'sounds/end-flip.mp3'
  //     },
  //     html: 'templates/default-book-view.html',
  //     styles: [
  //       'css/short-black-book-view.css'
  //     ],
  //     links: [
  //       {
  //         rel: 'stylesheet',
  //         href: 'css/font-awesome.min.css'
  //       }
  //     ],
  //     script: 'js/default-book-view.js'
  //   }
  // });

  </script>
</body>

</html>