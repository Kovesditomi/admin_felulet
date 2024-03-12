<?php 
session_start();
if(isset($_SESSION['user_id'])){//ha a user be van lépve
    header("location:index.php");
}
?>
<?php include_once "head.php"; ?>
<style>
    *{
        margin: 0%;
        padding: 0%;
        overflow: hidden;
    }
</style>
<body>
<canvas id="canvas" style="background: #111;">

</canvas>
    <script>
        let canvas = document.getElementById('canvas');
        let context = canvas.getContext('2d'); 
        let W = window.innerWidth;
        let H = window.innerHeight;

        canvas.width = W;
        canvas.height = H;

        let fontSize= 16;
        let columns = Math.floor(W / fontSize);
        let drops = [];
        for(let i=0; i<columns;i++){
            drops.push(0);
        }
        let str = "JavaScript Hacking Effect";
        function draw(){
            context.fillStyle = "rgba(0,0,0,0.05)";
            context.fillRect(0,0,W,H);
            context.fontSize = "700" + fontSize + "px";
            context.fillStyle = "#00cc33";
            for(let i=0; i<columns;i++){
                let index = Math.floor(Math.random()*str.length);
                let x = i * fontSize;
                let y = drops[i] * fontSize;
                context.fillText(str[index], x ,y );
                if(y >= canvas.height && Math.random() > 0.99){
                    drops[i] = 0;
                }
                drops[i]++;
            }
        }
draw();
setInterval(draw, 35);
    </script>
             
    <div class="wrapper">
        <section class="form login">
            <header>
                Belépés Adminként
            </header>
            <form action="#">
                <div class="error-txt">Hiba üzenet!</div>
            
                    <div class="field input">
                        <label>Admin-felhasználónév:</label>
                        <input type="email" placeholder="E-amil cím" name="email" id="">
                    </div>
                    <div class="field input">
                        <label>Jelszó:</label>
                        <input type="password" placeholder="Jelszó" name="password" id="">
                        <i class="fas fa-eye"></i>
                    </div>
                    
                    <div class="field button">
                        <input type="submit" value="Tovább a Techspace főoldalára">
                    </div>
                
            </form>

        </section>

    </div>
   
    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>

</html>