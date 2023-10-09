<html>
    <head>
        <title>Koneksi Database MySQL</title>
    </head>
    <body>
        <h1>Demo Koneksi database MySQL</h1>
        <?php
            $conn = mysqli_connect("localhost","root","");
            if ($conn){
                echo "server terkoneksi";
            }else{
                echo "server tidak terkoneksi";
            }
        ?>
    </body>
</html>