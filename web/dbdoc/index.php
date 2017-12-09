<?php
class db{
    function __construct( $host, $user, $pwd, $dbname ){
        $this->link = new mysqli( $host, $user, $pwd, $dbname );
        $this->run("set names utf8");
    }
    function run( $sql ){
        return $this->link->query( $sql );
    }

    function gets( $sql ){
        $mr = $this->run($sql);
        if( !$mr ){
            return [];
        }
        $rows = [];
        while( $row = $mr->fetch_array(MYSQLI_ASSOC) ){
            $rows[] = $row;
        }
        return $rows;
    }
}

$db = new db('dev.sodevel.com', 'dev3_sodevel', 'dev3_123456', 'dev3_sodevel');
$data = $db->gets( "show table status" );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DB Doc</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <?php 
    foreach( $data as $key=>$table ):
        $fields = $db->gets( "show full fields from {$table['Name']}" );
    ?>
        <div class="page-header">
            <h4><?php echo $table['Name'];?>  (<?php echo $key+1;?>)
            <small><?php echo $table['Create_time'];?></small> / 
            <small><?php echo $table['Update_time'];?></small>
            <small>auto: <?php echo $table['Auto_increment'];?></small>
            <small>rows: <?php echo $table['Rows'];?> (<?php echo $table['Engine'];?>)</small>
            <small><?php echo $table['Comment'];?></small>
            </h4>
        </div>
        <div class="table-responsive">
            <table class="table">
            <thead>
                <tr>
                <th>#</th>
                <th>字段名</th>
                <th>数据类型</th>
                <th>备注</th>
                <th>NULL</th>
                <th>DEFAULT</th>
                <th>Extra</th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach( $fields as $field ):?>
                <tr>
                <th scope="row">1</th>
                <td><?php echo $field['Field'];?></td>
                <td><?php echo $field['Type'];?></td>
                <td><?php echo $field['Comment'];?></td>
                <td><?php echo $field['Null'];?></td>
                <td><?php echo $field['Default'];?></td>
                <td><?php echo $field['Extra'];?></td>
                </tr>
            <?php
            endforeach;
            ?>
            </tbody>
            </table>
        </div>
    <?php endforeach;?>
</div>
</body>
</html>