<?php
    $videos = ["https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_setting_up_the_printer_mfp_video.mp4",
    "https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_installing_the_optional_tray_mfp_video.mp4",
    "https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_installing_front_wireless_adapter_video.mp4",
    "https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_mpf_media_loading_new_video.mp4",
    "https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_replacing_the_toner_mfp_video.mp4",
    "https://publications.lexmark.com/media/ids_assets/videos/MS62x_MX62x/videos/lexmark_replacing_the_imaging_unit_mfp_video.mp4"];
    echo "<video autoplay controls><source src=".$videos[$_GET['url1']]." style='object-fit: fill;'></source></video><label>".$_GET['titulo1']."</label>";
?>