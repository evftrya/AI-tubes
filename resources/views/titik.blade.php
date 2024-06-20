<!DOCTYPE html>
<html lang="en" style="background-color:darkslategray; color:antiquewhite;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Titik</title>
</head>
<body >
    
    <div style="display:flex; gap:20vh; flex-direction: row; align-items:center; justify-content:center; width:100%;">
        
        <div style="position: relative;" id="fotoArea">
            <img src="/foto/denahkampus.jpg" alt="Foto" id="foto" onclick="tandaiTitik(event)" style="display:; z-index:1 !important;">
            <!-- <img src="/foto/kosongan.png" alt="Foto" id="cekGaris" onclick="tandaiTitik(event)" style="display: none;"> -->
        </div>
        <div style="display: flex; flex-direction:column;">
            <button class="cek" id="gantiBut" onclick="ganti('kosong')">CEK GARIS</button>
            <button class="cek" id="kembali" onclick="ganti('full')" style="display:none;">KEMBALI</button>
            <a href="/new"><button>Reset</button></a>
            <form action="/titik/store" method="post">
                @csrf
                <input type="text" id="garisAwal" name="namaAwal" placeholder="TitikAwal">
                <input type="text" id="garisAkhir" name="namaAkhir" placeholder="TitikAkhir">
                <input type="text" id="posisi_x" name="posisi_x" placeholder="posx" disabled style="display:none;">
                <input type="text" id="posisi_y" name="posisi_y" placeholder="posy" disabled style="display:none;">
                <input type="text" id="x1" name="garisx1" placeholder="x1" >
                <input type="text" id="y1" name="garisy1" placeholder="y1" >
                <input type="text" id="x2" name="garisx2" placeholder="x2" >
                <input type="text" id="y2" name="garisy2" placeholder="y2" >
                <input type="text" id="totalJarak" name="totalJarak" placeholder="total jarak" >
                <button type="submit">Simpan</button>
            </form>
        </div>
        
    </div>
    
    <style>
        html::-webkit-scrollbar{
            width: 0;
        }
        form{
            display: flex;
            flex-direction: column;
            position: fixed;
            gap: 5px;
            top: 50vh;
            right: 58vh;
        }
        #fotoArea>img{
            width: 130vh;
            height: 97vh;
            height: auto;
        }
        body>div>div>button, body>div>div>a>button{
            width: 300px;
            height: 50px;
            padding: 10px;
            border-radius: 12px;
            background-color:cadetblue;

        }
        body>div>*{
            /* border: 1px white solid; */
        }
        form>input{
            width: 10vh;
            border-radius: 3px;
            text-decoration: none;
            outline: none;
            border: none;
        }
    </style>

    <script>
        let titik = [];
        function ganti(what){
            let buttonGanti = document.getElementById('gantiBut');
            let buttonBack = document.getElementById('kembali');
            let full = document.getElementById('foto');
            let kosong = document.getElementById('cekGaris');

            if(what=='kosong'){
                full.style.display = "none";
                buttonGanti.style.display="none";
                kosong.style.display = "";
                buttonBack.style.display="";
            }
            else{
                full.style.display = "";
                buttonGanti.style.display="";
                kosong.style.display = "none";
                buttonBack.style.display="none";
            }
        }
        function tandaiTitik(event) {
            let x = event.offsetX;
            let y = event.offsetY;
            let x1 = document.getElementById('x1');
            let y1 = document.getElementById('y1');
            let x2 = document.getElementById('x2');
            let y2 = document.getElementById('y2');
            let panjang = 0;

            titik.push({ x, y });
            titik.forEach(function(a){
                
            });
            for(w=0;w<titik.length;w++){
                goArray = Object.values(titik[w]);
                if(w==0){
                    x1.value=goArray[0];
                    y1.value=goArray[1];
                }
                if(w==titik.length-1){
                    x2.value=goArray[0];
                    y2.value=goArray[1];
                }
            }
            let totalJarak = 0;
            for(let p=0;p<titik.length-1;p++){
                let sum = hitung(titik[p],titik[p+1]);
                totalJarak = totalJarak+sum;
            }

            let jrk = document.getElementById('totalJarak');
            jrk.value=totalJarak;

            let posisiXInput = document.getElementById('posisi_x');
            let posisiYInput = document.getElementById('posisi_y');
            posisiXInput.value = x;
            posisiYInput.value = y;

            let ctx = document.getElementById('foto').getContext('2d');
            ctx.beginPath();
            ctx.arc(x, y, 3, 0, 2 * Math.PI);
            ctx.fillStyle = 'red';
            ctx.fill();
        }
        function hitung(point1,point2){
              // Extract coordinates
            let u1 = Object.values(point1);
            let u2 = Object.values(point2);
            const x1 = u1[0];
            const y1 = u1[1];
            const x2 = u2[0];
            const y2 = u2[1];
            
            // Calculate the differences
            const dx = x2 - x1;
            const dy = y2 - y1;
            
            // Calculate the Euclidean distance
            const distance = Math.sqrt(dx * dx + dy * dy);
            console.log('distance : '+distance);
            return distance;    
          
        };
        

    </script>
</body>
</html>
