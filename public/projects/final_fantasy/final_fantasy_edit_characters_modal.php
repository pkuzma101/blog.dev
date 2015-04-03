<!-- Modal -->
<div class="modal fade" id="editCharacterModal" tabindex="-1" role="dialog" aria-labelledby="editCharacterModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Update Database</h4>
            </div>
            <div class="modal-body">
                <?php 
                    if (isset($_GET['page'])) {
                        $page = "?".$pageParam;
                    }
                    else {
                        $page = "";
                    }
                    if (ENV == "prod") {
                        $action = "http://paulkuzmadev.com/projects/final_fantasy/final_fantasy_characters.php".$page;
                    }
                    else {
                        $action = "http://blog.dev/projects/final_fantasy/final_fantasy_characters.php".$page;
                    }
                ?>
                <?php foreach($employees as $employee) : ?>
                <form method="POST" role="form" id="edit-character-form" enctype="multipart/form-data" action="<?php echo $action; ?>">
                    <h2 id="modalHeadline">Edit Character</h2>
                    <input type="text" name="id" value="<?= $employee['id'] ?>">
                    <div class="inputGroup">
                        <input type="text" name="edit_first_name" id="edit_first_name" class="inputText" value="<?php echo $employee['first_name']; ?><?= isset($_POST['edit_first_name']) ? $_POST['edit_first_name'] : '' ?>">
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="edit_last_name" id="edit_last_name" class="inputText" value="<?php echo $employee['last_name']; ?> <?= isset($_POST['edit_last_name']) ? $_POST['edit_last_name'] : '' ?>">
                        <label for="last_name">Last Name</label>    
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="edit_class" id="edit_class" class="inputText" value="<?php echo $employee['class']; ?> <?= isset($_POST['edit_class']) ? $_POST['edit_class'] : '' ?>">
                        <label for="class">Class</label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="edit_special_ability" id="edit_special_ability" class="inputText" value="<?php echo $employee['special_ability']; ?> <?= isset($_POST['edit_special_ability']) ? $_POST['edit_special_ability'] : '' ?>">
                        <label for="first_name">Special Ability</label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="edit_weapon" id="edit_weapon" class="inputText" value="<?php echo $employee['weapon']; ?> <?= isset($_POST['edit_weapon']) ? $_POST['edit_weapon'] : '' ?>">
                        <label for="first_name">Weapon</label>    
                    </div>
                    <div class="inputGroup">
                        <input type="file" name="image" id="image" class="inputText">
                        <label for="image">Upload Portrait</label>
                    </div>
                    <div class="modalButtonBlock">
                        <button type="submit" name="edit-submit" class="btn btn-default" id="edit-submit-button" value="submit">Update Character</button>
                    </div>
                </form>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</div>