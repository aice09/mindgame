<?php
include '../environment.php';
include '../config/database.php';
$score_userid = $_SESSION['system_userid'];
$request=$_REQUEST;
$col =array(
    0   =>  'score_id',
    1   =>  'score_userid',
    2   =>  'score_time',
    3   =>  'score_flips',
    4   =>  'score_dtcreated',
    5   =>  'score_createdby'
);  //create column like table in database

$sql =" SELECT * FROM scores
        WHERE score_userid = '$score_userid'
        ORDER BY score_dtcreated DESC;";
$query=mysqli_query($db,$sql);

$totalData=mysqli_num_rows($query);

$totalFilter=$totalData;

//Search
$sql =" SELECT * FROM scores
        WHERE score_userid = '$score_userid'
        AND 1=1
        ";

if(!empty($request['search']['value'])){
    $sql.=" AND (score_userid Like '%".$request['search']['value']."%' ";
    $sql.=" OR score_time Like '%".$request['search']['value']."%' ";
    $sql.=" OR score_flips Like '%".$request['search']['value']."%'";
    $sql.=" OR score_dtcreated Like '%".$request['search']['value']."%' ";
    $sql.=" OR score_createdby Like '%".$request['search']['value']."%' )";
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
    $subdata[]=$row[2]; 
    $subdata[]=$row[3];  
    $subdata[]=$row[4]; /* 
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