<?php
    $conn = mysqli_connect('uploaddatabase.cmi7k84twi7t.us-east-1.rds.amazonaws.com', 'nikhil', 'TFjune2022', 'data_loads');

    $result = mysqli_query($conn, "SELECT 
            Project_Full_Name AS project_name,
            PPTM.Tower_Maper AS tower, 
            OSM.sbu_identifier,
            PTL.display_name
        FROM O_PROJECTS op 
        JOIN PHP_PROJECT_TOWER_MAP PPTM ON op.Project_description = PPTM.Project_Full_Name 
        LEFT JOIN O_SBU_MAPPING OSM ON op.sbu_mapping_id =  OSM.mapping_id 
        CROSS JOIN PHP_TABLE_LIST PTL
        ORDER BY CAST(op.project_id AS DECIMAL),OSM.mapping_id,PPTM.Tower_Maper,PTL.display_name;");

    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        array_push($data, $row);
        // $data[] = $row;   
    }


    // returning the response
    echo json_encode($data);
    exit();
