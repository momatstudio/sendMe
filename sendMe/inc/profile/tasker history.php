<?php
    $username = $_SESSION['username'];
    $results = @mysqli_query($db, "SELECT * FROM accepted WHERE tasker='$username'")
?>
<div class="detail-section" style="flex-direction: column">
    <h1 style="font-size: 30px;">Acceped by you</h1>
    <br>
    <div style="display: flex; flex-wrap: wrap">
        <?php if($results):?>
            <?php while($data = mysqli_fetch_array($results)): ?>
                <a href="profile.php?section=tasker history details&id=<?php echo $data['id']?>" style="color: black">
                    <div class="my-task">
                        <div class="image">
                            <img src="images/<?php echo $data['image']?>" alt="" width="202" height="80">
                        </div>
                        <span><?php echo $data['task_title']?></span>
                    </div>
                </a>
            <?php endwhile?>
        <?php endif?>
    </div>
</div>
   