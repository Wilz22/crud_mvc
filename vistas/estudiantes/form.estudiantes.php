<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1><i class="fa fa-edit"></i> Ingresar Estudiantes</h1>
        <p>Ingresa las calificaciones de un alumno</p>
        </div>
        <div>
        <ul class="breadcrumb">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Forms</li>
            <li><a href="#">Ingreso Estudiantes<</a></li>
        </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="row">
            <div class="col-lg-6">
                <div class="well bs-component">
                <form class="form-horizontal" method="POST" action="?c=estudiantes&a=Guardar">
                    <fieldset>
                    <legend>Ingreso de Estudiantes</legend>
                    <input class="form-control" name="ID" type="hidden">

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputNombre">Nombre</label>
                        <div class="col-lg-10">
                        <input type="text" id="inputNombre" name="inputNombre" class="form-control" placeholder="Ingresa el nombre">
                        </div>
                    </div>   
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputApellido">Apellido</label>
                        <div class="col-lg-10">
                        <input type="text" id="inputApellido" name="inputApellido" class="form-control" placeholder="Ingresa el apellido">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputEmail" >Email</label>
                        <div class="col-lg-10">
                        <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Ingresa el email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="select">Selects</label>
                        <div class="col-lg-10">
                        <select class="form-control" id="select">
                            <option>Selecciona una opción</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                        </select>
                        </div>
                    </div>      
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="inputFechaNacimiento">Fecha Nacimiento</label>
                        <div class="col-lg-10">
                        <input type="date" id="inputFechaNacimiento" name="inputFechaNacimiento" class="form-control">
                        </div>
                    </div>                
                    
                
                    <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <a href="?c=estudiantes" class="btn btn-default">Cancelar</a>
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