<?php
    $username = $_SESSION['username'];
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $results = @mysqli_query($db, "SELECT * FROM accepted WHERE taskee='$username' AND id='$id'")
?>
<?php include 'backend/chat.php'?>
<?php $tasker = '' ?>
<div class="more-detailed">
<?php if($results):?>
<?php while($data = mysqli_fetch_array($results)): ?>
    <a href="task.php?t=<?php echo $data['task_id']?>">
        <div class="banner link" style="flex-direction: column; align-items: center">
            <b>Title:</b>
            <p><?php echo $data['task_title']?></p>
        </div>
    </a>
    <div class="banner" style="border: none">
        <img src="images/<?php echo $data['image']?>" alt="" width="200" style="border-radius: 20px; padding: 5px 0;">
    </div>
    <div class="banner" style="flex-direction: column; align-items: center">
        <b>Description:</b>
        <p><?php echo $data['task_description']?></p>
    </div>
    <br>
    <div class="banner" style="border: 1px solid #2CD23C;">
        <div>
            <b>Accepted by</b>
            <span><?php echo $data['tasker']; $tasker = $data['tasker']?></span>
        </div>
        <div>
            <b>Accepted Date</b>
            <span><?php echo $data['date']?></span>
        </div>
        <div>
            <b>Taskee</b>
            <span>(You)</span>
        </div>
    </div>
    <div class="banner" style="border: 1px solid #2CD23C; flex-direction: column; align-items: center">
        <b>Message:</b> <p><?php echo $data['message']?></p>
    </div>
    <div class="banner" style="flex-direction: column; border: 1px solid #2CD23C;" id="conversation">
        <b style="text-align: center"><span>Talk to </span><?php echo $data['tasker']?><span>(Tasker)</span></b>
        <br>
<?php endwhile?>
<?php endif?>
        <?php $results = @mysqli_query($db, "SELECT * FROM chat WHERE taskee_username='$username' AND tasker_username='$tasker'")?>
        <?php if($results):?>
            <?php while($data = mysqli_fetch_array($results)): ?>
                <div class="<?php echo ($data['isTasker'] == false) ? 'message right' : 'message' ?>">
                    <div class="bubble">
                        <span><?php echo $data['text']?></span>
                    </div>
                </div>
            <?php endwhile?>
        <?php endif?>
        <div class="banner" style="padding: 5px; border: none; flex-direction: row;">
            <form method="POST" action="">
                <?php include 'errors.php'?>
                <input type="text" name="text" placeholder="Type here..." required/>
                <input type="text" name="tasker_username" value="<?php echo $tasker ?>" hidden/>
                <input type="text" name="taskee_username" value="<?php echo $_SESSION['username']?>" hidden/>
                <input type="number" name="isTasker" value="1" hidden/>
                   
                <button name="chat">Send</button>
            </form>
        </div>
    </div>
</div>