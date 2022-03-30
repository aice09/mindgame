<?php
include '../environment.php';
include '../config/database.php';

$request=$_REQUEST;
$col =array(
    0   =>  'score_userid',
    1   =>  'ltim',
    2   =>  'lflip',
    3   =>  'userfirstname',
    4   =>  'userlastname'
);  //create column like table in database

$sql =" SELECT a.score_userid ,MIN(a.score_time) AS ltim, MIN(a.score_flips) AS lflip, b.userfirstname, b.userlastname AS lflips FROM scores a
INNER JOIN users b
ON a.score_userid = b.userid  
GROUP BY score_userid 
ORDER BY ltim ASC
;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT a.score_userid ,MIN(a.score_time) AS ltim, MIN(a.score_flips) AS lflip, b.userfirstname, b.userlastname AS lflips FROM scores a
INNER JOIN users b
ON a.score_userid = b.userid  
        WHERE 1=1
GROUP BY score_userid 
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (score_userid Like '%".$request['search']['value']."%' ";
    $sql.=" OR ltim Like '%".$request['search']['value']."%' ";
    $sql.=" OR lflip Like '%".$request['search']['value']."%'";
    $sql.=" OR userfirstname Like '%".$request['search']['value']."%' ";
    $sql.=" OR userlastname Like '%".$request['search']['value']."%' )";
}
$query=mysqli_query($db,$sql);
$totalData=mysqli_num_rows($query);

//Order
$sql.=" ORDER BY ".$col[$request['order'][0]['column']]."   ".$request['order'][0]['dir']."  LIMIT ".
    $request['start']."  ,".$request['length']."  ";

$query=mysqli_query($db,$sql);

$data=array();
$i=1;
while($row=mysqli_fetch_array($query)){
    $subdata=array();

    $subdata[]= $i++;
    $subdata[]=$row[1]; 
    $subdata[]=$row[2];  
    $subdata[]=$row[3].' '.$row[4]; /* 
    $subdata[]='<button type="button" class="btn btn-primary btn-sm" id="update" data-id="'.$row[0].'" >Edit</button>
                <button type="button" class="btn btn-danger btn-sm" id="delete" data-id="'.$row[0].'" >Delete</button>'; */
    $data[]=$subdata;
}

$json_data=array(
    "draw"              =>  intval($request['draw']),
    "recordsTotal"      =>  intval($totalData),
    "recordsFiltered"   =>  intval($totalFilter),
    "data"              =>  $data
);

echo json_encode($json_data);
 
?>