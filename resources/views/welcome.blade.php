@php $percent=70; $w=150; @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .data{
                display:flex;
                flex-direction:column;
                gap: 3
            }
            .card{
                width: 200px;
                height: 200px;
            }
            .row{
                display:flex;
                gap:2;
            }
        .pie {
            
            width: var(--w);
            aspect-ratio: 1;
            position: relative;
            display: inline-grid;
            place-content: center;
            margin: 5px;
            font-size: 25px;
            font-weight: bold;
            font-family: sans-serif;
            border-radius: 50%;
            background: grey;
            overflow: hidden;
        }
        .pie::before {
            content: "";
            position: absolute;
            inset: 0;
            background: red;
            width: var(--p);
            height: 100%;
            left: 0;
            -webkit-mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
            mask:radial-gradient(farthest-side,#0000 calc(99% - var(--b)),#000 calc(100% - var(--b)));
        }
        .pie::after {
            content: attr(data-percent);
            position: absolute;
            top:0;
            left:0;
            display:flex;
            align-items:center;
            justify-content:center;
            width: 100%;
            height: 100%;
        }
        </style>
        <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    </head>
    <body class="antialiased">


        <!-- <button onclick='downloadimage()'>Click Me</button> -->
        

    </body>
</html>
        <script defer>

            document.querySelector('body').appendChild('{{$dt}}')

            console.log('{{$dt}}');
            function downloadimage() {
                const data = document.querySelector('.data')

                html2canvas(data, {
                    useCORS: true,
                    allowTaint: true,
                }).then((canvas) => {
                    let image = new Image();
                    image.src = canvas.toDataURL('image/jpg',1.0);
                    // document.querySelector('body').innerHTML=''
                    // document.querySelector('body').appendChild(image)
                    
                });
                // alert('Pass')
            }
            // document.querySelector('button').addEventListener('click',)
            window.onload=downloadimage

        </script>
