<?php
include_once("templates/header.php");
include_once("process/home.php");

?>

<div id="main-container">
<p>
    Faça seu pedido
</p>
</div>

<main>
    <p>Monte a sua pizza abaixo:</p>
        <form action="process/pedido.php" method="post" id="pizza-form">
        <div class="formDiv borda">
            <label for="borda">Borda:</label> <br>
            <select name="borda" id="borda">
                <option value="0" class="form-option">Seleciona a borda:</option>
            <?php foreach($bordas as $borda): ?>
                <option value="<?= $borda['idBorda']?>" class="form-option">
                    <?= $borda['tipo']?>
                </option>
            <?php endforeach;?>
            </select>
        </div>

        <div class="formDiv massa">
            <label for="massa">Massa:</label> <br>
            <select name="massa" id="massa">
                <option value="0" class="form-option">
                    Selecione a massa:
                </option>
                <?php foreach($massas as $massa):?>
                    <option value="<?= $massa['idMassa']?>" class="form-option">
                        <?= $massa['tipo'] ?>
                    </option>
                <?php endforeach?>
            </select>
        </div>

        <div class="formDiv sabores">
            <label for="sabores">Sabores: (Máximo 2)</label> <br>
            <select multiple name="sabores[]" id="sabores">
                <?php foreach($sabores as $sabor): ?>
                    <option value="<?= $sabor['idSabores']?>" class="form-option">
                        <?= $sabor['sabor'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <input type="submit" value="Fazer Pedido" class="submit">
        </form>
</main>



<?php
include_once("templates/footer.php");
?>