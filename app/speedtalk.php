<div id="yourpost" class="modal fade" role="dialog">
<div class="modal-dialog modal-md">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">&times;</button>
            <h3>What's on your mind, <?php echo $_SESSION['login_speedster']?>.&nbsp;<span class="glyphicon glyphicon-comment"></span></h3>
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                    <form action="/speedforce/app/savepost.php" method="POST">
                        <textarea style="resize:none;" type="text" name="status" id="post" rows="4" class="form-control" placeholder="Say something..." maxlength="1000" autofocus></textarea><br>
                        <input type="submit" name="submitpost" class="btn btn-block btn-danger" value="POST"> 
                    </form>
                </div>
            </div>
    </div>
</div>
</div>