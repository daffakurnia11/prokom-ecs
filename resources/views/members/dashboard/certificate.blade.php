<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificate of Appreciation - {{ auth()->user()->name }}</title>
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap');
    @page {
      size: landscape;
      margin: 0;
    }
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 97vh;
      position: relative;
    }
    h1 {
      position: absolute;
      top: 75mm;
      left: 24mm;
      font-family: 'Oswald', sans-serif;
      font-weight: 500;
      text-transform: uppercase;
      font-size: 35pt;
    }
    img {
      position: absolute;
      width: 297mm;
      height: 210mm;
      top: 0;
      left: 0;
    }
  </style>
</head>
<body onload="window.print()">
  <img src="/img/Sertifikat.jpg" alt="">
  <h1>{{ auth()->user()->name }}</h1>
  <script>
    window.onload = function() { 
      window.print(); 
    }
  </script>
</body>
</html>