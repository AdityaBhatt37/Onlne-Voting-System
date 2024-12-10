<?php
    session_start();
    if(!isset($_SESSION['userdata'])){
        header("location: ../");
    }

    $userdata = $_SESSION['userdata'];
    $groupsdata = $_SESSION['groupsdata'];

    if($_SESSION['userdata']['status'] == 0){
        $status = '<b style="color:red">Not Voted</b>';
    } else {
        $status = '<b style="color:green">Voted</b>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body>

    <div class="container">
        <!-- Header Section -->
        <header>
            <div class="header-buttons">
                <a href="../"><button class="back-btn">Back</button></a>
                <h1>Online Voting System</h1>
                <a href="logout.php"><button class="logout-btn">Logout</button></a>
            </div>
            
        </header>

        <!-- Main Section: Profile at the top and Groups below -->
        <div class="main-section">
            <!-- Profile Section (Top) -->
            <div class="profile">
                <div class="profile-photo">
                    <img id="pimg" src="../uploads/<?php echo $userdata['photo'] ?>" alt="User Photo">
                </div>
                <div class="profile-info">
                    <h2><?php echo $userdata['name'] ?></h2>
                    <p><strong>Mobile:</strong> <?php echo $userdata['mobile'] ?></p>
                    <p><strong>Address:</strong> <?php echo $userdata['address'] ?></p>
                    <p><strong>Status:</strong> <?php echo $status ?></p>
                </div>
            </div>

            <!-- Group Section (Below Profile) -->
            <div class="groups">
                <h2>Available Groups</h2>
                <div class="groups-list">
                    <?php
                        if($_SESSION['groupsdata']){
                            foreach($groupsdata as $group){
                    ?>
                        <div class="group-card">
                            <div class="group-photo">
                                <img src="../uploads/<?php echo $group['photo'] ?>" alt="Group Photo">
                            </div>
                            <div class="group-info">
                                <h3><?php echo $group['name'] ?></h3>
                                <p><strong>Votes:</strong> <?php echo $group['votes'] ?></p>
                                <form action="../api/vote.php" method="POST">
                                    <input type="hidden" name="gvotes" value="<?php echo $group['votes'] ?>">
                                    <input type="hidden" name="gid" value="<?php echo $group['id']?>">
                                    <?php
                                        if($_SESSION['userdata']['status'] == 0){
                                    ?>
                                            <input type="submit" name="votebtn" value="Vote" class="vote-btn">
                                    <?php
                                        } else {
                                    ?>
                                            <input type="button" name="votebtn" value="Voted" class="voted-btn" disabled>
                                    <?php
                                        }
                                    ?>
                                </form>
                            </div>
                        </div>
                    <?php
                            }
                        } else {
                            echo "<p>No groups available.</p>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
