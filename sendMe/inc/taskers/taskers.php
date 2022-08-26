<div class="taskers">
    <div class="wrapper">
        
        <!-- <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div>
        <div class="container">
            <img src="images/Untitled.png" alt="" width="240">
            <div class="texts">
                <b>Matthew Mohau</b>
                <span class="title">Painter</span>
                <div style="display: flex">
                    <span class="stars">*****</span>
                    <span class="ratings">(200 reviews)</span>
                </div>
            </div>
        </div> -->
        <?php $results = @mysqli_query($db, "SELECT * FROM users WHERE isTasker='1'")?>
        <?php if($results) :?>
            <?php while($data = mysqli_fetch_array($results)): ?>
                <div class="container">
                    <div>
                    <img src="images/<?php echo $data['image']?>" alt="" width="240" height="170">
                    </div>
                    <div class="texts">
                        <b><?php echo $data['firstName'], ' ', $data['lastName']?></b>
                        <span class="title"><?php echo $data['role']?></span>
                        <?php $user_id = $data['id']?>
                        <?php $res = @mysqli_query($db, "SELECT * FROM ratings WHERE tasker_id='$user_id'")?>
                        <?php if($res) :?>
                            <?php while($row = mysqli_fetch_array($res)): ?>
                                <div style="display: flex">
                                    <span class="stars">
                                        <?php for ($i=0; $i < $row['stars']; $i++) { 
                                            echo '*';
                                            if($row['stars'] ==5) echo '';
                                        }?>
                                    </span>
                                    <span class="ratings">
                                        (<?php echo $res->num_rows; ?>) reviews
                                    </span>
                                </div>
                            <?php endwhile?>
                        <?php endif?>
                    </div>
                </div>
            <?php endwhile?>
        <?php endif?>
    </div>
</div>