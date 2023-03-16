<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DbChecker</title>
</head>
<body>
    <?php
        $data = DB::table("users")->limit(1)->get();
        if($data != false){
            if(sizeof($data) > 0){
                foreach ($data[0] as $key => $value) {
                    # code...
                    echo $key.' -->'.$value;
                }
            }else{
                echo 'Empty data';
            }
        }else{
            echo 'error';
        }
    ?>
</body>
</html>