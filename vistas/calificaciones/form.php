<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1><i class="fa fa-edit"></i> Ingresar Calificaciones</h1>
        <p>Ingresa las calificaciones de un alumno</p>
        </div>
        <div>
        <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Forms</li>
            <li><a href="#"><?=$titulo?> Calificaciones</a></li>
        </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=calificaciones&a=Guardar">
                    <fieldset>
                    <legend><?=$titulo?> Calificaiones</legend>
                    <input class="form-control" name="ID" type="hidden" value="<?=$p->getCalificacionID()?>">
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Estudiante</label>
                        <div class="col-lg-10">
                            <select required class="form-control" name="selectAlumnos" id="selectAlumnos">
                                <option value="">Seleccione el alumno</option>
                                <?php foreach ($this->modelo->TraerDropDown() as $r):?>
                                    <option value="<?=$r->EstudianteID;?>" <?=($r->EstudianteID == $p->getEstudianteID()) ? 'selected' : ''; ?>>
                                        <?=$r->Nombre . ' ' . $r->Apellido;?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                    <label class="col-lg-2 control-label" for="select">Materia</label>
                        <div class="col-lg-10">
                            <select required class="form-control" name="selectMaterias" name="cursoID">
                            <option value="">Seleccione la materia</option>    
                            <?php foreach ($this->modelo->TraerDropDownMaterias() as $r):?>
                                    <option value="<?php echo $r->CursoID; ?>" <?=($r->CursoID == $p->getCursoID()) ? 'selected' : ''; ?>>
                                        <?php echo $r->NombreCurso; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNota">Nota</label>
                        <div class="col-lg-10">
                        <input type="number" step="0.01" min="0.00" max="10.00" id="inputNota" name="inputNota" class="form-control" required value="<?=$p->getNota()?>">
                        <small class="form-text text-muted">Ingrese una nota entre 0.00 y 10.00</small>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputFecha">Fecha</label>
                        <div class="col-lg-10">
                            <?php
                            // Obtener la fecha como objeto DateTime
                            $fecha = $p->getFecha();
                            
                            // Formatear la fecha como YYYY-MM-DD si es un objeto DateTime
                            $fechaFormatted = $fecha instanceof DateTime ? $fecha->format('Y-m-d') : '';
                            ?>
                            <input required class="form-control" name="inputFecha" type="date" value="<?=$fechaFormatted?>">
                        </div>
                    </div>
                
                    <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="?c=calificaciones" class="btn btn-default">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </div>
                    </div>                        
                    </fieldset>
                </form>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>