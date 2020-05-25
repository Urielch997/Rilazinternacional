<?php 
ini_set("SMTP","server1.rilaz.com.sv");
    
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $msj = $_POST['mensaje'];
    $para = "digitalizacion@rilaz.com.sv";
    $asunto = "cotizacion";
    $mensaje = '<html>'.
    '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">'.
	'<style>h1{width:100%;padding:10px; text-align:center;color:#fff; font-family: "Yu Gothic Light";}'.
    'th{background:#00796b;color:#b2dfdb; padding: 10px 5px;border:0px; font-family: "Yu Gothic Light";}'.
    'table{border:0; width:100%;}'.
    '.cabecera{font-family: "Yu Gothic Light";width:100%;background:#283593; padding: 5px 25px; display:flex;}'.
    'td{font-family: "Yu Gothic Light";}'.
    '</style><head><title>Email con HTML</title></head>'.
	'<body>'.
    '<div class="cabecera">'.
    '<h1><b>Cotizacion Rilaz Internacional</b></h1>'.
    '<img src="https://lh3.googleusercontent.com/tjiKh7DglE5k4Ty6l43cCbHc08j8-Jvynr1-pGxwwqa3MnJwBr1lfJfv0Q6ixbZBgGtjUdW3B-pqaq2K8hYhpp6yjDxLb4qnCBHgMtGiC78-KHksd2_udF3lNUC1XCTEfLICQfCLuedvIfCvK51Kov81pRyCuv5PyMViM8aETnf1tppQV_BqithnDJXRoooWDnoJ4EyFP4xTqcCnRvLyC5ZdZOZQ9UqLFA9E2oC5_6Hn3T_UgxULWu_ie4K1W9NWf70gVF_fIgZIQKqSTA8oMaFYA_hLXbv_4-W-ATiBBapCT0U9wBfMy3zePzGQuKDqWLBZwueKhBZkF4FiSn3M8mC4VkcdQ93z0JgjGP3ybXv4YnXt9yqE9crwjagXhJGAhHHilMeZ2-7S2FaUkVCaBaxbNhetMuW2KxZEdiKASLVYw3pkLW9ihEmaJPpe-rf9pOPhP9uaZCyxb-lv2Xnw1mv9hmpNwDgfCQYv9WyUM1W9mgNWkIWHrPs3sY2m8SHDPMd9JNEuJ8WcAk2a5I2MvkTX4zt8C6hiluS5cQEHQG1Ly7gowN5tu9nAAKM-ECaBoXsswUBXhdiRcZYGpAyecskCRfr-LMKgVFaGrHuY4q7rRT25vieqU0TESRmLwTWH8PkarI7U_EoPpDAHnWXSJJ53r6P-Nd6spAb95ceKrwa9K517Fo9QNHlMHzrE=s32-no" width="20" height="20">Nombre:<b>'.$nombre.'</b><br>'.
    '<img src="https://lh3.googleusercontent.com/HfzPCu0MW0AtQZ8vBbL6d_Ol1a_AOfrK0O0qfsZ8V7MLAwRIs3XEg5I3FQxm7e36nBaxZyl9KKZqUBdjXUXz0y63WgdcxUrfV7BOXSSMsTDwQNDQPrssQ1RQzBMekbv5NWHjJIevCrctfGRCePNwppPYlkIMbxfnyJy_JOzurRE9wAf-OtdalMTkzZlMgPbyhRhSwurqIRfXGAtJ6vH5tjR_DpyJcfCoXPQjrF-yy4zYVz1nN9Xm-n4nARRZyjwNsdmdYnFmOwtwGXlvpvyJhdMwwLcMurE4ZRXuT_KjD_BsuuAUp8JjPeh68Gys5lQwi2ZL3T-9jlAtBod0tpxrh2hYJjfVyTLyt-jHhoNOlIY1r91_vJcgH8_cKYM7dgU3MIBT6bW2jsqq7tYhdnmkEpCma2wT1pms8aYfDMwSol9WbrxPrl3XGlsQYvfrw1YvXsYhpUfJM6sFr5Rzf-IOp5bcv6wLTfflR8tOSGK6PzNiFEGsyk6lx3Tzepzx0CAMFzsqW9814feacHnEzMf3-KMUDaJajGLquuoJwyFq5B0UzdayHU7M2tQ95DV7PtmlxhXObhVk2HRFJrrhvRrh78kgrw0tvnmlZTggjvQZxZ2ZgxufeaMA2LwUEepO6m4k7PqhWB--96lhavBGgnhFQdvIHLiiAbIOgiQ8uRzG40QMs27D4ZaeIw2RaCDr=s32-no" width="20" height="20">Telefono:<b>'.$telefono.'</b><br>'.
    '<img src="https://lh3.googleusercontent.com/2sb6wQtHuf3Zfv6R8xNXahkTo6mT7e_MzfhW4ScfGYVASBX2r7y9QMwomcBSK_PIpPF8L6-VW6pVMBpjIVw7SkpoJdo_jxRqdzAtXp3QjjlwV3hHRFTIs1bB03AUaJz4hSaNL0OF3WxKb8SMvT9qt5FK3Cz1kHTcE3BiAGNWBnULfTxD-qUR1Qnb23Y5VOE0AzBjv5nbb3SgYOpNOpKuLAUiM7BrFNEEbv0vo9DMZPflVN96gJDR-aINnh0evXxWxD0TkgzZGKEGdszEUpZWpyHLZQxIf5EY8q4DIApiBzp2TQ5BXguNjkC3cjr7jfpwaIfTx7y1EeWjaBeMfv-tyzTo84BL-WEJxs9ESY7TCEMhfU9fzCKsysHoihhX4NV65Td0qMA2-QBCktx61EQJUPbQlipAx0JjhH9Uw2nl-0cpl95D3uoBeISFjZZL68l8HJ5GKeQl8cX4Q70WsTIphtAcZPKu76X8uPS_OwthkhVotfJxMhUa-UmUBqaMapOQg-fTKibHMuDUgzV6ZfF4-VGiKXygwVzZdshwEANNlpmOBRQjBSI7J59SUx7OTkDf4f_z0DB7g2OlYyNmPzmxmRytlqwTIBvgF6U0lFMlkSRHG6tCj-_cx1JDwBEBAyeFl8oakVS5nr5ekTDH1O6_uWPvl7z3V7OVHpKVnOIg1uA7_liGLPvoqvD-wFNE=s32-no" width="20" height="20">Correo:<b>'.$correo.'</b><br>'.
    '</div>'.
	'<table>'.
	'<tr>'.
    '<th>Servicio</th><th>Cantidad</th>'.
    '</tr>'.
    '<tr>';
    for($i=0;$i<2;$i++){
        if($i%2!=0){
            $mensaje .='<tr style="background:#b2dfdb;"><td>Servicio</td><td>Servicio</td></tr>'; 
        }else{
            $mensaje .='<tr><td>Costo</td><td>Servicio</td></tr>';
        }
    }
   $mensaje .= '</tr>'.
	'</table>'.
	'</body>'.
	'</html>';
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$cabeceras .= 'From: rilazinternacional@rilaz.com.sv';

mail($para,$asunto,$mensaje, $cabeceras);
  

    
?>