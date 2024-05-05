<div class="container">
    <div class="jumbotron">
        <h2>Agregar universidad</h2>

    </div>
    <div class="col-md-6 col-md-offset-3">
        <div class="form-horizontal">
            <form action="index.php?m=create_carrera" method="post">

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_nombre">NOMBRE:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="txt_nombre">
                    </div>
                </div>

                <div class="form-group">
                    <label class=" col-sm-2 control-label" for="txt_universidad">UNIVERSIDAD:</label>
                    <div class="col-sm-10">
                        <!-- <input type="text" class="form-control" name="txt_direccion"> -->
                        <select name="txt_universidad" class="form-control">
                            <?php foreach($query as $data): ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-md-12 col-md-off-set-3">
                        <input type="submit" class="btn btn-primary form-control" name="" value="registrar">
                    </div>
                </div>
            </form>
            
        </div>
    </div>
    
</div>