<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>FEN Display Tool</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/album/">

    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        .fl{

            float:left;
        }

        .board{
            height: 100%;
            max-width:512px;
            margin: 0 auto;
            width: 100%;
        }

        .whiteSquare{

            max-height: 64px;
            max-width: 64px;
            width:12.5%;
            padding-bottom:12.5%;
            background-color:#FFF;

        }

        .blackSquare{

            max-height: 64px;
            max-width: 64px;
            width:12.5%;
            padding-bottom: 12.5%;
            background-color:#29BEE8;

        }

        .piece{
            position:absolute;
            max-width: 64px;
            max-height: 64px;
            width:11.5%;
        }
        .card{
            border: none;
        }

        #newFyn{
            padding-left: 30px;
            padding-right: 30px;
            background-color: #29BEE8;
            border-color: #29BEE8;
        }

    </style>


</head>
<body>

<header>

    <div class="navbar bg-white">
        <div class="container justify-content-center">
            <strong style="color: black; text-align: center">FEN Display Tool</strong>
        </div>
    </div>
</header>

<main>

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-2 g-2">
                <div class="col col-sm-12 col-md-6 order-xs-last order-md-first">

                    <div class="card bg-light">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="board">
                                    @foreach($initBoard as $square)
                                        <div id="{{$square['position']}}" class="square fl {{ ($square['color'] == 'white') ? 'whiteSquare' : 'blackSquare' }}">
                                            @if(isset($square['guti']))
                                                <img src="pieces/{{$square['guti']['image']}}.svg" class="piece"/>
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-sm-12 col-md-6 order-sm-first order-md-last">

                    <div class="card bg-light">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" id="newFyn" class="btn btn-primary">Ny FEN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>

</main>

<footer class="text-muted py-4 bg-light">
    <div class="container">
        <p style="text-align: center">FEN Display Tool by <strong>Shah Md Shamsul Alam</strong></p>
    </div>
</footer>


<script src="/assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha384-ZvpUoO/+PpLXR1lu4jmpXWu80pZlYUAfxl5NsBMWOEPSjUn/6Z/hRTt8+pR6L4N2"
        crossorigin="anonymous"></script>

<script>
    $('document').ready(function (){

        function getBoard(){
            $.ajax({
                'type': 'GET',
                'url': '/api/fen',
                success: function (response) {
                    //console.log(response);
                    let div = '';
                    jQuery.each(response.data, function(index, value){
                        div += '<div id="'+value.position+'" class="square fl ';
                            if(value.color == 'white'){
                                div += 'whiteSquare';
                            }else{
                                div += 'blackSquare';
                            }

                        div += '">';

                        if(value.guti){
                            div += '<img src="pieces/'+ value.guti.image +'.svg" class="piece"/>'
                        }

                        div += '</div>';

                    });
                    $('.board').html(div);
                },
                error: function (error){
                    console.log(error);
                }
            });
        }

        $('#newFyn').click(function (){
            getBoard();
        });
    });
</script>
</body>
</html>
