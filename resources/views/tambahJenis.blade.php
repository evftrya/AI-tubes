<html>
    <body>
        <form action="/Jenis/store" method="post">
            @csrf
            <div>
                <input type="text" name="jenis" placeholder="Nama Jenis">
            </div>
            <input type="submit">
           
        </form>
    </body>
</html>