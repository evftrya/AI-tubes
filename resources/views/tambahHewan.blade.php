<html>
    <body>
        <div class="decontent">
            <form action="/Hewan/store" method="post">
                @csrf
                <div>
                    <input type="text" name="Hewan" placeholder="Nama Hewan/Tempat">
                    <select name="jenis" id="">

                        @foreach($jenis as $a)
                        <option value="{{$a->Jenis}}">{{$a->Jenis}}</option>
                        @endforeach

                    </select>
                </div>
                <input type="submit">
            </form>
        </div>
        
        <div class="defoto">
            <img src="/foto/denahkampus.jpg" alt="">
        </div>
    </body>
</html>
<script>
    function masukkan(jenis){
        let inp = document.getElementById('jenis');
        inp.value = jenis;
    }
</script>
<style>
    body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .decontent {
            background-color: #fff;
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .defoto {
            text-align: center;
            margin-top: 20px;
        }
        .defoto img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
</style>