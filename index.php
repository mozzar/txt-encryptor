<!doctype html>
<html lang="PL-pl">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>TXT Hash</title>
</head>
<body>


<div class="col-xs-12" style="margin-top:10%;">

    <div class="container">
        <div id="alert-box"></div>
        <div class="row">
            <div class="col">
                <h3>Zakoduj/Odkoduj plik</h3>
                <!-- Wyslanie pliku przez AJAX do FileParser.php-->
        <form method="POST" enctype="multipart/form-data" action="">
        <div class="form-group">

            <div class="custom-file">
                    <input type="file" class="custom-file-input" id="file" name="file" onchange="showFile()">
                    <label class="custom-file-label" for="file" id="file-name">Wybierz plik</label>


            </div>

        </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="encrypt">Encrypt</button>

                <button class="btn btn-warning" type="submit" name="decrypt">Decrypt</button>
            </div>

        </form>
            </div>
            <div class="col">
                <h4>Podgląd pliku wgrywanego</h4>
                <textarea id="text-area" class="form-control"></textarea>
            </div>

        </div>



        </div>

    </div>


</div>




<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
    if (window.File && window.FileReader && window.FileList && window.Blob) {
        function showFile() {
            var preview = document.getElementById('text-area');
            var file = document.querySelector('input[type=file]').files[0];
            var reader = new FileReader()
            var fname = document.getElementById('file-name');
            var alert =document.getElementById('alert-box');
            var textFile = /text.*/;

            if (file.type.match(textFile)) {
                reader.onload = function (event) {
                    var filename = file.name;
                    var size = file.size;
                    preview.innerHTML = event.target.result;
                    fname.innerHTML = "<b>" + filename +"</b>"+ " (" + size + " bytes)";
                }
            } else {
                alert.innerHTML = "<div class=\"alert alert-danger\">To nie wyglada jak plik .txt</div>";

            }
            reader.readAsText(file);
        }
    } else {
        alert("Twoja przegladarka nie wspiera HTML5");
    }



</script>


</body>
</html>