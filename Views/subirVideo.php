<!DOCTYPE html>
<html>
<head>
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Crear publicacion</title>
  <script src="Js/jquery.js"></script>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <script src="ckeditor/ckeditor.js"></script>
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <link href="CSS/publicacion.css" rel="stylesheet"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
          <button class="btn btn-info" onclick="validate()"><span class="material-icons">arrow_back</span></button>
      </div>
    </div>
<div class="container">
    <div class="row">
  
            <div class="form-group form-file-upload form-file-multiple col-md-10">
                <input type="file" multiple="" class="inputFileHidden" id="video" accept='.mp4,.ogv,.webm' name="video" onChange="up(this.files[0].name)">
                <div class="input-group">
                    <input type="text" class="form-control inputFileVisible" placeholder="Seleccionar video" readonly id="nombre">
                    <span class="input-group-btn">
                        <label type="button" class="btn btn-fab btn-round btn-primary" for="video">
                            <i class="material-icons">video_call</i>
                        </label>
                    </span>
                </div>
            </div>
                <button class="btn btn-primary" onclick="uploadFile()">Subir</button>
    

        <div class="col-md-12">
            <div class="progress-container progress-primary">
                <span class="progress-badge">Progreso</span>
                <div class="progress">
                    <div id="barra-progreso" class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                        
                    </div>
                </div>
            </div>
            <div id="status"></div>
            <div id="loaded_n_total"></div>
        </div>

        <div class="col-md-12">
            <div class="card">
                <div class="card-body d-flex justify-content-center align-items-center" style="height:auto">
                        <div class="d-flex flex-wrap justify-content-center align-items-center" id="uploaded">
                            <span class="material-icons">
                                crop_free
                            </span>
                            <label>Ningun video subido</label>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <input class="form-control" type="text" placeholder="Titulo del video" id='titulo'>
        </div>
        <div class="col-md-12">
            <textarea class="form-control" rows="5" placeholder="Descripcion" id='descripcion' ></textarea>
        </div>
    </div>
</div>
</div>
<footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
        </div>
      </footer>
      <script src="Js/subirarchivo.js"></script>
</body>
</html>
