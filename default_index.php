<?php
if (isset($_SESSION['login']) && $_SESSION['login'] == true) 
    {
?>
<div class="container home_text">
    <h1>Welcome to Team Tasks!</h1>
    <h3>Add the tasks you need to take care of, and finish them one at a time.</h3>
    <article class="hreview open special col-xs-6">
        <a href="/task">
            <div class="panel panel-default">
                <div class="panel-heading">Overview of the tasks</div>
                <div class="panel-body">
                    <p class="description">Here you can find an overview of all tasks that should be done.</p>
                </div>
            </div>
        </a>
    </article>

    <article class="hreview open special col-xs-6">
        <a href="/task/create">
            <div class="panel panel-default">
                <div class="panel-heading">Add more tasks</div>
                <div class="panel-body">
                    <p class="description">Simply add some tasks which you need to do later.</p>
                </div>
            </div>
        </a>
    </article>

</div>
<?php 
    } else {
?>
    <h1 class="h_subpage">You are not logged in!</h1>
<?php
    }
?>