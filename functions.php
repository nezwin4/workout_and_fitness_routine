<?php

function getWorkoutVideos($con, $section) {
    $videos = [];
    $sql = "SELECT video_link FROM workouts WHERE section = '$section'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $videos[] = $row['video_link'];
        }
    }

    return $videos;
}

function displayWorkoutVideos($videos) {
    foreach ($videos as $video) {
        echo '<div class="centered-iframe">
                <form method="post" action="save_video.php" style="  display: flex; flex-direction: row; align-items: center; justify-content: center"> <!-- Create a new PHP file for saving videos -->
                    <div class="video-container" style=" width: 1000px;height:700px; padding-top: 10%; padding-bottom: 5%; overflow: hidden;">
                        <iframe src="' . $video . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen ></iframe>
                    </div>
                    <input type="hidden" name="video_link" value="' . $video . '">
                    <button type="submit" name="save_video" class="btns1">save</button>
                </form>
            </div>';
    }
}


?>