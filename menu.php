<?php
    print '
    <a href="index.php?menu=1">Home</a>
            <a href="index.php?menu=2">Posts</a>
            <a href="index.php?menu=3">Contact</a>
            <a href="index.php?menu=4">About</a>
            <a href="index.php?menu=5">Gallery</a>';
            if (!isset($_SESSION['user']['valid']) || $_SESSION['user']['valid'] == 'false') {
                print '
                <a href="index.php?menu=6">Register</a>
                <a href="index.php?menu=7">Sign In</a>';
            }
            else if ($_SESSION['user']['valid'] == 'true') {
                print '
                <a href="index.php?menu=8">Admin</a>
                <a href="signout.php">Sign Out</a>';
            }
?>