<?php include 'inc/header.php'?>
 <h1 class='feedback_title mb-3'> Past Feedback </h1>
<?php
  $sql = 'SELECT * FROM feedback_table';
  $result = mysqli_query($conn, $sql);
  $feedback = mysqli_fetch_all($result, MYSQLI_ASSOC)
    ?>
    <?php if(empty($feedback)): ?>
        <p> No feedback</p>
    <?php endif;    ?>
 
 
 
 <?php foreach($feedback as $item): ?>
    <div class="card my-3 w-75">
        <div class="card-body">
            <?php 
            echo $item['body'];
            ?>
            <div class="text-secondary mt-2"> By 
                <?php echo $item['name']?>
            </div>
        </div>
    </div>
    <?php endforeach;?>