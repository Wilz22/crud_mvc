<div class="content-wrapper">
  <div class="page-title">
    <div>
      <h1>Data Table</h1>
      <ul class="breadcrumb side">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li>Tables</li>
        <li class="active"><a href="#">Data Table</a></li>
      </ul>
    </div>
    <div>
      <a class="btn btn-primary btn-flat" href="?c=calificaciones&a=FormCrear"><i class="fa fa-lg fa-plus"></i></a>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Nota</th>
                <th>Fecha</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($this->modelo->Listar() as $r):?>
              <tr>
                <td><?=$r->CalificacionID?></td>
                <td><?=$r->NombreEstudiante?></td>
                <td><?=$r->ApellidoEstudiante?></td>
                <td><?=$r->NombreCurso?></td>
                <td><?=$r->Nota?></td>
                <td><?=$r->Fecha?></td>
                <td>
                <a class="btn btn-info btn-flat" href="?c=calificaciones&a=FormCrear&id=<?=$r->CalificacionID?>"><i class="fa fa-lg fa-refresh"></i></a>
                <a class="btn btn-warning btn-flat" href="?c=calificaciones&a=Borrar&id=<?=$r->CalificacionID?>"><i class="fa fa-lg fa-trash"></i></a>  
              </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>