<?php
    $videos = ["https://toshibatec.ca/wp-content/uploads/2019/06/ErasingDocuments.mp4",
    "https://toshibatec.ca/wp-content/uploads/2019/06/ebridge.mp4",
    "https://toshibatec.ca/wp-content/uploads/2019/06/Toner-mode-changer.mp4",
    "https://toshibatec.ca/wp-content/uploads/2019/06/Rulebasprinting.mp4",
    "https://toshibatec.ca/wp-content/uploads/2019/06/JobBuild.mp4"];
    echo "<video autoplay controls><source src=".$videos[$_GET['url1']]." style='object-fit: fill;'></source></video><label>".$_GET['titulo1']."</label>";
?>