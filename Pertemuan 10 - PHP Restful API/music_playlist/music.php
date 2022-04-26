<?php
require_once ('connection.php');

if (empty($_GET)) {
    $query = mysqli_query($conn, 'SELECT * FROM music');
    $result = array();

    while ($row = mysqli_fetch_array($query)) {
        array_push($result, array(
            'id' => $row['id'],
            'song_title' => $row['song_title'],
            'artist' => $row['artist'],
            'album' => $row['album'],
        ));
    }

    echo json_encode(
        array(
            'status' => 1,
            'message' => 'Get List Music Successfully.',
            'result' => $result
        )
    );
}
?>