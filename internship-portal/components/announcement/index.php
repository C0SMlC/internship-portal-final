<?php
// Replace with your database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "internship_portal";

// Create a connection to the database
$db_connection = mysqli_connect($hostname, $username, $password, $database);

// Check if the connection was successful
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Query to fetch the values of attributes from the table
$query = "SELECT announcement_id, announcement_title, branch FROM new_annoucement";

// Execute the query
$result = mysqli_query($db_connection, $query);

// Check if the query was successful
if ($result) {
    // Fetch the data from the result set and store it in an array
    $announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    // Query execution failed
    die("Error executing the query: " . mysqli_error($db_connection));
}

// Close the database connection
mysqli_close($db_connection);
?>

<div class="announcement">
    <div class="announcementTitle">
        <p>Important Announcements:-</p>
    </div>
    <div class="messageDisplay">
        <ol>
            <?php foreach ($announcements as $announcement): ?>
            <li>
                <b>&#x25CF;</b>
                <a href="../../pages/Internship/index.php?id=<?php echo $announcement['announcement_id']; ?>">
                    <?php echo $announcement['announcement_title']; ?> requires interns for its <?php echo $announcement['branch']; ?> branch
                    <strong>Click to view !</strong>
                </a>
            </li>
            <?php endforeach; ?>
        </ol>
    </div>
</div>

<style>
    .messageDisplay {
        background-color: #f5f5f5;
        margin-top: 10px;
        margin-bottom: 10px;
        min-height: 400px;
        height: auto;
        padding: 10px;
        border: 1px solid #c4c4c4;
    }

    .messageDisplay>ol>li>a {
        font-size: 1.3rem;
        text-align: justify;
        color: #FFA21A;
    }

    .messageDisplay>ol>li {
        margin-top: 10px;
    }


    .messageDisplay>ol>li>a:hover {
        color: dodgerblue;
    }

    .messageDisplay>ol>li>a>strong {
        color: #AB47BC;
        font-size: 0.8rem;
        font-style: italic;
    }

    .messageDisplay>ol>li>b {
        font-size: 1.3rem;
    }

    .announcementTitle>p {
        color: #AF0000;
        text-decoration: underline;
        font-weight: bold;
    }

    .announcement {
        padding: 15px;
    }

    @media only screen and (max-width: 600px) {

        .announcement {
            padding: 5px;
        }

        .messageDisplay>ol>li>a {
            font-size: 1rem;
        }
    }
</style>