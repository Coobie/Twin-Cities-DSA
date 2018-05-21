<?php
/**
 * User: Jacob
 * Date: 07/02/2018
 * github.com/coobie
 */

$title = 'About us';
$currentPage = 'aboutus';
require_once __DIR__ . '/includes/config.php';
require  $base_path . '/templates/head.php';
require $base_path . '/templates/header.php';
require $base_path . '/templates/top_nav_bar.php';
require $base_path . '/templates/page_content.php'; ?>


    <h1 class="page_title"><?php echo $title; ?></h1>
    <ul>
        <h3>Data, Schemas & Applications 2017/18</h3>
        <h4><a href="http://www.cems.uwe.ac.uk/~p-chatterjee/2017-18/modules/dsa/assignment/" target="_blank">Twin Towns and Sister Cities</a></h4>
        <p>Group details:</p>
        <table id="group_members">
            <tr>
                <th>Name</th>
                <th>GitHub</th>
                <th>Individual Tasks</th>
            </tr>
            <tr>
                <td>Jacob</td>
                <td><a href="https://github.com/coobie">Coobie</a></td>
                <td>XML and XML-Schema</td>
            </tr>
            <tr>
                <td>Mark</td>
                <td><a href="https://github.com/MarkL7">MarkL7</a></td>
                <td>Photo Widget</td>
            </tr>
            <tr>
                <td>Jake</td>
                <td><a href="https://github.com/johnstonjacob4">johnstonjacob4</a></td>
                <td>Twitter Comments</td>
            </tr>
        </table>
    </ul>

<?php require_once $base_path . '/templates/footer.php'; ?>
