<?php

if(isset($_POST['inputProjId']) && isset($_POST['inputStudId']) && isset($_POST['inputFypStage']) && isset($_POST['inputProjTitle']) && isset($_POST['inputProjFeedback'])){
    echo $_POST['inputProjId'] ;
    echo $_POST['inputStudId'];
    echo $_POST['inputFypStage'];
    echo $_POST['inputProjTitle'];
    echo $_POST['inputProjFeedback'];
}

    