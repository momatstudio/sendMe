<section class="tasks">
		<div class="wrapper">
			<!-- Electronic Repairs -->
			<div class="container" id="electronic-repairs-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='Electronic Repairs'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>Electronic Repairs</h3>
                    </div>
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="electronic-repairs-tasks">
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
			<!-- House Cleaning -->
			<div class="container" id="house-cleaning-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='House Cleaning'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>House Cleaning</h3>
                    </div>
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="house-cleaning-tasks">
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
			<!-- House Painting -->
			<div class="container" id="house-painting-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='House Painting'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>House Painting</h3>
                    </div>
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="house-painting-tasks">
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
			<!-- Plumbing -->
			<div class="container" id="plumbing-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='plumbing'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>Plumbing</h3>
                    </div>
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="plumbing-tasks">
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
			<!-- Food Delivery -->
			<div class="container" id="food-delivery-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='Food delivery'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>Food delivery</h3>
                    </div>
                    
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="food-delivery-tasks">
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
			<!-- Loundry -->
			<div class="container" id="loundry-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='Loundry'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>Loundry</h3>
                    </div>
                    
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="loundry-tasks">
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
			<!-- Other -->
			<div class="container" id="other-div">
                <?php $result = @mysqli_query($db, "SELECT * FROM tasks WHERE category='Other'");?>
                <?php if($result) :?>
                    <div class="tasks-heading">
                        <h3>Other</h3>
                    </div>
                    
                    <div class="tasks-group">
                        <?php while($data = mysqli_fetch_array($result)) :?>
                            <a href="task.php?t=<?php echo $data['id']?>" id="other-tasks">
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
<script> 
    //categories
const loundry = document.getElementById("loundry-div"),
  loundryTasks = document.getElementById("loundry-tasks");

const foodDelivery = document.getElementById("food-delivery-div"),
  foodDeliveryTasks = document.getElementById("food-delivery-tasks");

const plumbing = document.getElementById("plumbing-div"),
  plumbingTasks = document.getElementById("plumbing-tasks");

const housePainting = document.getElementById("house-painting-div"),
  housePaintingTasks = document.getElementById("house-painting-tasks");

const houseCleaning = document.getElementById("house-cleaning-div"),
  houseCleaningTasks = document.getElementById("house-cleaning-tasks");

const electronicRepairs = document.getElementById("electronic-repairs-div"),
  electronicRepairsTasks = document.getElementById("electronic-repairs-tasks"),
  other = document.getElementById("other-div"),
  otherTasks = document.getElementById("other-tasks");

loundryTasks
  ? (loundry.style.display = "block")
  : (loundry.style.display = "none");

foodDeliveryTasks
  ? (foodDelivery.style.display = "block")
  : (foodDelivery.style.display = "none");

plumbingTasks
  ? (plumbing.style.display = "block")
  : (plumbing.style.display = "none");

housePaintingTasks
  ? (housePainting.style.display = "block")
  : (housePainting.style.display = "none");

houseCleaningTasks
  ? (houseCleaning.style.display = "block")
  : (houseCleaning.style.display = "none");

electronicRepairsTasks
  ? (electronicRepairs.style.display = "block")
  : (electronicRepairs.style.display = "none");

otherTasks ? (other.style.display = "block") : (other.style.display = "none");

loundry.addEventListener("click", () => {
  console.log("hello");
});
</script>