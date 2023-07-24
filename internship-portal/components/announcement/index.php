<?php
//require "../../connect/connect.php";

// $query = "select * from new_annoucement";
// mysqli_query($db_connection, $query);
?>
<div class="announcement">
    <div class="announcementTitle">
        <p>Important Announcements:-</p>
    </div>
    <div class="messageDisplay">
        <ol>
            <li>
                <b>
                    &#x25CF;
                </b>
                <!-- <a href="../../pages/Internship/index.php?id=<?php echo $announcement_id; ?>">
                    $announcement_title
                    <strong>Click to view !</strong>
                </a> -->
                
                <a href="../../pages/Internship/index.php">
                    XYZ PVT LTD requires interns for it's IT department.
                    <strong>Click to view !</strong>
                </a>

            </li>
            <li>
                <b>
                    &#x25CF;
                </b>
                <a href="../../pages/Internship/index.php">
                    XYZ PVT LTD requires interns for it's IT department.
                    <strong>Click to view !</strong>
                </a>
            </li>
            <li>
                <b>
                    &#x25CF;
                </b>
                <a href="../../pages/Internship/index.php">
                    XYZ PVT LTD requires interns for it's IT department.
                    <strong>Click to view !</strong>
                </a>
            </li>

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