<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <a href="?ctrl=drink">Liste des boissons</a>
        </nav>
    </header>
    <main>
        <?php
            if(App\Session::hasMessages())  {
                foreach(App\Session::getMessage("success") as $msg){
                    echo $msg."<br>";
                }
                foreach(App\Session::getMessage("error") as $msg){
                    echo $msg."<br>";
                }
            }
            
        ?>
        <div>
            <?= $page ?>
        </div> 
    </main>
   <footer>
       &copy; 2020 GLOUGLOU Productions
   </footer>
</body>
</html>