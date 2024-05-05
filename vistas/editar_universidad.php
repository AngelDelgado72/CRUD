<div class="container">
    <div class="jumbotron">
        <h2>Editar universidad</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal">
            <form action="index.php?m=update&id=<?php echo $data['id'];?>" method="post">
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_direccion">DIRECCION:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_direccion" value="<?php echo $data['direccion']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_telefono">TELEFONO:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_telefono" value="<?php echo $data['telefono']; ?>">
                    </div>
                    
                </div>
               
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                    <input type="submit" class="btn btn-primary form-control" name="" value="Actualizar">
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>