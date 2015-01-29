<!-- Modal -->
<div class="modal fade" id="addCharacterModal" tabindex="-1" role="dialog" aria-labelledby="addCharacterModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Add to Database</h4>
            </div>
            <div class="modal-body">
                <form method="POST" role="form" enctype="multipart/form-data" action="http://codeup.dev/final_fantasy/final_fantasy_characters.php" >
                    <h2 id="modalHeadline">Add New Character</h2>
                    <div class="inputGroup">
                        <input type="text" name="first_name" id="first_name" class="inputText" value="<?= isset($_POST['first_name']) ? $_POST['first_name'] : '' ?> "></input>
                        <label for="first_name">First Name</label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="last_name" id="last_name" class="inputText" value="<?= isset($_POST['last_name']) ? $_POST['last_name'] : '' ?> ">
                        <label for="last_name">Last Name</label>    
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="class" id="class" class="inputText" value="<?= isset($_POST['class']) ? $_POST['class'] : '' ?> ">
                        <label for="class">Class: </label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="special_ability" id="special_ability" class="inputText" value="<?= isset($_POST['special_ability']) ? $_POST['special_ability'] : '' ?> ">
                        <label for="first_name">Special Ability</label>
                    </div>
                    <div class="inputGroup">
                        <input type="text" name="weapon" id="weapon" class="inputText" value="<?= isset($_POST['weapon']) ? $_POST['weapon'] : '' ?> ">
                        <label for="first_name">Weapon</label>    
                    </div>
                    <div class="inputGroup">
                        <input type="file" name="image" id="image" class="inputText" placeholder="Upload an Image">
                        <label for="image">Upload Portrait</label>
                    </div>
                    <div class="modalButtonBlock">
                        <!-- <button type="submit" class="btn btn-primary">Add Character</button> -->
                        <a href="#" onclick="$(this).closest('form').submit()">Add Character</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>