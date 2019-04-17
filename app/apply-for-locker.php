<?php
    // if($_SESSION['username']) {
        // $queries = array();
        // parse_str($_SERVER['QUERY_STRING'], $queries);
        // require_once(APP.'/config/config.php');
        // print_r($queries); die;    
?>
<div class="container-fluid mt50 mb50">
    <form class="ma mw300" onsubmit="return false">
        <div class="form-group">
            <label for="startDate">Start Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" id="startDate" min="<?php 
                $datetime = new DateTime('tomorrow');
                echo $datetime->format('Y-m-d');
            ?>">
        </div>
        <div class="form-group">
            <label for="duration">Time of duration <span class="text-danger">*</span></label>
            <select class="form-control" id="duration">
                <option>1</option>
                <option>2</option>
                <option>3</option>
            </select>
        </div>
        <div class="form-group">
            <label for="jointWith">Joint Holders Account id's</label>
            <input type="text" class="form-control" id="jointWith" placeholder="Enter joint holders account ids with comma (,) saprated. Like: 110023, 110054, 110234">
        </div>
        <div class="form-group text-right">
            <button id="applyLocker" type="submit" class="btn btn-primary btn-lg">Apply</button>
        </div>
    </form>
</div>