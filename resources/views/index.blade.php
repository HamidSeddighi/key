<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>کیبورد</title>
</head>
<body>
    <h1>کیبورد مجازی</h1>
    <hr>
        <div class="container">

            <form action="http://localhost/key/public/submit-key" method="post">
                {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="my_content_container" class="form-label">تایپ کنید</label>
                        <textarea name="content_container" class="form-control" id="my_content_container" rows="10">
                            {{$passed_content}}
                        </textarea>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-3">
                        <div class="row mb-1">
                            <div class="col-12">
                                <input style="width: 180px" class="btn btn-sm btn-light" type="submit" name="pressed_key" value="Space">
                            </div>
                        </div>

                        <div class="row mb-1">
                            <div class="col-12">
                                <input class="btn btn-sm {{$is_shift_on ? "btn-warning" : "btn-dark" }}" type="submit" name="pressed_key" value="Shift">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <input class="btn btn-sm btn-success" type="submit" name="pressed_key" value="Enter">
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        @foreach($buttons->chunk(10) as $chunk_buttons)
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    @foreach($chunk_buttons as $button)
                                        <input style="width: 31px" class="btn btn-sm btn-primary" type="submit" name="pressed_key" value="{{chr($button)}}">
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>



<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>