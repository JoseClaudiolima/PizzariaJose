<?php
include_once("templates/header.php");
include_once("process/adm.php");

?>


<main>
    <p>Gerenciar Pedidos:</p>
    <table>
        <thead id="cabecalho">
            <tr>
                <th scope="col"><span class="thead">Pedido</span></th>
                <th scope="col"><span class="thead">Borda</span></th>
                <th scope="col"><span class="thead">Massa</span></th>
                <th scope="col"><span class="thead">Sabores</span></th>
                <th scope="col"><span class="thead">Status</span></th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($itens as $item): ?>
            <tr>
                <td>
                    <?= $item['idPizza'] ?>
                </td>
                <td>
                    <?= ($borda = bordaName($item['idBorda']))['tipo'] ?>
                </td>
                <td>
                    <?= ($massa = massaName($item['idMassa']))['tipo'];?>
                </td>
                <td> <ul>
                <?php foreach(saboresArr($item['idPizza']) as $s ): ?>
                        <li>
                            <?=
                            saboresName($s['idSabores'])
                            ?>
                        </li>
                <?php endforeach ?>    
                    </ul> </td> 
            <td>
                <form action="process/adm.php" method="post">

                <select name="status" id="status">
                    <?php foreach($status as $s): ?>
                    <option value="<?= $s['idStatus'] ?>"
                    <?= ($s['idStatus'] == statusName($item['idPizza']) ? "selected" : "") ?>> 
                        <?= $s['status'];?>  
                    </option>
                    <?php endforeach ?>
                </select>
                <input type="hidden" name="type" value="update">
                <input type="hidden" name="id" value="<?=$item['idPizza']?>">
                    <button type="submit" class="update-btn button-form" >
                    <abbr title="Update">
                        <span class="material-symbols-outlined">
                        update
                        </span>
                    </abbr>
                    </button>
                </form>
                <form action="process/adm.php" method="post">
                    <input type="hidden" name="type" value="delete">
                    <input type="hidden" name="id" value="<?=$item['idPizza']?>">
                    <button type="submit" class="delete-btn button-form">
                    <abbr title="Delete">
                    <span class="material-symbols-outlined">
                    delete
                    </span>
                    </abbr>
                    </button>
                </form>
            </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</main>

<?php
include_once("templates/footer.php");

?>