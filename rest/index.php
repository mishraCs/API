<?php
if(isset($_POST['submit'])){
    if (isset($_POST['order_id']) && $_POST['order_id']!="") {

        $order_id = $_POST['order_id'];
        $url = "http://localhost/MyCode/GetCurlPayAPI/rest/api.php/?order_id=".$order_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === false) {
            echo 'Curl error: ' . curl_error($ch);
        }    
        $result = json_decode($response);
        // var_dump($result);
        // print_r($result);
        echo "<table>";
        echo "<tr><td>Order ID:</td><td>$result->order_id</td></tr>";
        echo "<tr><td>Amount:</td><td>$result->amount</td></tr>";
        echo "<tr><td>Response Code:</td><td>$result->response_code</td></tr>";
        echo "<tr><td>Response Desc:</td><td>$result->response_desc</td></tr>";
        echo "</table>";
    }
}
?>
<form action="" method="POST">
<label>Enter Order ID:</label><br />
<input type="text" name="order_id" placeholder="Enter Order ID" required/>
<br /><br />
<button type="submit" name="submit">Submit</button>
</form>


