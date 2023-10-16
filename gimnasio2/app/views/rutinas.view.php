<?php
 
class RutinaView {
    function showRutinas($rutinas) {
        require './templates/header.php';
    
        // obtengo las tareas
    
        require './templates/form_alta.php';
        ?>
    
        <ul class="list-group">
        <?php foreach($rutinas as $rutina) { ?>
            <li class="list-group-item item-rutina">
                <div class="m-2"></div>
                    <b>
                        <?php 
                            echo $rutina->Nombre .". <br> $". 
                                $rutina->Precio 
                        ?>
                    </b>
                </div>
                <div class="actions col">
                    <a href="eliminar/<?php echo $rutina->ID ?>" type="button" class='btn btn-danger ml-auto'>Borrar</a>
                    <a href="detallar/" class="btn btn-warning"> Mostrar más</a>
                    <a href="actualizar/<?php echo $rutina->ID?>" type="button" class="btn btn-primary ml-auto">Actualizar</a>
                </div>
            </li>
        <?php } ?>
        </ul>
    
        <?php
        require './templates/footer.php';
    }
}