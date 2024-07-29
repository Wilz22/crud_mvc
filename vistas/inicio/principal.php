
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Menu</h1>
            <p>Control de calificaciones</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Menu</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Cantidad de Alumnos con Nota</h3>
              <p><?php $p=$this->modelo->Cantidad()?>
              <?=$p ->Cantidad?>
              </p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Cantidad Alumnos</h3>
              <p><?php $p=$this->modelo->CantidadAlum()?>
              <?=$p ->Estudiantes?>
              
            </div>
          </div>
        </div>
      </div>
    </div>