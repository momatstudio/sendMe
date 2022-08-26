<section class="tasks">
		<div class="wrapper">
			<div class="container">
                <?php 
                    if(isset($_GET['s']) && $_GET['s'] != null) {
                        $searchInput = $_GET['s'];
                        $result = @mysqli_query($db, "SELECT * FROM tasks WHERE author='$searchInput' OR title='$searchInput' OR description='$searchInput' OR category='$searchInput'");
                    }else $result = @mysqli_query($db, "SELECT * FROM tasks");
                ?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>All Tasks</h3>
                    </div>
                    
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>">
                                <div class="task">
                                    <div class="image">
                                        <img src="images/<?php echo $data['image']?>" alt="" width="250" height=""/>
                                    </div>
                                    <div class="text">
                                        <span><?php echo $data['title']?></span>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile?>
                    </div>
                <?php endif?>
			</div>
		</div>
</section>