<main>
    <form action="agregar" method="post">
        <div class="row">
            <div class="col-5 ">
                <div class="form-group">
                    
                    <h1>
                        Agregar Suplementos al catalogo del gimnasio.
                    </h1>
                <!-- <label for="" class="m-1">Categorias:</label> -->
                <select class="form-select m-1" name="" id="">
                    <option value="0">StarNutri</option>
                    <?php
                        // require './app/models/gimnasio.model.php';
                        // $options = getRutinas();                            
                        // foreach ($options as $option) {
                        //     echo   "<option value='$i'>.$option->Nombre .</option> ";
                            // }
                    ?>
                </select>
                <label class="m-1">Nombre del producto:</label>
                <input required name="Nombre" type="text" class="form-control m-1">
                <label class="m-1">Descripción:</label>
                <input required name="Descripcion" type="text" class="form-control m-1">
                
                <label class="m-1">Precio:</label>
                <input required name="Precio" type="text" class="form-control m-1">
                <label for="">Peso:</label>
                <input required name="Peso" type="text" class="form-control m-1">
                <label for="">Categoría:</label>
                <input required name="Categoria" type="text" class="form-control m-1">
                
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
    </form>
</main>