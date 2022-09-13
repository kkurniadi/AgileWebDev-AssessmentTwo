<!DOCTYPE html>
<html lang="en">
<!-- Kirsten Kurniadi, ID: 30045816
Assessment Task Two (Individual Project)
Web Page Content, Question 3 -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Question 3 | Assessment Two</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
    <?php include_once('questions_nav.php'); ?>
    <div class="container mx-3 my-3">
        <h1>Question Three</h1>
		<hr>
		<?php 
            session_start();
            if(isset($_SESSION['message'])){
                ?>
                <div class="alert alert-info text-center" style="margin-top:20px;">
                    <?php echo $_SESSION['message']; ?>
                </div>
                <?php

                unset($_SESSION['message']);
            }
        ?>
		<table class="table" style="margin-top:20px;">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Question</th>
					<th scope="col">Description</th>
					<th scope="col">Answer</th>
				</tr>
			</thead>
			<tbody>
				<?php
					//include our connection
					include_once('../connection.php');

					$database = new Connection();
					$db = $database->open();
					try{	
						$sql = 'SELECT * FROM questions WHERE id = 3';
						foreach ($db->query($sql) as $row) {
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo nl2br($row['question']); ?></td>
								<td><?php echo nl2br($row['description']); ?></td>
								<td><?php echo nl2br($row['answer']); ?></td>
							</tr>
							<?php 
						}
					}
					catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}

					//close connection
					$database->close();

				?>
			</tbody>
		</table>
    </div>
    
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>