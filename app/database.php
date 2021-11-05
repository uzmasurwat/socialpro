<?php
/**
 * Database Connection 
 */
function connect()
{
    return new mysqli(HOST, USER, PASS, DB);
}


/**
 * Create 
 */
function create($sql)
{
    return connect()->query($sql);
}

/**
 * Get all data 
 */
function all($table)
{
    return connect()->query("SELECT * FROM {$table}");
}

//find single data

function find($table, $id){

    $sql = "SELECT * FROM {$table} WHERE id= '$id'";
    $data = connect() ->query($sql);
    return $data->fetch_object();
}

?>
