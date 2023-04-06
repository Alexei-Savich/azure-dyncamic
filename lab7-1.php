<?php
$n=$_GET["n"];
if($n < 5 || $n > 20){
    echo '<script>alert("Size should be in range: [5; 20]. Setting size to 10")</script>';
    $n = 10;
}
$num[] = (rand(5, 15));
for($x = 0; $x < $n; $x++){
    array_push($num, rand(1, 99));
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lab 07</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
    <table border = 1>
        <?php
        for($i=0; $i<$n+1; $i++){
            echo '<tr>';
            for($j=0; $j<$n+1; $j++){
                if($i==0 && $j==0){
                    $res="";
                    $class = "mainRows";
                }else if($i==0){
                    $res=$num[$j-1];
                    $class = "mainRows";
                }else if($j==0){
                    $res=$num[$i-1];
                    $class = "mainRows";
                }else{
                    $res = $num[$i-1]*$num[$j-1];
                    $div = fmod($res, 2);
                    if($div == 0){
                        $class = "even";
                    }else{
                        $class = "odd";
                    }
                }
                echo '<td class="'.$class.'">'.$res.'</td>';
            }
            echo '</tr>';
        }
        ?> 
    </table>

    </body>
</html>