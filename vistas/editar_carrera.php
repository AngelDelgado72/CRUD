<div class="container">
    <div class="jumbotron">
        <h2>Editar universidad</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal">
            <form action="index.php?m=updateCarrera&id=<?php echo $data['id'];?>" method="post">
                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre" value="<?php echo $data['nombre']; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                    <select name="txt_universidad" class="form-control">
                        <?php foreach($universidades as $universidad): ?>
                            <option value="<?php echo $universidad['id']; ?>" <?php if($universidad['id'] == $data['universidad_id']) echo 'selected'; ?>><?php echo $universidad['nombre']; ?></option>
                        <?php endforeach; ?>
                    </select>

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